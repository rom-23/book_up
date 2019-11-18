<?php
class FichierBook{

    private $idbookfichier;
    private $nomFichier;
    private $idbook;


    public function __construct($idbookfichier, $nomFichier, $idbook)
    {
        $this->idbookfichier = $idbookfichier;
        $this->nomFichier = $nomFichier;
        $this->idbook = $idbook;
    }

    /**
     * @return mixed
     */
    public function getIdbookfichier()
    {
        return $this->idbookfichier;
    }

    /**
     * @param mixed $idbookfichier
     */
    public function setIdbookfichier($idbookfichier)
    {
        $this->idbookfichier = $idbookfichier;
    }

    /**
     * @return mixed
     */
    public function getNomFichier()
    {
        return $this->nomFichier;
    }

    /**
     * @param mixed $nomFichier
     */
    public function setNomFichier($nomFichier)
    {
        $this->nomFichier = $nomFichier;
    }

    /**
     * @return mixed
     */
    public function getIdbook()
    {
        return $this->idbook;
    }

    /**
     * @param mixed $idbook
     */
    public function setIdbook($idbook)
    {
        $this->idbook = $idbook;
    }


}