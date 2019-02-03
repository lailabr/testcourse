<?php require_once "UtilBD.php";
require_once "DAO.php"; ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter Course</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="JS/jequery.js"></script>
    <script>
        $(document).ready(function(){
            $("#jour").change(function(){
                var jourId =$(this).val();
                $.get("courses.php?jourId="+jourId,function(data){
                    $("#divCourses").html(data);
                });
            });
        });
    </script>
</head>
<body>

    <fieldset>
        <legend> Meeting international de rabat: </legend>
        <h3> le 25 et 26 janvier</h3>

        <div>
            <label for="jour"> Jour : </label>
            <select id="jour">
                <option value="Samedi 25 janvi">Samedi 25 janvi</option>
                <option value="Dimanche 26 jan">Dimanche 26 jan</option>

            </select>
        </div>
        <div>
            Courses :
            <div id="divCourses">


            </div>
        </div>


    </fieldset>



