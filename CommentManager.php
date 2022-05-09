<?php

class CommentManager
{
    private $db;

    public function __construct()
    {
        $dbName = "blog";
        $port = 3307;
        $username = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    public function add(Comment $comment)
    {
        $req = $this->db->prepare("INSERT INTO `comment` (title, content, author, create_at, article_id) VALUES(:title, :content, :author, :create_at, :article_id)");
        $req->bindValue(":title", $comment->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->bindValue(":article_id", $comment->getArticle_id(), PDO::PARAM_INT);

        $req->execute();
    }

    public function update(Comment $comment)
    {
        $req = $this->db->prepare("UPDATE `comment` SET title = :title, content = :content, author = :author, create_at = :create_at WHERE id = :id");
        $req->bindValue(":id", $comment->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $comment->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->execute();
    }

    public function get(int $id)

     {
        $req = $this->db->prepare("SELECT * FROM `comment` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch();
        $comment = new Comment($donnees);
        return $comment;
    }

    public function getAllByArticleId(int $id): array
    {
        $comments = [];
        $req = $this->db->prepare("SELECT * FROM `comment` WHERE article_id = :id ORDER BY create_at desc");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $comments[] = new Comment($donnee);
        }

        return $comments;
    }

    public function delete(int $id): void
    {
        $req = $this->db->prepare("DELETE FROM `comment` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
?>