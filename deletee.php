<?php  

function loadClass(string $class)
    {
        require "$class.php";
    }
    spl_autoload_register("loadClass");

$manager = new ArticleManager();

if ($_GET) {
	$manager->delete($_GET['id']);
	echo "<script>window.location.href='read.php?id=$article_id'</script>";
}