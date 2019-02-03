<?php require_once "UtilBD.php";
require_once "DAO.php";
require_once "Course.php";
session_start();
?>

<?php
if(isset($_POST['action']))
{
    if(isset($_POST['login']) && isset($_POST['password']))
    {
        $login=$_POST['login'];
        $password=$_POST['password'];
        $result=authentify($login,$password);

        if($result=="admin")
        {
           header("location:Administration.php");
        }else if($result=="commissaire") {
            header("location:affiche_categories.php");
        }else
            echo "Authentification echouée !";

    }

}


elseif (isset($_POST['addCourse']))
{
    $titre =$_POST['titre'];
    $heure =$_POST['heure'];
    $categorie=$_POST['categorie'];
    $jour=$_POST['jour'];
    $typee=$_POST['typee'];
    $id_Com =$_POST['id_Com'];

    if(isset($titre,$heure,$categorie,$jour,$typee,$id_Com))
    {
        addCourse($_POST);
        header("location:ajout_course.php?message=bien ajoutée");

    }else
        header("location:ajout_course.php?message=echouée");


}
elseif (isset($_POST['addcommis']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];
    $typee = $_POST['typee'];

    if (isset($nom, $prenom, $mdp,$typee)) {
        addCommisaire($_POST);
        header("location:ajout_commissaire.php?message=bien ajoutée");

    } else
        header("location:ajout_commissaire.php?message=echouée");

}

elseif (isset($_POST['addparticipant']))
{
    $categorie = $_POST['categorie'];
    $typee = $_POST['typee'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $datenaissance= $_POST['datenaissance'];
    if (isset($categorie,$typee,$nom,$prenom,$datenaissance))
    {
        addParticipant($_POST);
        header("location:afficher_courses.php?message=bien ajoutée");

    } else
        header("location:afficher_courses.php?message=echouée");

}
elseif (isset($_POST['results']))
{
    $dossard = $_POST['dossard'];
    $place = $_POST['place'];
    $temps = $_POST['temps'];
    $cat=$_SESSION['categ'];

    $listeTitre=getTitre($cat);

    while ($data=$listeTitre->fetch())
    {
        $titre=$data->titre;
        if (isset($dossard,$place,$temps))
        {
            addResults($titre,$dossard,$place,$temps);

            header("location:resultats.php?message=bien ajoutée");

        } else
            header("location:resultats.php?message=echouée");
    }


}

    if(isset($_GET['action']))
{
    $action=$_GET['action'];
    switch ($action)
    {
        case "AjouterCourse" :
            header("location:ajout_course.php");
            break;
        case "AjouterCommissaire":
            header("location:ajout_commissaire.php");
            break;
        case "AfficherCourse" :
            header("location:afficher_courses.php");
            break;
        case "Resultats" :
            header("location:ResultatsJour.php");
            break;

    }
}
