<?php
class Modele {
    private $unPDO ;
    public function __construct (){
        try{
            $this->unPDO = new PDO (
                'mysql:host=localhost;dbname=scolarite_iris_2025',
                'root', '') ;
           
        }
    catch (PDOException $exp)
    {
        echo "Erreur connexion :",$exp->getMessage();
    }
    }
   /*************************************Gestion des classe ********************************************/
 public function selectALLClasses (){
        $requete = "select * from classe ;" ;
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
        return $select->fetchAll();
        }
        public function searchALLClasses ($filtre){
            $requete = "select * from classe where nom like :filtre or salle like :filtre or diplome like :filtre;" ;
            $donnees=array(":filtre"=> "%".$filtre."%");
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
            return $select->fetchAll();
            }
        public function insertClasse ($tab){
            $requete = "insert into classe values (null, :nom, :salle, :diplome);" ;
            $donnees =array(    ":nom" =>$tab['nom'],
                                ":salle"=>$tab['salle'],
                                ":diplome"=>$tab['diplome']);
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
        }
        public function deleteClasse ($idclasse){
            $requete = "delete from classe where idclasse = :idclasse ;" ;
            $donnees =array (":idclasse"=>$idclasse);
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
        }
         public function selectWhereClasse ($idclasse) {
         $requete = "select * from classe where idclasse =:idclasse;" ;
         $donnees =array (":idclasse"=>$idclasse);
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
            $uneClasse = $select->fetch ();
            return $uneClasse;
        }
        public function updateClasse ($tab){
            $requete="update classe set nom = :nom, salle=:salle, diplome=:diplome where idclasse=:idclasse ;";
            $donnees=array(
                ":nom"=>$tab['nom'],
                ":salle"=>$tab['salle'],
                ":diplome"=>$tab['diplome'],
                ":idclasse"=>$tab['idclasse']);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);  
        }
        public function countClasses () {
            $requete ="select count(*) as nb from classe;";
            $select = $this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }
          /*************************************Gestion des professeurs ********************************************/
     public function selectALLProfesseurs (){
      $requete = "select * from professeur ;" ;
      $select = $this->unPDO->prepare ($requete);
      $select->execute ();
       return $select->fetchAll();
     }
     public function searchALLProfesseurs ($filtre){
        $requete = "select * from professeur where nom like :filtre or prenom like :filtre or diplome like :filtre;" ;
        $donnees=array(":filtre"=> "%".$filtre."%");
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
        return $select->fetchAll();
        }
    public function insertProfesseur ($tab){
        $requete = "insert into professeur values (null, :nom, :prenom, :email, :diplome);" ;
        $donnees =array(    ":nom" =>$tab['nom'],
                            ":prenom"=>$tab['prenom'],
                            ":email"=>$tab['email'],
                            ":diplome"=>$tab['diplome']);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
    }
    public function deleteProfesseur ($idprofesseur){
        $requete = "delete from professeur where idprofesseur = :idprofesseur ;" ;
        $donnees =array (":idprofesseur"=>$idprofesseur);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
    }
     public function selectWhereProfesseur ($idprofesseur) {
     $requete = "select * from professeur where idprofesseur =:idprofesseur;" ;
     $donnees =array (":idprofesseur"=>$idprofesseur);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
        $unProfesseur = $select->fetch ();
        return $unProfesseur;
    }
    public function updateProfesseur ($tab){
        $requete="update professeur set nom = :nom, prenom=:prenom, diplome=:diplome where idprofesseur=:idprofesseur ;";
        $donnees=array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":diplome"=>$tab['diplome'],
            ":idprofesseur"=>$tab['idprofesseur']);
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);  
    }
    public function countProfesseurs() {
        $requete ="select count(*) as nb from professeur;";
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
        return $select->fetch();
    }
   
     /*************************************Gestion des etudiants ********************************************/
     public function selectALLEtudiants (){
        $requete = "select * from etudiant ;" ;
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
         return $select->fetchAll();
       }
      public function insertEtudiant ($tab){
          $requete = "insert into etudiant values (null, :nom, :prenom, :email, :datenaiss, :statut, :idclasse);" ;
          $donnees =array(
                              ":nom" =>$tab['nom'],
                              ":prenom"=>$tab['prenom'],
                              ":email"=>$tab['email'],
                              ":datenaiss"=>$tab['datenaiss'],
                              ":statut"=>$tab['statut'],
                              ":idclasse"=>$tab['idclasse']);
          $select = $this->unPDO->prepare ($requete);
          $select->execute ($donnees);
      }
      public function countEtudiants () {
        $requete ="select count(*) as nb from etudiant;";
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
        return $select->fetch();
    }
       /*************************************Gestion des enseignements********************************************/
     public function selectALLEnseignements (){
        $requete = "select * from enseignement ;" ;
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
         return $select->fetchAll();
       }
      public function insertEnseignement ($tab){
          $requete = "insert into enseignement values (null, :matiere, :nbheures, :coeff, :idclasse, :idprofesseur);" ;
          $donnees =array(  ":matiere" =>$tab['matiere'],
                              ":nbheures"=>$tab['nbheures'],
                              ":coeff"=>$tab['coeff'],
                              ":idclasse"=>$tab['idclasse'],
                              ":idprofesseur"=>$tab['idprofesseur']);
          $select = $this->unPDO->prepare ($requete);
          $select->execute ($donnees);
      }
      public function verifConnexion ($email, $mdp){
        $requete = "select * from user where email=:email and mdp =:mdp;";
        $select =$this->unPDO->prepare($requete);
 
        $select-> bindValue (":email", $email, PDO::PARAM_STR);
        $select->bindValue (":mdp", $mdp, PDO::PARAM_STR);
        $select -> execute ();
        $unUser = $select->fetch();
        return $unUser;
    }
    public function countEnseignements() {
        $requete ="select count(*) as nb from enseignement;";
        $select = $this->unPDO->prepare ($requete);
        $select -> execute ();
        return $select->fetch();
    }
    public function selectALLInscriptions (){
        $requete = "select * from inscription ;" ;
        $select = $this->unPDO->prepare ($requete);
        $select->execute ();
        return $select->fetchAll();
        }
 
 /***************************************************Appel de procedure****************************** */
 public function appelProcedure ($nomP, $tab){
    $chaine = "'".implode ("','", $tab)."'";
    $requete ="call ".$nomP."(". $chaine .");";
    $select = $this->unPDO->prepare ($requete);
    $select->execute();
 }
 
 }
 
 
?>