<?php
// import
// -- BDD
include './utils/connectBdd.php';
// -- model article
include './model/model_article.php';
// -- view
include './view/view_create_art.php';



// ------------------- logic -----------------

// --------message d'erreur
$message = "";


if (isset($_POST['create_art'])) {
    if (isset($_POST['name_art'])&& !empty($_POST['name_art'])&&
    isset($_POST['content_art'])&& !empty($_POST['content_art']) &&
    isset($_POST['date_art'])&& !empty($_POST['date_art'])) {
        
        $art = new Article (null,null,null);

        $art->setNameArticle($_POST['name_art']);
        $art->setContentArticle($_POST['content_art']);
        $art->setDateArticle($_POST['date_art']);

        $art->newArticle($bdd,$_GET['id']);

        $message = 'l\'article '.$art->getNameArticle().' est créé';

    }else {
        $message = "merci de remplir tout les champs";
    }
}else {
    $message = "merci de remplir les champs";
}

// ----- impression erreur
echo $message;

?>