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
            //route /evalmvc/test -> ./test.php
            case $path === "/cyberBlog/test" : 
                include './test.php';
                break ;

            case $path === "/cyberBlog/addUser" : 
                    include './controller_add_user.php';
                    break ;
                    
            case $path === "/cyberBlog/createArticle" : 
                    include './controller/ctrl_article.php';
                    break ;


            case $path === "/cyberBlog/showArticle" : 
                    include './controller/ctrl_show_article.php';
                    break ;

        //route en cas d'erreur
            case $path !== "/cyberBlog/":
                include './controler/controler_connexion.php';
                break ;
            }
?>