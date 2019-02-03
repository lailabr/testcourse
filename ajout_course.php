<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter Course</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script type="text/javascript">
        <?php
                if(isset($_GET['message']))
                 $message =$_GET['message'];
                {?>
                    alert("<?php echo $message?>");
                <?php
                }
        ?>

    </script>

</head>
<body>

    <form method="post" action="traitement.php" >
        <fieldset>
            <legend> Ajouter-Course</legend>

            <label for="titre"> Titre : </label>
            <input type="text" id="titre" name="titre" size="20" maxlength="20" />
            <br/>

            <label for="heure"> Heure :</label>
            <input type="time" id="heure" name="heure" size="20" maxlength="20" />
            <br/>

            <label for="categorie"> Categorie :</label>
            <input type="text" id="categorie" name="categorie" size="20" maxlength="20" />
            <br/>


            <label for="jour"> Jour : </label>
            <select name="jour">
                <option id="1">Samedi 25 janvier</option>
                <option id="2">Samedi 26 janvier</option>

            </select>
            <br/>
            <label for="typee"> Type de course : </label>
            <input type="radio" name="typee" value="H">H
            <input type="radio" name="typee" value="F">F<br/>
            <label for="commis">Commissaire :</label>
            <select name="id_Com">
                <?php
                $result = getAllCommissaires();
                while ($data=ObjetSuivant($result))
                {
                    ?>
                    <option value="<?php echo $data->id ?>"><?php echo $data->nom?></option>
                <?php
                }
                ?>

            </select><br/>

            <input type="submit" value="Ajouter" class="boutton" name="addCourse"> <br/>
            <input type="reset" value="Effacer" class="boutton"> <br/>


        </fieldset>

    </form>




</body>
</html>

