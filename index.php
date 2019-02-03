<?php require_once "UtilBD.php";?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Page d'authentification</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<fieldset>
    <legend>Authentification : </legend>
    <form action="traitement.php" method="post">
        Login: <input type="text" name="login"><br>
        Password:<input type="password" name="password"><br>
        <input name="action" value="authentifier" type="submit">
    </form>

</fieldset>

</body>
</html>
