<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>
<?php

if(isset($_GET['titreId']))
{

    $titre=$_GET['titreId'];

    $listeResultats =getAllResults($titre);


}


?>

<table border="1">
    <tr>
        <th>dossard</th>
        <th>place</th>
        <th>temps</th>


    </tr>
    <?php
    while ($data = $listeResultats->fetch()) {
        $data2 = ObjetSuivant(getNomFromParticipant(intval($data->dossard)));
        echo "<tr>";
        echo "<td>".$data2->nom."</td> ";
        echo "<td>".$data->place."</td> ";
        echo "<td>".$data->temps."</td> ";


        echo "</tr>";
    }
    ?>


</table>
