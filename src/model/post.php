<?php

namespace App\Model;

use \PDO;

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
}

class PostRepository
{
    public \DatabaseConnection $connection;

    public function getPost(string $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);
        $row = $statement->fetch();

        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];

        return $post;
    }

    public function updatePost(string $id, string $title, string $content): void
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE posts SET title = ?, content = ? WHERE id = ?"
        );
        $statement->execute([$title, $content, $id]);
    }
}
