<?php require_once "UtilBD.php";
require_once "DAO.php";
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Afficher Categorie</title>
    <script type="text/javascript" src="JS/jequery.js"></script>
    <script>
        $(document).ready(function(){
            $("#cats").change(function(){
                var idCat =$(this).val();
                $.get("participants.php?idCat="+idCat,function(data){
                    $("#divProd").html(data);
                });

            });
        });



    </script>
</head>
<body>
<div>
    Categories :
    <div id="divCat">
        <select id="cats">
            <?php
            $listeCategories =listeCategories();

            while ($data = ObjetSuivant($listeCategories)) { ?>
                <option value="<?php $categ =($data->categorie); echo $data->categorie ;?>"><?php echo $data->categorie?></option>
            <?php } ?>


        </select>
    </div>
</div>
<div>
    Participants :
    <div id="divProd">


    </div>
</div>
<button ><a href="resultats.php">Resultats</a></button>

</body>
</html>

