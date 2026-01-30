<?php
class Dashboard {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $user = $_SESSION['user'];
        $contentModel = new Content_model();

        // Ambil data sesuai limit yang ada di session user (hasil JOIN saat login)
        $data['articles'] = $contentModel->getContent('article', $user['article_limit']);
        $data['videos']   = $contentModel->getContent('video', $user['video_limit']);
        $data['user']     = $user;

        return $data;
    }
}