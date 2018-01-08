<?php
namespace location\dao;

include 'Proprietaire_class.php';

class Bien{
    var $id;
    var $idTypeBien;
    var $idPro;
    var $commission;
    var $nom;
    var $adresse;
    var $montantLoc;
    var $etat;


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
/************AJOUTER UN BIEN*******************/ 

    function addBien()
    {
        $this->getConnexion();
     
        $prop = new Proprietaire();
        $prop->allProprietaire();
       if( $reponse =$donnees ->fetch()){
           echo "Ce proprieraire existe deja"; 
        }else
        {
   // requete a executer
       $sql = "INSERT into Bien (id,nom,adresse,montantLoc,commission,idTypeBien,idPro,etat)
                  values(null, :nom, :adresse, :montanLoc :commision,null,null, :etat)";
                  
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('nom'=>$this->nom   ,
                  'adresse'=>$this->adresse,
                  'montantLoc'=>$this->montantLoc,
                  'commision'=>$this->commission,
                  'etat'=>$this->etat,
        ));
    }

        return $data;
    }

/***********UPDATE BIEN*******************/ 

    function UpdateBien($id)
    {
        $this->getConnexion();
        // requete a executer
$sql = "UPDATE Bien SET id=$this->id,nom=$this->nom,adresse=$this->adresse,
montantLoc=$this->montantLoc,commission=$this->commission,
idTypeBien=$this->idTypeBien,idPro=$this->idPro,etat=$this->etat WHERE id='$id'   ";      // preparation de la requete
        $donnees = $this->bdd->query($sql);
    }

    /************TROUVEZ UN BIEN PAR SON NOM*******************/ 

    function FindBienByName($nom)
    {
        $this->getConnexion();
        // requete a executer
         $sql2="SELECT * from typeBien where nom='$nom' ";
         $donnees = $this->bdd->query($sql2);
        return $donnees;  
     } 


 /************LISTE DES BIEN*******************/ 
                      
   function allBien()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "SELECT id, nom, adresse, montantLoc,commission,idTypeBien,etat FROM Bien";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }

   /************LISTE DES BIENS PAR TYPE*******************/ 

    function listBienByType($idTypeBien)
    {
        $this->getConnexion();
        // requete a executer
         $sql2="SELECT * from Bien where idTypeBien='$idTypeBien' ";
         $donnees = $this->bdd->query($sql2);
         return $donnees;                            
     } 

     /************LISTE DES BIENS PAR DISPONIBILITE*******************/ 

      function listByEtat($etat)
    {
        $this->getConnexion();
        // requete a executer
         $sql2="SELECT * from Bien where etat='$etat' ";
         $donnees = $this->bdd->query($sql2);
        return $donnees;                            
     }  


}
