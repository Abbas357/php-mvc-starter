<?php
class Main {
	protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function preventAccess($request, $currentFile, $currently){
		if($request == "GET" && $currentFile == $currently){
			header('Location: '.BASE_URL.'index.php');
		}
	}

	public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values = ':'.implode(', :',array_keys($fields));
		$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key,$data);
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	public function update($table, $fieldName, $id, $fields = array()){
		$columns = '';
		$i = 1;

		foreach($fields as $name => $value){
			$columns .= "`{$name}` = :{$name}";
			if($i < count($fields)){
				$columns .= ', ';
			}
			$i++;
		}
		$sql = "UPDATE {$table} SET {$columns} WHERE `$fieldName` = {$id}";
		if($stmt = $this->pdo->prepare($sql)){
			foreach ($fields as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
			$stmt->execute();
		}
	}

	public function delete($table, $array){
		$sql = "DELETE FROM `{$table}`";
		$where = " WHERE ";

		foreach($array as $name => $value){
			$sql .= "{$where} `{$name}` = :{$name}";
			$where = " AND ";

		}

		if($stmt = $this->pdo->prepare($sql)){
			foreach($array as $name => $value) {
				$stmt->bindValue(':'.$name, $value);
			}

			$stmt->execute();
		}
	}

	public function uploadImage($file){
		$filename = basename($file['name']);
		$fileTmp = $file['tmp_name'];
		$fileSize = $file['size'];
		$error = $file['error'];

		$ext = explode('.', $filename);
		$ext = strtolower(end($ext));
		$allowed_ext = array('jpg', 'png', 'jpeg');

		if(in_array($ext, $allowed_ext) === true){
			if($error === 0){
				if($fileSize <= 209272152){ 
					$fileRoot = 'users/' . $filename;
					move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'].'/'.$fileRoot);
					return $fileRoot;
				}else{
					$GLOBALS['imageError'] = "The file size is too large";
				}
			}
		}else{
			$GLOBALS['imageError'] = "The extention is not allowed";
		}
	}

	public function timeAgo($datetime){
		$time = strtotime($datetime);
		$current = time();
		$seconds = $current - $time;
		$minutes = round($seconds / 60);
		$hours = round($seconds / 3600);
		$months = round($seconds / 2600640);

		if($seconds <= 60){
			if($seconds == 0){
				return 'now';
			}else{
				return ' · '.$seconds.'s';
			}
		}elseif($minutes <= 60){

			return ' · '.$minutes. 'm';

		}elseif($hours <= 24){

			return ' · '.$hours.'h';

		}elseif($months <= 12){

			return ' · '.date('M j', $time);

		}else{

			return ' · '.date('j M Y',$time);

		}
	}

}
?>