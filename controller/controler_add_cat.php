<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_cat.php';
    include './view/view_add_cat.php';
//variable message
$msg = "Ajoutez une categorie";
$categorie = new Categorie(null);
//test si le bouton ajouté est cliqué
if(isset($_POST['add'])){
    //test si les champs sont rempli
    if(isset($_POST['name_cat'])  AND 
    $_POST['name_cat'] != "" ){
        //instancier un nouvel objet Article (appel au constructeur)
        $cat = new Categorie($_POST['name_cat']);
        //appel à la méthode addCat de la classe Categorie
        $cat->addCat($bdd);
        //utiliser le getter pour afficher le nom
        $msg = ''.$_POST['name_cat'].' à été ajouté';
    }
    //si vide
    else{
        $msg = 'Veuillez remplir les champs du formulaire';
    }
}    
//Affichage en JS des Messages 
echo $msg;
echo "<script>zoneMsg.innerHTML = '$msg'</script>";
?>



















  