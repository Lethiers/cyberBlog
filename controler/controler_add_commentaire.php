<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_commentaire.php';
    include './view/view_add_commentaire.php';
    //variable message
    $msg = "Ajoutez un commentaire";
    $com = new Commentaire(null, null, null, null);
    //test si le bouton ajouté est cliqué
    if(isset($_POST['add'])){
        //test si les champs sont rempli
        if(isset($_POST['add_commentaire']) AND $_POST['add_commentaire'] !=""){
            //instancier un nouvel objet Commentaire (appel au constructeur)
            $comment = new Commentaire($_POST['add_commentaire']);
            //appel à la méthode addComment de la classe Commentaire
            $comment->addComment($bdd,$id_util,$id_art);
            //utiliser le getter pour afficher le nom
            $msg = ''.$_POST['content_com'].' à été ajouté';
        }
        //si vide
        else{
            $msg = 'Veuillez remplir les champs du formulaire';
        }
    }    
    //Affichage en JS des Messages 
    echo "<script>zoneMsg.innerHTML = '$msg'</script>";
?>