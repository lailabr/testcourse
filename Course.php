<?php


class Course{



    private $_titre;
    private $_heure;
    private $_categorie;
    private $_jour;
    private $_typee;
    private $_idCom;

    /**
     * Course constructor.
     * @param $_titre
     * @param $_heure
     * @param $_categorie
     * @param $_jour
     * @param $_typee
     * @param $_idCom
     */
    public function __construct($_titre, $_heure, $_categorie, $_jour, $_typee, $_idCom)
    {
        $this->_titre = $_titre;
        $this->_heure = $_heure;
        $this->_categorie = $_categorie;
        $this->_jour = $_jour;
        $this->_typee = $_typee;
        $this->_idCom = $_idCom;
    }


    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->_titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->_heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->_heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->_categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->_categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getJour()
    {
        return $this->_jour;
    }

    /**
     * @param mixed $jour
     */
    public function setJour($jour)
    {
        $this->_jour = $jour;
    }

    /**
     * @return mixed
     */
    public function getTypee()
    {
        return $this->_typee;
    }

    /**
     * @param mixed $typee
     */
    public function setTypee($typee)
    {
        $this->_typee = $typee;
    }

    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->_idCom;
    }

    /**
     * @param mixed $idCom
     */
    public function setIdCom($idCom)
    {
        $this->_idCom = $idCom;
    }



}