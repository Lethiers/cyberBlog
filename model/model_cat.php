<?php
    class Categorie{
        /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        private $id_cat;
        private $name_cat;
      
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($name){
            $this->name_cat = $name;
        
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdCategorie():int{
            return $this->id_cat;
        }
        public function getNomCategorie():string{
            return $this->name_cat;
        }
        public function setIdCategorie($id):void{
            $this->id_cat = $id;
        }
        public function setNomCategorie($nom):void{
            $this->name_cat = $nom;
        }   
        public function addCat($bdd):void{
            $nom = $this->getNomCategorie();
            
            try{
                $req = $bdd->prepare('INSERT INTO categorie(name_cat) 
                VALUES(:name_cat)');
                $req->execute(array(
                    'name_cat' => $nom,
                    
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        public function showAllCategorie($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM categorie');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //afficher le détail d'un article
        public function showCategorieById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM categorie
                WHERE id_cat = :id_cat');
                $req->execute(array(
                    'id_cat' => $this->getIdCategorie(),
                    ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }   
?>