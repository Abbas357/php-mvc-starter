<?php

namespace App\Models;

use App\Support\Storage;
use App\Support\Auth;

class User extends Model
{
    public function __construct()
    {
        parent::__construct(pdo());
    }

    public function addUserForm()
    {
        $data = [
            'title' => 'MUHAMMAD ABBAS KHAN',
        ];
        return view('users/add-user', $data);
    }

    public function index() {
        return view('index');
    }

    public function loginView() {
        return view('login');
    }

    public function login() {
        $email = request('email');
        $password = request('password');
        if (!empty($email) or !empty($password)) {
            $email = checkInput($email);
            $password = checkInput($password);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                setFlash('danger', 'Invalid email format');
                redirectToRoute('login.view');
            } else {
                if (Auth::attempt($email, $password) === false) {
                    setFlash('danger', 'The email or password is incorrect');
                    redirectToRoute('login.view');
                } else {
                    redirectToRoute('dashboard');
                }
            }
        } else {
            setFlash('danger', 'Please enter username and password!');
            redirectToRoute('login.view');
        }
    }

    public function createUser()
    {
        $_SESSION['old_input'] = request()->all();
        $email = request('email');
        $password = request('password');
        if (empty($email) || empty($password)) {
            setFlash('danger', 'Email and password are required fields.');
            redirectToRoute('add.user.view');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlash('danger', 'Invalid email format.');
            redirectToRoute('add.user.view');
            exit;
        }

        $data = [
            'name' => request('name'),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'mobile_number' => request('mobile_number'),
            'office' => request('office'),
            'designation' => request('designation'),
        ];

        $file = request()->hasFile('profile_pic') ? request()->file('profile_pic') : null;
        $data['profile_pic'] = $this->handleFileUpload($file);

        $insertedId = $this->create($data);
        if ($insertedId) {
            unset($_SESSION['old_input']);
            setFlash('success', 'User created successfully with ID: ' . $insertedId);
        } else {
            setFlash('danger', 'There was an error creating the user.');
        }
        redirectToRoute('add.user.view');
    }

    public function editUser($id) {
        $data = [
            'id' => $id,
        ];
        return view('test', $data);
    }

    public function getUser($id) {
        if(!authenticated()) abort(401);
        $data = [
            'id' => $id,
        ];
        return view('test', $data);
    }

    public function deleteUser($id) {
        $this->delete($id);
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

    public function allUsers() {
        return view('users/all-users');
    }

    public function logout() {
        Auth::logout();
        header('Content-Type: application/json');
        setFlash('danger', 'You have been logged out.');
        redirectTo('login');
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
}
