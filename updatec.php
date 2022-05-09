<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create_comment</title>
</head>

<body>

<?php
    function chargerClasse($classe){
    require $classe . '.php';
    }
    spl_autoload_register('chargerClasse');

    $manager = new CommentManager();

    if ($_GET) {
        $comment = $manager->get($_GET['id']);
        
    }

    if ($_POST) {
        $donnees = [
            "id" => $_GET["id"],
            "title" => $_POST["title"],
            "content" => $_POST["content"],
            "author" => $_POST["author"]
        ];

        $article_id = $comment->getArticle_id(); 
        
        $manager->update(new Comment($donnees));
        echo "<script>window.location.href='read.php?id=$article_id'</script>";

        //header("Location: ./read.php?id={$_GET["id"]}");
    }


?>

<form method="POST" class="container">
    <h2>Update comment</h2>
        <label>Title :</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $comment->getTitle(); ?>">
        <label>Content :</label>
        <textarea type="text" name="content" id="content" class="form-control"><?= $comment->getContent(); ?></textarea>
        <label>Author :</label>
        <input type="text" name="author" id="author" class="form-control" value="<?= $comment->getAuthor(); ?>">
        <input type="submit" value="Publier" class="btn btn-primary">
    </form>
</body>

</html>