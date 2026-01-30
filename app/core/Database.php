<?php
// app/core/Database.php
class Database {
    protected $db;

    public function __construct() {
        // Memanggil array dari config.php
        $config = require __DIR__ . '/../../config.php';
        $cfg = $config['db'];
        
        $this->db = new mysqli($cfg['host'], $cfg['user'], $cfg['pass'], $cfg['name']);
        
        if ($this->db->connect_error) {
            die("Koneksi gagal: " . $this->db->connect_error);
        }
    }

    public function getConn() {
        return $this->db;
    }
}