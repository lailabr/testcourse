<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Get Table from DB using Ajax</title>
    <script type="text/javascript" src="JS/jequery.js"></script>
    <script>
        $(document).ready(function(){
            $("#titres").change(function(){
                var titreId =$(this).val();
                $.get("tableResultatFromDB.php?titreId="+titreId,function(data){
                    $("#divRes").html(data);
                });
            });
        });

    </script>
</head>
<body>
<div>
    Categories :
    <div id="divTit">
        <select id="titres">
            <?php
            $listeTitres = getAllResult();
            while ($data = $listeTitres->fetch()) { ?>
                <option value="<?php echo $data->titre ?>"><?php echo $data->titre?></option>
            <?php } ?>


        </select>
    </div>
</div>
<div>
    Resultats :
    <div id="divRes">


    </div>
</div>
</body>
</html>