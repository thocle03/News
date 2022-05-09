<?php

class ArticleManager
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

    public function add(Article $article)
    {
        $req = $this->db->prepare("INSERT INTO `article` (title, content, author, create_at, url) VALUES(:title, :content, :author, :create_at, :url)");
        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->bindValue(":url", $article->getUrl(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Article $article)
    {
        $req = $this->db->prepare("UPDATE `article` SET title = :title, content = :content, author = :author, create_at = :create_at, url = :url WHERE id = :id");
        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->bindValue(":url", $article->getUrl(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
     {
        $req = $this->db->prepare("SELECT * FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch();
        $article = new Article($donnees);
        return $article;
    }

    public function getAll(): array
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY create_at desc");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }

        return $articles;
    }

    public function getAllByTitle(): array
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title desc");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }

        return $articles;
    }

    public function getAllByDate(): array
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY create_at asc");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }

        return $articles;
    }

    public function getAllByTitles(): array
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title asc");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }

        return $articles;
    }


    public function delete(int $id): void
    {
        $req = $this->db->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
?>