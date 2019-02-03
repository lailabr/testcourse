<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>
<?php

if(isset($_GET['jourId']))
{

    $jour=$_GET['jourId'];

    $listeCourses =getAllCourses($jour);


}


?>

<table border="1">
    <tr>
        <th>Heure</th>
        <th>Epreuve</th>
        <th>Tour</th>
        <th</th>

    </tr>
    <?php
    while ($data = $listeCourses->fetch()) {
        echo "<tr>";
        echo "<td>".$data->heure."</td> ";
        echo "<td>".$data->titre."</td> ";
        echo "<td>final</td> ";
        echo "<td> <a href='resultatFinal.php'>>>Resultats</a></td> ";

        echo "</tr>";
    }
    ?>


</table>
