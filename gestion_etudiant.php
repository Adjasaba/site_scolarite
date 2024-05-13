<h2>Gestion des étudiants</h2>

<?php

if (isset($_GET['action']) && isset($_GET['idetudiant']))
    {
        $action = $_GET['action'];
        $idclasse = $_GET['idetudiant'];

        switch($action)
        {
            case "sup" : $unControleur->deleteEtudiant($idetudiant); break;
            case "edit" : break;
        }
    }

    $lesClasses = $unControleur->selectAllClasses ();
    require_once ("vue/vue_insert_etudiant.php");

    if (isset($_POST['Valider']))
    {
        $unControleur->insertEtudiant ($_POST);
    }
    $lesEtudiants = $unControleur->selectAllEtudiants ();
   
    require_once ("vue/vue_select_etudiant.php");

?>