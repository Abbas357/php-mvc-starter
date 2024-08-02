<?php
class Main {
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function checkInput($var) {
		$var = stripcslashes($var);
		$var = trim($var);
		$var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
		return $var;
	}

	public function preventAccess($request, $currentFile, $currently) {
		if (headers_sent()) {
			return;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'GET' && $currentFile === $currently) {
			$this->redirectTo('index');
		}
	}

	public function checkAuth(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	public function redirectTo($path) {
		if (!defined('BASE_URL')) {
			throw new RuntimeException('BASE_URL is not defined.');
		}
		$url = rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
		if (headers_sent()) {
			throw new RuntimeException('Headers already sent.');
		}
		header('Location: ' . $url);
		exit();
	}

	public function redirectBack($fallback = 'index') {
		$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		if ($referer) {
			$this->redirectTo(parse_url($referer, PHP_URL_PATH));
		} else {
			$this->redirectTo($fallback);
		}
	}

	public function create($table, $fields = array()) {
        if (empty($fields)) {
            throw new InvalidArgumentException("No fields provided for insertion.");
        }

        $columns = implode(',', array_keys($fields));
        $placeholders = ':' . implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($fields as $key => $data) {
                $stmt->bindValue(':'.$key, $data);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

	public function update($table, $fieldName, $id, $fields = array()){
		if (empty($fields)) {
			throw new InvalidArgumentException("No fields provided for update.");
		}
		$setClause = '';
		$i = 1;
		foreach ($fields as $name => $value) {
			$setClause .= "`{$name}` = :{$name}";
			if ($i < count($fields)) {
				$setClause .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE `{$table}` SET {$setClause} WHERE `{$fieldName}` = :id";
		
		try {
			$stmt = $this->pdo->prepare($sql);
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->bindValue(':id', $id);
			$stmt->execute();
		} catch (PDOException $e) {
			error_log($e->getMessage());
			return false;
		}
	}
	
	public function delete($table, $conditions = array()) {
		if (empty($conditions)) {
			throw new InvalidArgumentException("No conditions provided for deletion.");
		}
		$sql = "DELETE FROM `{$table}` WHERE ";
		$whereClauses = array();
		foreach ($conditions as $name => $value) {
			$whereClauses[] = "`{$name}` = :{$name}";
		}
		$sql .= implode(' AND ', $whereClauses);
		try {
			$stmt = $this->pdo->prepare($sql);
			foreach ($conditions as $name => $value) {
				$stmt->bindValue(':'.$name, $value);
			}	
			$stmt->execute();
		} catch (PDOException $e) {
			error_log($e->getMessage());
			return false;
		}
		return true;
	}

	protected function executeQuery($sql, $params = [], $fetchMode = PDO::FETCH_OBJ) {
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchMode);
    }

	protected function checkExistence($field, $value) {
        $sql = "SELECT `$field` FROM `users` WHERE `$field` = :value";
        $result = $this->executeQuery($sql, [':value' => $value]);
        return !empty($result);
    }

	protected function generateName($ext, $prefix = 'file_') {
		$uniqueId = uniqid($prefix);
		$filename = $uniqueId . '.' . $ext;
		$counter = 1;
		while (file_exists($filename)) {
			$filename = $uniqueId . '_' . $counter . '.' . $ext;
			$counter++;
		}
		return $filename;
	}

	public function uploadImage($file, $directory = 'uploads/images/') {
		$filename = basename($file['name']);
		$fileTmp = $file['tmp_name'];
		$fileSize = $file['size'];
		$error = $file['error'];
		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		$allowed_ext = array('jpg', 'png', 'jpeg', 'gif');
		
		if (in_array($ext, $allowed_ext)) {
			if ($error === 0) {
				if ($fileSize <= 2097152) { // 2MB limit
					$uploadDir = BASE_DIR . '/' . $directory;
					if (!is_dir($uploadDir)) {
						mkdir($uploadDir, 0755, true);
					}
					$uniqueFilename = $this->generateName($ext, 'img_');
					$fileRoot = $directory . '/' . $uniqueFilename;
					$filePath = $uploadDir . '/' . $uniqueFilename;
	
					if (move_uploaded_file($fileTmp, $filePath)) {
						return $fileRoot;
					} else {
						$GLOBALS['imageError'] = "Failed to move uploaded file.";
					}
				} else {
					$GLOBALS['imageError'] = "The file size is too large.";
				}
			} else {
				$GLOBALS['imageError'] = "Error occurred during file upload.";
			}
		} else {
			$GLOBALS['imageError'] = "The file extension is not allowed.";
		}
		return false;
	}	
	
	public function uploadDocument($file, $directory = 'uploads/documents') {
		$filename = basename($file['name']);
		$fileTmp = $file['tmp_name'];
		$fileSize = $file['size'];
		$error = $file['error'];
	
		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		$allowed_ext = array('doc', 'docx', 'xls', 'xlsx', 'pdf', 'txt');
	
		if (in_array($ext, $allowed_ext)) {
			if ($error === 0) {
				if ($fileSize <= 10485760) { // 10MB limit
					$uploadDir = BASE_DIR . '/' . $directory;
					if (!is_dir($uploadDir)) {
						mkdir($uploadDir, 0755, true);
					}
					$uniqueFilename = $this->generateName($ext, 'doc_');
					$fileRoot = $directory . '/' . $uniqueFilename;
					$filePath = $uploadDir . '/' . $uniqueFilename;
	
					if (move_uploaded_file($fileTmp, $filePath)) {
						return $fileRoot;
					} else {
						$GLOBALS['documentError'] = "Failed to move uploaded file.";
					}
				} else {
					$GLOBALS['documentError'] = "The file size is too large.";
				}
			} else {
				$GLOBALS['documentError'] = "Error occurred during file upload.";
			}
		} else {
			$GLOBALS['documentError'] = "The file extension is not allowed.";
		}
		return false;
	}
	
	public function uploadFile($file, $directory = 'uploads', $type = 'image') {
		$filename = basename($file['name']);
		$fileTmp = $file['tmp_name'];
		$fileSize = $file['size'];
		$error = $file['error'];
		
		if ($type === 'image') {
			$allowed_ext = array('jpg', 'png', 'jpeg', 'gif');
			$size_limit = 2097152; // 2MB limit
		} elseif ($type === 'document') {
			$allowed_ext = array('doc', 'docx', 'xls', 'xlsx', 'pdf', 'txt');
			$size_limit = 10485760; // 10MB limit
		} else {
			$GLOBALS['fileError'] = "Invalid file type.";
			return false;
		}
	
		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	
		if (in_array($ext, $allowed_ext)) {
			if ($error === 0) {
				if ($fileSize <= $size_limit) {
					$uploadDir = BASE_DIR . '/' . $directory;
					if (!is_dir($uploadDir)) {
						mkdir($uploadDir, 0755, true);
					}
					$uniqueFilename = $this->generateName($ext);
					$fileRoot = $directory . '/' . $uniqueFilename;
					$filePath = $uploadDir . '/' . $uniqueFilename;
	
					if (move_uploaded_file($fileTmp, $filePath)) {
						return $fileRoot;
					} else {
						$GLOBALS['fileError'] = "Failed to move uploaded file.";
					}
				} else {
					$GLOBALS['fileError'] = "The file size is too large.";
				}
			} else {
				$GLOBALS['fileError'] = "Error occurred during file upload.";
			}
		} else {
			$GLOBALS['fileError'] = "The file extension is not allowed.";
		}
		return false;
	}	
	
	public function timeAgo($datetime) {
		$time = strtotime($datetime);
		$current = time();
		$seconds = $current - $time;
	
		if ($seconds < 60) {
			return ($seconds == 0) ? ' · now' : ' · ' . $seconds . 's ago';
		}
	
		$minutes = round($seconds / 60);
		if ($minutes < 60) {
			return ' · ' . $minutes . 'm ago';
		}
	
		$hours = round($seconds / 3600);
		if ($hours < 24) {
			return ' · ' . $hours . 'h ago';
		}
	
		$days = round($seconds / 86400);
		if ($days < 7) {
			return ' · ' . $days . 'd ago';
		}
	
		$weeks = round($seconds / 604800);
		if ($weeks < 4) {
			return ' · ' . $weeks . 'w ago';
		}
	
		$months = round($seconds / 2600640);
		if ($months < 12) {
			return ' · ' . date('M j', $time);
		}
	
		$years = round($seconds / 31556952); 
		return ' · ' . date('j M Y', $time);
	}
	
	public static function logo($width = 250, $height = 60, $alt = 'Logo') {
		$path = 'assets/images/logo.png';
		$basePath = defined('BASE_URL') ? rtrim(BASE_URL, '/') . '/' : '';
		$fullPath = $basePath . ltrim($path, '/');
		
		return sprintf('<img src="%s" style="width:%dpx; height:%dpx" alt="%s" />',
					   htmlspecialchars($fullPath, ENT_QUOTES, 'UTF-8'),
					   (int)$width,
					   (int)$height,
					   htmlspecialchars($alt, ENT_QUOTES, 'UTF-8')
		);
	}

	public function authUser() {
		if (isset($_SESSION['user_id'])) {
			$userId = $_SESSION['user_id'];
			$sql = "SELECT * FROM users WHERE id = :id";
			$result = $this->executeQuery($sql, [':id' => $userId], PDO::FETCH_OBJ);
			return !empty($result) ? $result[0] : null;
		}
		return null;
	}
}