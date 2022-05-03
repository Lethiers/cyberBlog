<?php
    class Utilisateur{
        //attributs
        Protected $id_util;
        Protected $name_util;
        Protected $first_name_util;
        Protected $mail_util;
        Protected $pwd_util;
        Protected $id_role;
        
        //constructeur
        public function __construct($name, $first, $mail, $password, $role){
            $this->name_util = $name;
            $this->first_name_util = $first;
            $this->mail_util = $mail;
            $this->pwd_util = $password;
            $this->id_role = $id_role;
        }
        //Getter and Setter
        public function getIdUtil():int{
            return $this->id_util;
        }
        public function getNameUtil():string{
            return $this->name_util;
        }
        public function getFirstNameUtil():string{
            return $this->first_name_util;
        }
        public function getMailUtil():string{
            return $this->mail_util;
        }
        public function getPwdUtil():string{
            return $this->pwd_util;
        }
        public function getIdRole():int{
            return $this->id_role;
        }

        public function setIdUtil($id):void{
            $this->id_util = $id;
        }
        public function setNameUtil($name):void{
            $this->name_util = $name;
        }
        public function setFirstNameUtil($first):void{
            $this->first_name_util = $first;
        }
        public function setMailUtil($mail):void{
            $this->mail_util = $id;
        }
        public function setPwdUtil($password):void{
            $this->pwd_util = $password;
        }
        public function setIdRole($role):void{
            $this->id_role = $role;
        }
        //Méthodes
        //création d'un utilisateur en BDD (utilisateur)
        public function createUser($bdd):void{
            //récupérer les valeurs de l'objet
            $name = $this->getNameUtil();
            $first = $this->getFirstNameUtil();
            $mail = $this->getMailUtil();
            $password = $this->getPwdUtil();
            $role = $this->getIdRole();
            try{
                $req = $bdd->prepare('INSERT INTO utilisateur (name_util, first_name_util,
                mail_util, pwd_util, id_role) VALUES (:name_util, :first_name_util, :mail_util, :pwd_util, :id_role)');
                $req->execute(array(
                    'name_util' => $name,
                    'first_name_util' => $first,
                    'mail_util' => $mail,
                    'pwd_util' => $password,
                    'id_role' => $role
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //récupérer si l'utilisateur (id_util) existe en BDD (utilisateur)
        public function showUserById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM utilisateur 
                WHERE id_util = :id_util');
                $req->execute(array(
                    'id_util' => $this->getIdUtil(),
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

        public function showUserByMail($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM utilisateur 
                WHERE mail_util = :mail_util');
                $req->execute(array(
                    'mail_util' => $this->getMailUtil(),
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

