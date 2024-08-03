<?php

namespace App\Support;

class Storage
{
    protected static $storagePath;

    protected static function initialize()
    {
        if (self::$storagePath === null) {
            self::$storagePath = config('app.dir') . '/storage';
        }
    }

    public static function put($file, $contents)
    {
        self::initialize();
        $filePath = self::$storagePath . DIRECTORY_SEPARATOR . $file;
        return file_put_contents($filePath, $contents) !== false;
    }

    public static function get($file)
    {
        self::initialize();
        $filePath = self::$storagePath . DIRECTORY_SEPARATOR . $file;
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }
        return false;
    }

    public static function delete($file)
    {
        self::initialize();
        $filePath = self::$storagePath . DIRECTORY_SEPARATOR . $file;
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }

    public static function exists($file)
    {
        self::initialize();
        $filePath = self::$storagePath . DIRECTORY_SEPARATOR . $file;
        return file_exists($filePath);
    }

    public static function url($file)
    { 
        self::initialize();  
        $filePath = self::$storagePath . DIRECTORY_SEPARATOR . $file;
        return file_exists($filePath) ? '/storage/' . $file : null;
    }

    public static function save($file, $directory = null, $type = 'image')
    {
        self::initialize();
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $error = $file['error'];

        $fileTypeConfig = [
            'image' => ['allowed_ext' => ['jpg', 'png', 'jpeg', 'gif'], 'size_limit' => 2097152, 'mime_types' => ['image/jpeg', 'image/png', 'image/gif']],
            'document' => ['allowed_ext' => ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'txt'], 'size_limit' => 10485760, 'mime_types' => ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/pdf', 'text/plain']],
        ];

        if (!isset($fileTypeConfig[$type])) {
            $GLOBALS['fileError'] = "Invalid file type.";
            return false;
        }

        if ($directory === null) {
            $directory = $type === 'image' ? 'uploads/images' : 'uploads/documents';
        }

        $allowed_ext = $fileTypeConfig[$type]['allowed_ext'];
        $size_limit = $fileTypeConfig[$type]['size_limit'];
        $mime_types = $fileTypeConfig[$type]['mime_types'];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($fileTmp);

        if (in_array($ext, $allowed_ext) && in_array($mimeType, $mime_types)) {
            if ($error === 0) {
                if ($fileSize <= $size_limit) {
                    $uploadDir = self::$storagePath . '/' . $directory;
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    $prefix = $type === 'image' ? 'image_' : 'doc_';
                    $uniqueFilename = self::generateName($ext, $prefix);
                    $fileRoot = $directory . '/' . $uniqueFilename;
                    $filePath = $uploadDir . '/' . $uniqueFilename;

                    if (move_uploaded_file($fileTmp, $filePath)) {
                        chmod($filePath, 0644);
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
            $GLOBALS['fileError'] = "The file extension or MIME type is not allowed.";
        }
        return false;
    }

    protected static function generateName($ext, $prefix = 'file_')
    {
        $uniqueId = uniqid($prefix);
        $filename = $uniqueId . '.' . $ext;
        $counter = 1;
        while (file_exists(self::$storagePath . '/' . $filename)) {
            $filename = $uniqueId . '_' . $counter . '.' . $ext;
            $counter++;
        }
        return $filename;
    }
}

// use App\Support\Storage;

// // Initialize the Storage class with the desired path
// Storage::init();

// // Handle file upload
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
//     $file = $_FILES['file'];
//     $filePath = Storage::save($file, 'uploads/images', 'image');
//     if ($filePath) {
//         echo "File uploaded successfully: " . $filePath;
//     } else {
//         echo "Error: " . $GLOBALS['fileError'];
//     }
// }