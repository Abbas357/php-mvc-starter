<?php
namespace App\Models;
use PDO;
use App\Support\Storage;
class User extends Model
{
    public function __construct() {
        parent::__construct(pdo());
    }

    public function search($search)
    {
        $sql = "SELECT * FROM `users` WHERE (`name` LIKE :search OR `email` LIKE :search OR `designation` LIKE :search OR `office` LIKE :search) AND `status` = 1";
        return $this->executeQuery($sql, [':search' => $search . '%']);
    }

    public function checkUsername($username)
    {
        return $this->checkExistence('username', $username);
    }

    public function checkEmail($email)
    {
        return $this->checkExistence('email', $email);
    }

    public function createUser($request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($email) || empty($password)) {
            return ['success' => false, 'message' => 'Email and password are required fields.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Invalid email format.'];
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $email,
            'password' => $password,
            'mobile_number' => $request->input('mobile_number'),
            'office' => $request->input('office'),
            'designation' => $request->input('designation'),
        ];

        $file = $request->hasFile('profile_pic') ? $request->file('profile_pic') : null;
        $data['profile_pic'] = $this->handleFileUpload($file);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $insertedId = $this->create($data);
        if ($insertedId) {
            return ['success' => true, 'message' => "User created successfully with ID: " . $insertedId];
        } else {
            return ['success' => false, 'message' => 'There was an error creating the user.'];
        }
    }

    private function handleFileUpload($file)
    {
        if ($file && !empty($file['name'])) {
            $uploadedPath = Storage::save($file, 'images/users', 'image');
            if ($uploadedPath) {
                return $uploadedPath;
            } else {
                throw new \Exception('Error uploading image.');
            }
        }
        return null;
    }
}
