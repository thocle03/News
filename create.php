<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create</title>
</head>

<body>


<?php
 session_start();

    function chargerClasse($classe){
    require $classe . '.php';
    }
    spl_autoload_register('chargerClasse');

    if ($_POST) {
        $manager = new ArticleManager();

        $newArticle = new Article($_POST);
        $manager->add($newArticle);
    
    	echo "<script>window.location.href='index.php'</script>";
    }
?>

<form method="POST" class="container">
	<h2>Create a new article</h2>
		<label>Title :</label>
        <input type="text" name="title" id="title" class="form-control">
        <label>Content :</label>
        <textarea type="text" name="content" id="content" class="form-control"></textarea>
        <label>URL :</label>
        <input type="url" name="url" id="url" class="form-control">
        <label>Author :</label>
        <input type="text" name="author" id="author" class="form-control">
        <input type="submit" value="Publish" class="btn btn-primary">
    </form>
</body>

</html>