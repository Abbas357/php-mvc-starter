<?php

namespace App\Support;

class Request
{
    protected $data;
    protected $post;
    protected $get;
    protected $files;
    protected $errors = [];

    public function __construct()
    {
        $this->data = array_merge($_GET, $_POST);
        $this->post = array_merge($_POST);
        $this->get = array_merge($_GET);
        $this->files = $_FILES;
    }

    public function input($key, $default = null)
    {
        $value = $this->data[$key] ?? $default;
        return checkInput($value);
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function all()
    {
        return $this->data;
    }

    public function file($key)
    {
        return $this->files[$key] ?? null;
    }

    public function hasFile($key)
    {
        return isset($this->files[$key]) && $this->files[$key]['error'] === UPLOAD_ERR_OK;
    }

    public function query($key = null, $default = null)
    {
        if ($key === null) {
            return $this->get;
        }

        return $_GET[$key] ?? $default;
    }

    public function post($key = null, $default = null)
    {
        if ($key === null) {
            return $this->post;
        }

        return $_POST[$key] ?? $default;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isMethod($method)
    {
        return $this->method() === strtoupper($method);
    }

    public function isPost()
    {
        return $this->isMethod('POST');
    }

    public function isSubmitted()
    {
        return !empty($this->all());
    }

    public function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function server($key = null)
    {
        return $key ? ($_SERVER[$key] ?? null) : $_SERVER;
    }

    public function headers()
    {
        return getallheaders();
    }

    public function header($key, $default = null)
    {
        $headers = $this->headers();
        return $headers[$key] ?? $default;
    }

    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
    public function validate(array $rules)
    {
        foreach ($rules as $field => $ruleString) {
            $rulesArray = explode('|', $ruleString);
            foreach ($rulesArray as $rule) {
                $this->applyRule($field, $rule);
            }
        }
        if (!empty($this->errors)) {
            $_SESSION['validation_errors'] = $this->errors;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    protected function applyRule($field, $rule)
    {
        $value = $this->data[$field] ?? null;

        if (strpos($rule, 'nullable') !== false) {
            if ($value === null || trim($value) === '') {
                return;
            }
            $rule = str_replace('nullable|', '', $rule);
        }

        switch (true) {
            case $rule === 'required':
                if (!$value || trim($value) === '') {
                    $this->errors[$field][] = "{$field} is required.";
                }
                break;

            case strpos($rule, 'min:') === 0:
                $minLength = intval(substr($rule, 4));
                if (strlen($value) < $minLength) {
                    $this->errors[$field][] = "{$field} must be at least {$minLength} characters.";
                }
                break;

            case strpos($rule, 'max:') === 0:
                $maxLength = intval(substr($rule, 4));
                if (strlen($value) > $maxLength) {
                    $this->errors[$field][] = "{$field} must be no more than {$maxLength} characters.";
                }
                break;

            case $rule === 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = "{$field} must be a valid email address.";
                }
                break;

            case $rule === 'number':
                if (!is_numeric($value)) {
                    $this->errors[$field][] = "{$field} must be a number.";
                }
                break;

            case $rule === 'date':
                if (!strtotime($value)) {
                    $this->errors[$field][] = "{$field} must be a valid date.";
                }
                break;

            case strpos($rule, 'between:') === 0:
                list($min, $max) = explode(',', substr($rule, 8));
                if ($value < $min || $value > $max) {
                    $this->errors[$field][] = "{$field} must be between {$min} and {$max}.";
                }
                break;

            case strpos($rule, 'in:') === 0:
                $allowedValues = explode(',', substr($rule, 3));
                if (!in_array($value, $allowedValues)) {
                    $this->errors[$field][] = "{$field} must be one of the following values: " . implode(', ', $allowedValues);
                }
                break;

            case $rule === 'mobile':
                if (!preg_match('/^03[0-9]{9}$/', $value)) {
                    $this->errors[$field][] = "{$field} must be a valid Pakistani mobile number (e.g., 03001234567).";
                }
                break;

            case $rule === 'cnic':
                if (!preg_match('/^[0-9]{5}-[0-9]{7}-[0-9]$/', $value)) {
                    $this->errors[$field][] = "{$field} must be a valid Pakistani CNIC (e.g., 12345-1234567-1).";
                }
                break;

            case $rule === 'strong_password':
                if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value)) {
                    $this->errors[$field][] = "{$field} must be at least 8 characters long and include at least one letter, one number, and one special character.";
                }
                break;

            case strpos($rule, 'unique:') === 0:
                list($table, $column) = explode(',', substr($rule, 7));
                $query = "SELECT COUNT(*) FROM {$table} WHERE {$column} = ?";
                $stmt = pdo()->prepare($query);
                $stmt->execute([$value]);
                if ($stmt->fetchColumn() > 0) {
                    $this->errors[$field][] = "{$field} must be unique.";
                }
                break;

            case $rule === 'confirmed':
                $confirmField = $field . '_confirmation';
                if ($this->data[$field] !== $this->data[$confirmField]) {
                    $this->errors[$field][] = "{$field} confirmation does not match.";
                }
                break;

            case $rule === 'url':
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    $this->errors[$field][] = "{$field} must be a valid URL.";
                }
                break;

            case $rule === 'alpha':
                if (!ctype_alpha($value)) {
                    $this->errors[$field][] = "{$field} must contain only alphabetic characters.";
                }
                break;

            case $rule === 'alpha_num':
                if (!ctype_alnum($value)) {
                    $this->errors[$field][] = "{$field} must contain only alphanumeric characters.";
                }
                break;

            case $rule === 'alpha_dash':
                if (!preg_match('/^[\pL\pM\pN_-]+$/u', $value)) {
                    $this->errors[$field][] = "{$field} may only contain letters, numbers, dashes, and underscores.";
                }
                break;

            case strpos($rule, 'digits:') === 0:
                $digits = intval(substr($rule, 7));
                if (!preg_match("/^\d{{$digits}}$/", $value)) {
                    $this->errors[$field][] = "{$field} must be exactly {$digits} digits.";
                }
                break;

            case strpos($rule, 'digits_between:') === 0:
                list($min, $max) = explode(',', substr($rule, 15));
                if (!preg_match("/^\d{{$min},{$max}}$/", $value)) {
                    $this->errors[$field][] = "{$field} must be between {$min} and {$max} digits.";
                }
                break;

            case $rule === 'timezone':
                if (!in_array($value, timezone_identifiers_list())) {
                    $this->errors[$field][] = "{$field} must be a valid timezone.";
                }
                break;

            case $rule === 'json':
                if (!is_string($value) || !json_decode($value)) {
                    $this->errors[$field][] = "{$field} must be a valid JSON string.";
                }
                break;

            case $rule === 'file':
                if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
                    $this->errors[$field][] = "{$field} must be a valid file upload.";
                }
                break;

            case $rule === 'image':
                $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES[$field]['type'];
                if (!in_array($fileType, $allowedImageTypes)) {
                    $this->errors[$field][] = "{$field} must be a valid image file (JPG, PNG, GIF).";
                }
                break;

            case strpos($rule, 'mimes:') === 0:
                $allowedMimeTypes = explode(',', substr($rule, 6));
                $fileType = $_FILES[$field]['type'];
                if (!in_array($fileType, $allowedMimeTypes)) {
                    $this->errors[$field][] = "{$field} must be one of the following file types: " . implode(', ', $allowedMimeTypes) . ".";
                }
                break;

            case $rule === 'valid_file':
                $fileTmpName = $_FILES[$field]['tmp_name'];
                $fileType = $_FILES[$field]['type'];
                $fileName = $_FILES[$field]['name'];

                $allowedFileTypes = [
                    'image/jpeg','image/png','image/gif','application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation'
                ];

                $allowedExtensions = [
                    'jpg','jpeg','png','gif','pdf','doc','docx','xls','xlsx','ppt','pptx'
                ];

                $isValidFileType = in_array($fileType, $allowedFileTypes);
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $isValidExtension = in_array(strtolower($fileExtension), $allowedExtensions);

                $isActualImage = strpos($fileType, 'image/') === 0 ? getimagesize($fileTmpName) !== false : true;

                if (!$isValidFileType || !$isValidExtension || !$isActualImage) {
                    $this->errors[$field][] = "{$field} must be a valid file (JPG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX) and not a renamed file.";
                }
                break;


            default:
                break;
        }
    }


    // protected function applyRule($field, $rule)
    // {
    //     $value = $this->data[$field] ?? null;

    //     if ($rule === 'required' && (!$value || trim($value) === '')) {
    //         $this->errors[$field][] = "{$field} is required.";
    //     }

    //     if (strpos($rule, 'min:') === 0) {
    //         $minLength = intval(substr($rule, 4));
    //         if (strlen($value) < $minLength) {
    //             $this->errors[$field][] = "{$field} must be at least {$minLength} characters.";
    //         }
    //     }

    //     if (strpos($rule, 'max:') === 0) {
    //         $maxLength = intval(substr($rule, 4));
    //         if (strlen($value) > $maxLength) {
    //             $this->errors[$field][] = "{$field} must be no more than {$maxLength} characters.";
    //         }
    //     }

    //     if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
    //         $this->errors[$field][] = "{$field} must be a valid email address.";
    //     }

    //     if ($rule === 'number' && !is_numeric($value)) {
    //         $this->errors[$field][] = "{$field} must be a number.";
    //     }

    //     if ($rule === 'date' && !strtotime($value)) {
    //         $this->errors[$field][] = "{$field} must be a valid date.";
    //     }

    //     if (strpos($rule, 'between:') === 0) {
    //         list($min, $max) = explode(',', substr($rule, 8));
    //         if ($value < $min || $value > $max) {
    //             $this->errors[$field][] = "{$field} must be between {$min} and {$max}.";
    //         }
    //     }

    //     if (strpos($rule, 'in:') === 0) {
    //         $allowedValues = explode(',', substr($rule, 3));
    //         if (!in_array($value, $allowedValues)) {
    //             $this->errors[$field][] = "{$field} must be one of the following values: " . implode(', ', $allowedValues);
    //         }
    //     }

    //     if ($rule === 'mobile' && !preg_match('/^03[0-9]{9}$/', $value)) {
    //         $this->errors[$field][] = "{$field} must be a valid Pakistani mobile number (e.g., 03001234567).";
    //     }

    //     if ($rule === 'cnic' && !preg_match('/^[0-9]{5}-[0-9]{7}-[0-9]$/', $value)) {
    //         $this->errors[$field][] = "{$field} must be a valid Pakistani CNIC (e.g., 12345-1234567-1).";
    //     }

    //     if ($rule === 'strong_password' && !preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value)) {
    //         $this->errors[$field][] = "{$field} must be at least 8 characters long and include at least one letter, one number, and one special character.";
    //     }

    //     if (strpos($rule, 'unique:') === 0) {
    //         list($table, $column) = explode(',', substr($rule, 7));
    //         $query = "SELECT COUNT(*) FROM {$table} WHERE {$column} = ?";
    //         $stmt = pdo()->prepare($query);
    //         $stmt->execute([$value]);
    //         if ($stmt->fetchColumn() > 0) {
    //             $this->errors[$field][] = "{$field} must be unique.";
    //         }
    //     }

    //     if ($rule === 'confirmed') {
    //         $confirmField = $field . '_confirmation';
    //         if ($this->data[$field] !== $this->data[$confirmField]) {
    //             $this->errors[$field][] = "{$field} confirmation does not match.";
    //         }
    //     }

    //     if ($rule === 'url' && !filter_var($value, FILTER_VALIDATE_URL)) {
    //         $this->errors[$field][] = "{$field} must be a valid URL.";
    //     }

    //     if ($rule === 'alpha' && !ctype_alpha($value)) {
    //         $this->errors[$field][] = "{$field} must contain only alphabetic characters.";
    //     }

    //     if ($rule === 'alpha_num' && !ctype_alnum($value)) {
    //         $this->errors[$field][] = "{$field} must contain only alphanumeric characters.";
    //     }

    //     if ($rule === 'alpha_dash' && !preg_match('/^[\pL\pM\pN_-]+$/u', $value)) {
    //         $this->errors[$field][] = "{$field} may only contain letters, numbers, dashes and underscores.";
    //     }

    //     if (strpos($rule, 'digits:') === 0) {
    //         $digits = intval(substr($rule, 7));
    //         if (!preg_match("/^\d{{$digits}}$/", $value)) {
    //             $this->errors[$field][] = "{$field} must be exactly {$digits} digits.";
    //         }
    //     }

    //     if (strpos($rule, 'digits_between:') === 0) {
    //         list($min, $max) = explode(',', substr($rule, 15));
    //         if (!preg_match("/^\d{{$min},{$max}}$/", $value)) {
    //             $this->errors[$field][] = "{$field} must be between {$min} and {$max} digits.";
    //         }
    //     }

    //     if ($rule === 'timezone' && !in_array($value, timezone_identifiers_list())) {
    //         $this->errors[$field][] = "{$field} must be a valid timezone.";
    //     }

    //     if ($rule === 'json' && !is_string($value) || !json_decode($value)) {
    //         $this->errors[$field][] = "{$field} must be a valid JSON string.";
    //     }

    //    if ($rule === 'file' && !isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
    //         $this->errors[$field][] = "{$field} must be a valid file upload.";
    //     }

    //     if ($rule === 'image') {
    //         $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    //         $fileType = $_FILES[$field]['type'];
    //         if (!in_array($fileType, $allowedImageTypes)) {
    //             $this->errors[$field][] = "{$field} must be a valid image file (JPG, PNG, GIF).";
    //         }
    //     }

    //     if (strpos($rule, 'mimes:') === 0) {
    //         $allowedMimeTypes = explode(',', substr($rule, 6));
    //         $fileType = $_FILES[$field]['type'];
    //         if (!in_array($fileType, $allowedMimeTypes)) {
    //             $this->errors[$field][] = "{$field} must be one of the following file types: " . implode(', ', $allowedMimeTypes) . ".";
    //         }
    //     }

    //     if ($rule === 'valid_file') {
    //         $fileTmpName = $_FILES[$field]['tmp_name'];
    //         $fileType = $_FILES[$field]['type'];
    //         $fileName = $_FILES[$field]['name'];

    //         $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    //         $isValidImage = in_array($fileType, $allowedImageTypes);
    //         $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    //         $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    //         $isValidExtension = in_array($fileExtension, $allowedExtensions);

    //         $isActualImage = getimagesize($fileTmpName) !== false;

    //         if (!$isValidImage || !$isValidExtension || !$isActualImage) {
    //             $this->errors[$field][] = "{$field} must be a valid image file and not a renamed file.";
    //         }
    //     }
    // }

    // request()->validate([
    //     'name' => 'required|min:8|max:20',
    //     'email' => 'required|email',
    //     'mobile' => 'required|mobile',
    //     'cnic' => 'required|cnic',
    //     'password' => 'required|strong_password',
    //     'password_confirmation' => 'confirmed',
    //     'age' => 'required|number|between:18,65',
    //     'gender' => 'in:male,female',
    //     'website' => 'url',
    //     'username' => 'alpha_dash|max:15',
    //     'phone' => 'digits:10',
    //     'profile_picture' => 'file|image|valid_file',
    //     'resume' => 'file|mimes:pdf',
    //     'timezone' => 'timezone',
    //     'preferences' => 'json'
    // ]);
}
