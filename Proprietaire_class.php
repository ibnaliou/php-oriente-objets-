<?php
namespace  location\dao;

class Proprietaire{
    var $id;
    var $numPiece;
    var $nom;
    var $tel;
    private $bdd;

/************CONNECTION*******************/ 

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
/************ADD PROPRIETAIRE*******************/ 

    function addProprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "insert into Proprietaire 
                  values(null, :numP, :nom, :tel)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('numP'=>$this->numPiece   ,
                  'nom'=>$this->nom,
                  'tel'=>$this->tel
        ));
        return $data;
    }

    /************ALL PROPRIETAIRE*******************/ 

    function allProprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "select * from Proprietaire";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }

    /************FIND PROPRIETAIRE*******************/ 

 function findPropritaireByNci($numPiece)
    {
        $this->getConnexion();
     // requete a executer
         $sql="select * from Proprietaire where numPiece='$numPiece' ";
        $donnees = $this->bdd->query($sql);
        return $donnees;

                            
                                
     } 


/************UPDATE TEL PROPRIETAIRE*******************/ 

     function UpdateTelPro($id,$tel)
    {
        $this->getConnexion();
     // requete a executer
         $sql="UPDATE Proprietaire SET tel = '$tel' WHERE Proprietaire.id = '$id';  ";
        $donnees = $this->bdd->query($sql);
        return $donnees;

                            
                                
     }    

}
