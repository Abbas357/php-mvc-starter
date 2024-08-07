<?php 

namespace App\Controllers;

use App\Support\Auth;

class AuthController extends Controller 
{
    public function index() {
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
                redirectToRoute('auth.index');
            } else {
                if (Auth::attempt($email, $password) === false) {
                    setFlash('danger', 'The email or password is incorrect');
                    redirectToRoute('auth.index');
                } else {
                    redirectToRoute('dashboard');
                }
            }
        } else {
            setFlash('danger', 'Please enter username and password!');
            redirectToRoute('auth.index');
        }
    }

    public function logout() {
        Auth::logout();
        header('Content-Type: application/json');
        setFlash('danger', 'You have been logged out.');
        redirect('login');
    }
}