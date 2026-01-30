 <?php
session_start();
require_once 'vendor/autoload.php';

// Auto-load core dan models (Sederhana)
require_once 'app/core/Database.php';
require_once 'app/models/User_model.php';
require_once 'app/models/Content_model.php';
require_once 'app/controllers/Auth.php';
require_once 'app/controllers/Dashboard.php';

$page = $_GET['page'] ?? 'login';
$action = $_GET['action'] ?? '';

 
if ($action == 'login_process') {
    $auth = new Auth();
    if ($auth->loginManual($_POST['email'], $_POST['password'])) {
        header("Location: index.php?page=dashboard");
    } else {
        echo "<script>alert('Login Gagal!'); window.location='index.php?page=login';</script>";
    }
} 

if ($action == 'register_process') {
    $auth = new Auth();
    if ($auth->registerManual($_POST)) {
        echo "<script>alert('Berhasil Daftar!'); window.location='index.php?page=login';</script>";
    }
}

// ROUTING: Display Pages
if ($page == 'login') {
    include 'app/views/auth/login.php';
} elseif ($page == 'register') {
    include 'app/views/auth/register.php';
} elseif ($page == 'dashboard') {
    $dashboard = new Dashboard();
    $viewData = $dashboard->index(); // Ambil data
    
    // Extract data agar bisa dipakai di view sebagai $articles dan $videos
    $articles = $viewData['articles'];
    $videos = $viewData['videos'];
    $user = $viewData['user'];
    
    include 'app/views/dashboard/index.php';
}