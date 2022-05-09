<?php  

function loadClass(string $class)
    {
        require "$class.php";
    }
    spl_autoload_register("loadClass");

$manager = new CommentManager();

if ($_GET) {
	$comment = $manager->get($_GET['id']);
	$article_id = $comment->getArticle_id();
	$manager->delete($_GET['id']);	
	echo "<script>window.location.href='read.php?id=$article_id'</script>";
}
