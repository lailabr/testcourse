<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Afficher Course</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>

<form method="post" action="traitement.php" >
    <fieldset>
        <legend> Afficher-Courses : </legend>
        <h1>Liste des Courses programmées dans ce meeting </h1>

        <table border="1">
            <tr>
                <th>Hommes</th>
                <th>Femmes</th>
            </tr>
            <?php
            $listeHommes =listeCourseHommes();
            $listeFemme =listeCourseFemmes();

            while (($data=ObjetSuivant($listeHommes)) && ($data2=ObjetSuivant($listeFemme)))
            {?>
                <tr>

                    <td><?php echo $data->categorie ?></td>
                    <td><?php echo $data2->categorie ?></td>
                </tr>
            <?php
            }

            ?>

        </table>
        <hr><br/>
        <label for="categorie"> Categorie  : </label>
        <select name="categorie">
            <?php
            $listeCategories=listeCategories();
            while ($data=ObjetSuivant($listeCategories))
            {?>
            <option value="<?php echo $data->categorie?>"> <?php  echo $data->categorie ?></option>


           <?php
            }
            ?>

        </select><br/>

        <label for="dossard"> Dossard  : </label>
        <input type="number" id="dossard" name="dossard" value="<?php
        $listeDossard = getLastid();
        while ($data=$listeDossard->fetch())
        {
            echo intval($data->dossard)+1; ;
        }
?>" size="20" maxlength="20"  disabled="true"/>
        <br/>

        <label for="nom"> Nom  : </label>
        <input type="text" id="nom" name="nom" size="20" maxlength="20" />
        <br/>

        <label for="prenom"> Prenom  :</label>
        <input type="text" id="prenom" name="prenom" size="20" maxlength="20" />
        <br/>

        <label for="datenaissance"> Date naissance :</label>
        <input type="date" id="datenaissance" name="datenaissance" size="20" maxlength="20" />
        <br/>

        <label for="typee"> Type de course : </label>
        <input type="radio" name="typee" value="H">H
        <input type="radio" name="typee" value="F">F<br/>

        <input type="submit" value="Ajouter" class="boutton" name="addparticipant"> <br/>
        <input type="reset" value="Effacer" class="boutton"> <br/>



    </fieldset>

</form>




</body>
</html>

