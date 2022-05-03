<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_commentaire.php';

    //test si l'id de l'article à supprimer existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $com = new Commentaire(null, null, null, null);
        $_GET['id']= intval($_GET['id']);
    
        $comment->setIdCom($_GET['id']);
        $tab = $comment->showCommentById($bdd);
        $nom = $tab[0]['content_com'];
        $comment->deleteCommentById($bdd);
        header("Location: /evalGroup/showArticle?del=$nom");
    }
    //sinon
    else{
        header('Location: /evalGroup/showArticle?noId');
    }

?>