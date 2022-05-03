<?php
    //session start
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    /*--------------------------ROUTER -----------------------------*/
        //test de la valeur $path dans l'URL et import de la ressource
        switch($path){

            case $path === "/cyberBlog/addArticle" : 
                include './controller/ctrl_article.php';
                break ;

                
            case $path === "/cyberBlog/showArticle" : 
                include './controller/ctrl_show_article.php';
                break ;




            }
?>