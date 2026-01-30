<?php
/**
 * File: oauth_callback.php
 * Deskripsi: Endpoint final untuk Google/Facebook OAuth dengan fix session state.
 */

require_once 'vendor/autoload.php';
require_once 'app/core/Database.php';
require_once 'app/models/User_model.php';

// 1. Load config terpusat
$config = require 'config.php';

// 2. Mulai session sebelum logic apa pun
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$provider = $_GET['provider'] ?? 'Google';

try {
    /**
     * FIX REDIRECT URI MISMATCH
     * Mengunci URL agar konsisten dengan pendaftaran di Google/Facebook Console
     */
    $config['callback'] = "http://localhost/member_system/oauth_callback.php?provider=" . $provider;

    // 3. Inisialisasi Hybridauth
    $hybridauth = new Hybridauth\Hybridauth($config);

    // 4. Proses Autentikasi
    // authenticate() akan menangani pertukaran 'code' dan 'state' secara otomatis
    $adapter = $hybridauth->authenticate($provider);

    // 5. Ambil data profil user
    $userProfile = $adapter->getUserProfile();

    // Segera putus koneksi adapter (data sudah di memori)
    $adapter->disconnect();

    // 6. Logic Database (User_model)
    $userModel = new User_model();
    $user = $userModel->findByEmail($userProfile->email);

    if (!$user) {
        // Register otomatis jika user tidak ditemukan
        $registerData = [
            'username'      => $userProfile->displayName,
            'email'         => $userProfile->email,
            'password'      => '', 
            'provider'      => strtolower($provider),
            'oauth_id'      => $userProfile->identifier,
            'membership_id' => 1 // Default Tipe A
        ];

        $userModel->create($registerData);
        
        // Ambil data lengkap user termasuk limit membership-nya
        $user = $userModel->findByEmail($userProfile->email);
    }

    // 7. Simpan data user ke dalam Session
    $_SESSION['user'] = $user;

    // 8. FINAL FIX: Paksa simpan session dan redirect
    // session_write_close() mencegah hilangnya session saat redirect cepat
    session_write_close(); 
    
    header("Location: index.php?page=dashboard");
    exit;

} catch (Exception $e) {
    /**
     * Jika terjadi error 'state already consumed', 
     * biasanya karena user menekan tombol 'Back' atau 'Refresh' pada halaman OAuth.
     */
    echo "<h3>Autentikasi Gagal!</h3>";
    echo "Pesan Error: " . $e->getMessage();
    echo "<br><br><a href='index.php?page=login' style='padding:10px; background:#007bff; color:white; text-decoration:none; border-radius:5px;'>Kembali ke Login</a>";
    
    // Opsional: Hapus session rusak jika ada error state
    session_destroy();
}