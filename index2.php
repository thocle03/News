<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="article.css">
    <title>Index</title>
</head>

<body style="background-color: grey;">



	<header>
		<h1 class="sport">Actuality Website</h1>
		<div id="conteneur">
			<button class="bouton"><a href="index.php"><strong>Home</strong></a></button>
			<button class="bouton1"><a href="create.php"><strong>New Article</strong></a></button>
			<button class="bouton"><a href="read.php"><strong>Read</strong></a></button>
			<button class="bouton"><a href="connexion.php"><strong>User</strong></a></button>
			<form class="d-flex" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="title" name="title">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <button class="boutonp"><a href="index.php">Newest First</button>
			<button class="boutonp"><a href="index1.php">Sort by Title Z--A</button>
            <button class="boutonp"><a href="index3.php">Oldest First</button>
            
		</div>
	</header>
	<br>
	

    

	<div class="d-flex flex-wrap justify-content-around">

<?php  
 session_start();

function loadClass(string $class)
    {
        require "$class.php";
    }
    spl_autoload_register("loadClass");

    $manager = new ArticleManager();
    $articles = $manager->getAllByTitles();

    if ($_POST) {
        $datas = [
           // "id" => $_GET["id"],
            "title" => $_POST["title"],  
        ];
        foreach($articles as $article){
            if($article->getTitle() == $datas['title']){
               // var_dump($article->getTitle());
                ?>
                <div class="card m-5" style="width: 18rem;" style="display: flex;">
  		<img src="<?= $article->getUrl() ?>" class="card-img-top" alt="">
  		<div class="card-body">
    	<h5 class="card-title"><?= $article->getTitle() ?></h5>
    	<p class="card-text"><?= $article->getContent() ?> </p>
    	<?= $article->getCreate_at() ?>
    	<p><?= $article->getAuthor() ?> </p>
    	<br>
    	<div class="d-flex justify-content-center">
    		<a href="read.php?id=<?= $article->getId() ?>" class="btn btn-success"style="width: 50px"> <img src="lire.png" style="width: 120%;"></a>

    		<a  onclick="del()" class="btn btn-danger" style="width: 50px" ><img src="poubelle.png" style="width: 90%;"> </a>

    		<a href="update.php?id=<?= $article->getId() ?>" class="btn btn-warning" style="width: 50px"> <img src="modiff.png" style="width: 90%;"> </a>

    		<a href="" onclick="" class="btn btn-primary" style="width: 50px"> <img src="like.png" style="width: 110%"></a>

    	</div>
    	</div>
    	</div>
          	<?php  } ?>
     		<?php   } ?>
 		<?php } ?>

    <?php foreach ($articles as $article) { ?>

    <div class="card m-5" style="width: 18rem;" style="display: flex;">
  		<img src="<?= $article->getUrl() ?>" class="card-img-top" alt="">
  		<div class="card-body">
    	<h5 class="card-title"><?= $article->getTitle() ?></h5>
    	<p class="card-text"><?= $article->getContent() ?> </p>
    	<?= $article->getCreate_at() ?>
    	<p><?= $article->getAuthor() ?> </p>
    	<br>
    	<div class="d-flex justify-content-center">
    		<a href="read.php?id=<?= $article->getId() ?>" class="btn btn-success"style="width: 50px"> <img src="lire.png" style="width: 120%;"></a>

    		<a  onclick="del()" class="btn btn-danger" style="width: 50px" ><img src="poubelle.png" style="width: 90%;"> </a>

    		<a href="update.php?id=<?= $article->getId() ?>" class="btn btn-warning" style="width: 50px"> <img src="modiff.png" style="width: 90%;"> </a>

    		<a href="" onclick="" class="btn btn-primary" style="width: 50px"> <img src="like.png" style="width: 110%"></a>

    	</div>

    		<div id="commentaire-<?= $article->getId() ?>" style="display: none;">
    			<br>
        		<textarea></textarea>
    		</div>
    		<script src="script.js"></script>

    		<script>
            function del() {
                let text = "Êtes-vous sur de vouloir supprimer cet article ?";
                if (confirm(text) == true) {
                    window.location.href = "deletee.php? id=<?= $article->getId() ?>"
                } else {
                    text = "Annuler";
                	}
            	}
        	</script>
    		
  		</div>

	</div>
   <?php } ?>
</div>
<!--<script type="text/javascript">
	function delete_all(id){
		if (confirm("confirmer la suppression de l'article")) {
			window.location.href="delete.php?id=" + id
		}

	}
</script>-->

<script>
		console.log("dsjd");

	</script>	

</body>

</html>