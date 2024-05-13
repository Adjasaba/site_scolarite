<?php
require_once ("modele/modele.class.php");
class Controleur {
    private $unModele ;

    public function __construct (){
        $this->unModele = new Modele ();
    }
    
    /****************** Gestion des classes ****************/
    public function selectAllClasses (){
        return $this->unModele->selectAllClasses();
    }

    public function searchAllClasses ($filtre){
        return $this->unModele->searchAllClasses($filtre);
    }
    //$tab <==> $_POST du formulaire
    public function insertClasse ($tab){
        $this->unModele->insertClasse($tab);
    }

    public function deleteClasse ($idclasse){
        return $this->unModele->deleteClasse($idclasse);
    }

    public function selectWhereClasse ($idclasse){
       return $this->unModele->selectWhereClasse($idclasse);
    }

    public function updateClasse ($tab){
        $this->unModele->updateClasse ($tab);
    }

    /*************** Gestion des etudiants********** */
    public function selectAllEtudiants (){
        return $this->unModele->selectAllEtudiants();
    }

    public function insertEtudiant ($tab){
        $this->unModele->insertEtudiant($tab);
    }

    public function deleteEtudiant ($idetudiant){
        return $this->unModele->deleteEtudiant($idetudiant);
    }
    
    /*************** Gestion des professeurs********** */
    public function selectAllProfesseurs (){
        return $this->unModele->selectAllProfesseurs();
    }

    public function insertProfesseur ($tab){
        $this->unModele->insertProfesseur($tab);
    }

    public function searchAllProfesseurs ($filtre){
        return $this->unModele->searchAllProfesseurs($filtre);
    }

    public function deleteprofesseur ($idprofesseur){
        return $this->unModele->deleteProfesseur($idprofesseur);
    }

    public function selectWhereProfesseur ($idprofesseur){
       return $this->unModele->selectWhereProfesseur($idprofesseur);
    }

    public function updateProfesseur ($tab){
        $this->unModele->updateProfesseur ($tab);
    }
    
    /*************** Gestion des enseignements ********** */
    public function selectAllEnseignements (){
        return $this->unModele->selectAllEnseignements();
    }

    public function insertEnseignement ($tab){
        $this->unModele->insertEnseignement($tab);
    }
}
?>