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
        <legend> Ajouter-Commissaire : </legend>

        <label for="typee"> Type de course : </label>
        <input type="radio" name="typee" value="H">H
        <input type="radio" name="typee" value="F">F<br/>

        <label for="nom"> Nom commissaire : </label>
        <input type="text" id="nom" name="nom" size="20" maxlength="20" />
        <br/>

        <label for="prenom"> Prenom commissaire :</label>
        <input type="text" id="prenom" name="prenom" size="20" maxlength="20" />
        <br/>

        <label for="mdp"> Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" size="20" maxlength="20" />
        <br/>


        <input type="submit" value="Ajouter" class="boutton" name="addcommis"> <br/>
        <input type="reset" value="Effacer" class="boutton"> <br/>


    </fieldset>

</form>




</body>
</html>

