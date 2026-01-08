<?php
session_start();
require_once 'config/database.php';

// Simple Router
$route = isset($_GET['route']) ? rtrim($_GET['route'], '/') : '';
$parts = explode('/', $route);
$controller = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'DashboardController';
$method = isset($parts[1]) ? $parts[1] : 'index';
$id = isset($parts[2]) ? $parts[2] : null;

// Autoload controllers dan models
spl_autoload_register(function ($class) {
    if (file_exists('controllers/' . $class . '.php')) {
        require 'controllers/' . $class . '.php';
    } elseif (file_exists('models/' . $class . '.php')) {
        require 'models/' . $class . '.php';
    }
});

// Cek autentikasi (kecuali untuk auth routes)
if (!in_array($parts[0], ['auth']) && !isset($_SESSION['user_id'])) {
    header('Location: /auth/login');
    exit;
}

// Instansiasi dan panggil method
if (class_exists($controller)) {
    $obj = new $controller();
    if (method_exists($obj, $method)) {
        $obj->$method($id);
    } else {
        echo 'Method not found';
    }
} else {
    echo 'Controller not found';
}