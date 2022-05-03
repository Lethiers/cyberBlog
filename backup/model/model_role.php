<?php
    class Role{
        protected $id_role;
        protected $name_role;

        public function __construct($name){
            $this->name_role = $name;
        }
        public function getIdRole():int{
            return $this->id_role;
        }
        public function getNameRole():string{
            return $this->name_role;
        }
        public function setIRole($id):void{
            $this->id_role = $id;
        }
        public function setNameRole($name):void{
            $this->name_role = $name;
        }
        
                /*-------Ajouter Role -------*/

        // public function addRole($bdd):void{
        //     $name = $this->getNameRole();
        //     try{
        //         $req = $bdd->prepare('INSERT INTO role(name_role) 
        //         VALUES(:name_role)');
        //         $req->execute(array(
        //             'name_role' => $nom,
        //             ));
        //     }
        //     catch(Exception $e)
        //     {
        //         die('Erreur : '.$e->getMessage());
        //     }
        // }


        public function showAllRole($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM role');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
    }
?>