<?php
require_once 'models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new User();
            $user = $userModel->login($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: /dashboard');
                exit;
            } else {
                $error = 'Invalid credentials';
            }
        }
        require 'views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new User();
            $role = ($_POST['role'] == 'admin') ? 'admin' : 'user'; // Hanya admin bisa buat admin baru di dashboard
            if ($userModel->register($_POST['name'], $_POST['username'], $_POST['password'], $role)) {
                header('Location: /auth/login');
                exit;
            } else {
                $error = 'Registration failed';
            }
        }
        require 'views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}