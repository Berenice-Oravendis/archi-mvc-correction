<?php

require_once('src/lib/database.php');
require_once('src/model/post.php');

use App\Model\PostRepository;

function editPost(string $id)
{
    $connection = new DatabaseConnection();
    $postRepository = new PostRepository();
    $postRepository->connection = $connection;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $postRepository->updatePost($id, $title, $content);
        header('Location: index.php');
        return;
    }

    $post = $postRepository->getPost($id);
    require('src/view/edit_post.php');
}
