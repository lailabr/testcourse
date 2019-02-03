<?php require_once "UtilBD.php";
require_once "DAO.php";
session_start();
?>
<?php
if(isset($_SESSION['categ']))
{
    $categ =$_SESSION['categ'];
}
?>
<head>

</head>
<body>

<form method="post" action="traitement.php" >
    <fieldset>
        <legend> Resultats : </legend>

        <label for="dossard"> Dossard : </label>
        <input type="text" name="dossard"/><br/>

        <label for="place"> Place : </label>
        <input type="number" id="place" name="place" size="20" maxlength="20" />
        <br/>

        <label for="temps"> Time: :</label>
        <input type="time" id="temps" name="temps" size="20" maxlength="20" />
        <br/>



        <input type="submit" value="Ajouter" class="boutton" name="results"> <br/>
        <input type="reset" value="Effacer" class="boutton"> <br/>


    </fieldset>

</form>




</body>
</html>

