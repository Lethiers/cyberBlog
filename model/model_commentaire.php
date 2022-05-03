<?php
    class Commentaire{
        /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        private $id_com;
        private $id_util;
        private $id_art;
        private $content_com;
        private $date_com;
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($content, $date){
            $this->content_com = $content;
            $this->date_com = $date;
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdCom():int{
            return $this->id_com;
        }
        public function getContentCom():string{
            return $this->content_com;
        }
        public function getDateCom():string{
            return $this->date_com;
        }
        public function getIdUtil():int{
            return $this->id_util;
        }
        public function getIdArt():int{
            return $this->id_art;
        }
        public function setIdCom($id):void{
            $this->id_com = $id;
        }
        public function setContentCom($content):void{
            $this->content_com = $content;
        }
        public function setDateCom($date):void{
            $this->date_com = $date;
        }
        public function setIdUtil($id):void{
            $this->id_util = $id;
        }
        public function setIdArt($id):void{
            $this->id_art = $id;
        }

        /*-----------------------------------------
                        METHODES
        ----------------------------------------*/
        //ajouter un Commentaire
        public function addComment($bdd,$id_util,$id_art):void{
            $content = $this->getContentCom();
            $date = $this->getDateCom();
            try{
                $req = $bdd->prepare('INSERT INTO commentaire(content_com, date_com, id_util, id_art) 
                VALUES(:content_com, :date_com, :id_util, :id_art)');
                $req->execute(array(
                    'content_com' => $content,
                    'date_com' =>$date,
                    'id_util' =>$id_util,
                    'id_art' =>$id_art
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        //supprimer un commentaire par son id
        public function deleteCommentById($bdd):void{
            try{
                $req = $bdd->prepare('DELETE FROM commentaire 
                WHERE id_com = :id_com');
                $req->execute(array(
                    'id_com' => $this->getIdCom(),
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        //afficher tous les commentaires
        public function showAllComment($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM commentaire');
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
    }
