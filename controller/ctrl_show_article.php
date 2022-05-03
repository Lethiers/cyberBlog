<?php
// import
// -- BDD
include './utils/connectBdd.php';
// -- model article
include './model/model_article.php';
// -- view
include './view/view_all_art.php';



// ------------------- logic -----------------

// --------message d'erreur
$message = "";

$art = new Article (null,null,null);

$tab = $art->showAllArticle($bdd);


foreach($tab as $value){
    echo '<li> le nom:'.$value->name_art.' la date :'.$value->date_art.' le contenu :'.$value->content_art.'<a href="">supprimer</a> <a href=""> modifier</a><li>';
}


echo '<ul>';
echo '<div>';

?>