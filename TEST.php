<?php require_once "UtilBD.php";
require_once "DAO.php";
?>

<?php
$listeResultats =getAllResults("jh");

    while ($data = $listeResultats->fetch()) {
        $data2 = ObjetSuivant(getNomFromParticipant(intval($data->dossard)));
            echo $data2->nom."<br/>";
            echo $data->place."<br/>";
            echo $data->temps."<br/>";





    }
    ?>