<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>
<?php
session_start();
if(isset($_GET['idCat']))
{

    $idCat=$_GET['idCat'];
    $_SESSION['categ'] = $_GET['idCat'];
    $listeParticipants = AllParticipants($idCat);


}


?>

<table border="1">
    <tr>
        <th>Dossard</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de Naissance</th>

    </tr>
    <?php
    while ($data = $listeParticipants->fetch()) {
        echo "<tr>";
        echo "<td>".$data->dossard."</td> ";
        echo "<td>".$data->nom."</td> ";
        echo "<td>".$data->prenom."</td> ";
        echo "<td>".$data->datenaissance."</td> ";

        echo "</tr>";
    }
    ?>


</table>
