<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="article.css">
    <title>Read</title>
</head>

<body>
	<header>
		<h1 class="sport">Actuality Website</h1>
		<div id="conteneur">
			<button class="bouton"><a href="index.php"><strong>Home</strong></a></button>
			<button class="bouton1"><a href="create.php"><strong>New Article</strong></a></button>
			<button class="bouton"><a href="read.php"><strong>Read</strong></a></button>
			<button class="bouton"><a href="page4.html"><strong>Vide</strong></a></button>
			<button class="bouton"><a href="page5.html"><strong>Profil</strong></a></button>
		</div>
	</header>
	<br>

<?php 

function loadClass(string $class)
    {
        require "$class.php";
    }
    spl_autoload_register("loadClass");

$manager = new ArticleManager();

$id = $_GET["id"];
$article = $manager->get($id);

$manager = new CommentManager();
$comments = $manager->getAllByArticleId($id);

if ($_POST) {
        $manager = new CommentManager();

        $newComment = new Comment($_POST);
        $newComment->setArticle_id($id);

        $manager->add($newComment);
    
    	echo "<script>window.location.href='read.php?id=$id'</script>";
    }
?>
<div class="d-flex justify-content-center">
	<div class="card m-5" style="width: 18rem;" style="display: flex;">
  		<img src="<?= $article->getUrl() ?>" class="card-img-top" alt="">
  		<div class="card-body">
	    	<h5 class="card-title"><?= $article->getTitle() ?></h5>
	    	<p class="card-text"><?= $article->getContent() ?> </p>
	    	<?= $article->getCreate_at() ?>
	    	<p><?= $article->getAuthor() ?> </p>
	    	<br>
	    	<div class="d-flex justify-content-center">
	    		<a href="deletee.php ?id=<?= $article->getId() ?>" class="btn btn-danger">Delete</a>
	    		<a href="update.php?id=<?= $article->getId() ?>" class="btn btn-warning" style="width: 50px"> <img src="modiff.png" style="width: 90%;"> </a>
	    		<a href="javascript:;" onclick="toggleCommentForm()" class="btn btn-primary">New Comment</a>
	    	</div>
	    	<br>
	    	<div class="d-flex justify-content-center">
	    	<button class="btn btn-success" id="mask">Display / Hide comments</button>
	    	</div>
	    	<div id="comments">
	    	<?php foreach ($comments as $comment) { ?>
	    		<div>
		    		<br>
		       		<h5 class="card-title"><?= $comment->getTitle() ?></h5>
		   			<p class="card-text"><?= $comment->getContent() ?></p>
		   			<p><?= $comment->getCreate_at() ?></p>
		   			<p><?= $comment->getAuthor() ?> </p>
		   			<br>
		   			<a href="delete.php?id=<?= $comment->getId($id) ?>" class="btn btn-danger"> Delete </a>
		   			<a href="updatec.php?id=<?= $comment->getId($id) ?>" class="btn btn-warning" style="width: 50px"> <img src="modiff.png" style="width: 90%;"> </a>
				</div>
	    	<?php } ?>
	    	</div>

    		<form method="POST" class="container" id="comment-form" style="display: none">
				<label>Title :</label>
        		<input type="text" name="title" id="title" class="form-control">
        		<label>Content :</label>
        		<textarea type="text" name="content" id="content" class="form-control"></textarea>
        		<label>Author :</label>
        		<input type="text" name="author" id="author" class="form-control">
        		<input type="submit" value="Publish" class="btn btn-primary">
    		</form>
  		</div>
	</div>
</div>

	<script src="./script.js"></script>
	<script type="text/javascript">
		let mask = document.getElementById("mask");
		let comments = document.getElementById("comments");
		mask.addEventListener("click", () => {
  		if(getComputedStyle(comments).display != "none"){
    		comments.style.display = "none";
  		} else {
    	comments.style.display = "block";
  }
})
</script>
</body>
</html>