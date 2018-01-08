<?php
namespace location\dao;

class TypeDeBien{
    var $id;
    var $nom;
    private $bdd;

    private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd = new PDO('mysql:host=;dbname=BDLocation;charset=utf8', 'root', 'passer',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }       
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
   /************AJOUTEZ TYPE DE BIEN*******************/ 

    function addTypeBien()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "insert into typeBien 
                  values(null, :nom)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                  'nom'=>$this->nom,
                  
        ));
        return $data;
    }

       /************TOUS LES TYPES DE BIENS*******************/ 

    function allTypeBien()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "select * from typeBien";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }

       /************TROUVER UN BIEN PAR SON ID*******************/ 

    function FindTypeBienByID($id)
    {
        $this->getConnexion();
     // requete a executer
         $sql2="select * from typeBien where id='$id' ";
         $req=$bdd->prepare($sql2);
       $req ->execute(array($id));

                            
                                
     }                       

    }



