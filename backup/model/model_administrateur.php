<?php

    Class Administrateur extends Utilisateur{

        public function showAllUser($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM utilisateur');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        public function setRoleUserById($bdd, $id_role, $id_util):void{
            try{
                $req = $bdd->prepare('UPDATE utilisateur SET id_role = :id_role, 
                WHERE id_util = :id_util');
                $req->execute(array(
                    'id_role' => $id_role,
                    'id_util' =>$id_util
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }