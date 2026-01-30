<?php
class Content_model extends Database {
    public function getContent($type, $limit) {
        $sql = "SELECT * FROM content WHERE type = ? LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $type, $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}