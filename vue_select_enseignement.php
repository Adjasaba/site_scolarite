<h3> Liste des enseignements </h3>
<form method="post">
    Filter par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> Id enseignement </td>
        <td> Nom de la matière </td>
        <td> Nombre d'heures </td>
        <td> Coefficient de la matière </td>
        <td> La classe de l'étudiant </td>
        <td> Le professeur </td>
        <td> Opérations </td>
        
    </tr>
<?php
if (isset($lesEnseignements)){
    foreach ($lesEnseignements as $unEnseignement){
        echo "<tr>";
        echo "<td>".$unEnseignement['idenseignement']."</td>";
        echo "<td>".$unEnseignement['matiere']."</td>";
        echo "<td>".$unEnseignement['nbheures']."</td>";
        echo "<td>".$unEnseignement['coeff']."</td>";
        echo "<td>".$unEnseignement['idclasse']."</td>";
        echo "<td>".$unEnseignement['idprofesseur']."</td>";
        echo "<td> <a href='index.php?page=2&action=sup&idclasse=".$unEnseignement['idenseignement']."'>";
        echo "<img src='image/supprimer.png' height='30' witdh'30'> </a>";
        echo "<a href='index.php?page=2&action=sup&idclasse=".$unEnseignement['idenseignement']."'>";
        echo "<img src='image/editer.png' height='30' witdh'30'> </a>";
        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>