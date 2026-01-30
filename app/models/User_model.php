<?php
class User_model extends Database {
    public function findByEmail($email) {
        $sql = "SELECT u.*, m.type_name, m.article_limit, m.video_limit 
                FROM users u JOIN membership_types m ON u.membership_id = m.id WHERE u.email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO users (username, email, password, oauth_provider, oauth_id, membership_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $data['username'], $data['email'], $data['password'], $data['provider'], $data['oauth_id'], $data['membership_id']);
        return $stmt->execute();
    }
}