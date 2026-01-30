<?php
class Auth {
    public function loginManual($email, $pass) {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // 1. Validasi Sederhana di Server-side
            if (empty($email) || empty($password)) {
                $_SESSION['error_msg'] = "Semua kolom harus diisi!";
                header("Location: index.php?page=login");
                exit;
            }

            $userModel = new User_model();
            $user = $userModel->findByEmail($email);

            // 2. Pengecekan Database (Email & Password)
            // Pastikan password di database di-hash dengan password_hash()
            if ($user && password_verify($password, $user['password'])) {
                // Login Berhasil
                $_SESSION['user'] = $user;
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                // Login Gagal: Kirim pesan untuk Popup Modal
                $_SESSION['show_modal_error'] = true;
                $_SESSION['error_msg'] = "Username atau Password tidak ditemukan dalam database kami. Silakan periksa kembali.";
                header("Location: index.php?page=login");
                exit;
            }
        }
    }

    public function registerManual($data) {
        $model = new User_model();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['provider'] = 'manual';
        $data['oauth_id'] = null;
        return $model->create($data);
    }

    public function logout() {
         
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Hapus semua data session
        session_unset();
        session_destroy();

        // Hapus cookie session dari browser
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // ke halaman login melalui index.php
        header("Location: index.php?page=login");
        exit;
    }
}