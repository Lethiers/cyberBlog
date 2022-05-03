<?php
//import
include './utils/connectBdd.php';
include './model/model_cat.php';
include './view/view_show_cat.php';


//instancier un nouvel objet
$cat = new Categorie(null);
//stocke dans un tableau la liste des articles de la BDD
$tab = $cat->showAllCategorie($bdd);
//boucle pour afficher la liste des articles (avec le nom et le prix)
foreach($tab as $value){
    echo '<li>
    '.$value->name_cat.'
    <a href="createArticle?id='.$value->id_cat.'">pour créer un article</a>
    </li>';
}

echo '<ul>';

?>