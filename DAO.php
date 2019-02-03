<?php require_once "UtilBD.php";?>

<?php

function authentify($login,$password)
{
    $result ="";

    $listeAdmins =getAllAdmins();
    while ($data=ObjetSuivant($listeAdmins))
    {
        if(($data->user)==$login && ($data->mdp)==$password)
        {
            $result="admin";
            break;
        }

    }
    $listeCommis =getAllCommissaires();
    while ($data=ObjetSuivant($listeCommis))
    {
        if(($data->nom)==$login && ($data->mdp)==$password)
        {
            $result="commissaire";
            break;
        }

    }


    return $result;


}

/**
 * @return All admins
 */
function getAllAdmins()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $admins ="SELECT * FROM admin";
    $result =ExecRequete($admins,$connexion);
    return $result;
}

/**
 * @return All commissaires
 */
function getAllCommissaires()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $commissaires="SELECT * FROM commissaire";
    $result =ExecRequete($commissaires,$connexion);
    return $result;
}

function listeCourseFemmes()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $requete="SELECT * FROM course WHERE typee='F'";
    $result =ExecRequete($requete,$connexion);
    return $result;
}

function listeCourseHommes()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $requete="SELECT * FROM course WHERE typee='H'";
    $result =ExecRequete($requete,$connexion);
    return $result;
}

function listeCategories()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $requete="SELECT * FROM course ";
    $result =ExecRequete($requete,$connexion);
    return $result;
}

/**
 * Add course
 */
function addCourse(array $course){

    try{
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($course)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO course (titre,heure,categorie,jour,typee,id_Com) 
	    			VALUES (:titre,:heure,:categorie,:jour,:typee,:id_Com)");

            $stmt->bindParam(':titre', $course['titre']);
            $stmt->bindParam(':heure', $course['heure']);
            $stmt->bindParam(':categorie', $course['categorie']);
            $stmt->bindParam(':jour', $course['jour']);
            $stmt->bindParam(':typee', $course['typee']);
            $stmt->bindParam(':id_Com', $course['id_Com']);

            $stmt->execute();
            $connexion->commit();
           // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

/**
 * add Commissaire
 */
function addCommisaire(array $commis){

    try
    {
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($commis)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO commissaire (nom,prenom,mdp,typee) 
	    			VALUES (:nom,:prenom,:mdp,:typee)");

            $stmt->bindParam(':nom', $commis['nom']);
            $stmt->bindParam(':prenom', $commis['prenom']);
            $stmt->bindParam(':mdp', $commis['mdp']);
            $stmt->bindParam(':typee', $commis['typee']);

            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

function addParticipant(array $participant){

    try
    {
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($participant))
        {
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO participant (categorie,typee,nom,prenom,datenaissance) 
	    			VALUES (:categorie,:typee,:nom,:prenom,:datenaissance)");

            $stmt->bindParam(':categorie', $participant['categorie']);
            $stmt->bindParam(':typee', $participant['typee']);
            $stmt->bindParam(':nom', $participant['nom']);
            $stmt->bindParam(':prenom', $participant['prenom']);
            $stmt->bindParam(':datenaissance', $participant['datenaissance']);

            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}
/**
 * get the last dossard
 */
function getLastid()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  participant order by dossard desc limit 1");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getAllParticipants($dossard)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  participant where dossard='$dossard'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

/**
 * @param $categorie
 * @return mixed
 */
function AllParticipants($categorie)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  participant where categorie='$categorie'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

/**
 * @param $titre
 * @param $dossard
 * @param $place
 * @param $temps
 */
function addResults($titre,$dossard,$place,$temps){

    try
    {
          $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);

            $connexion->beginTransaction();
            $sql = ("INSERT INTO resultat (titre,dossard,place,temps) 
	    			VALUES (:titre,:dossard,:place,:temps)");
            $stm=$connexion->prepare($sql);
            $stm->execute(['titre'=>$titre ,'dossard'=>$dossard, 'place'=>$place,'temps'=>$temps]);


            $connexion->commit();
    }

    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }


}

function getTitre($categorie)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  course where categorie='$categorie'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}


function getAllCourses($jour)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT titre,heure FROM  course where jour='$jour'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getAllResults($titre)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM resultat where titre='$titre' order by place asc");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getAllResult()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  resultat ");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getNomFromParticipant($dossard)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT nom FROM  participant where dossard='$dossard'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}