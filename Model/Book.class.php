<?php
class Book{
    private $idbook;
    private $bookName;
    private $idstatut;
    private $synopsis;
    private $nbPage;
    private $dateAcquis;
    private $idedition;
    private $renseignement;

 function __construct($idbook, $bookName, $idstatut, $synopsis, $nbPage, $dateAcquis, $idedition,$renseignement)
    {
        $this->idbook = $idbook;
        $this->bookName = $bookName;
        $this->idstatut = $idstatut;
        $this->synopsis = $synopsis;
        $this->nbPage = $nbPage;
        $this->dateAcquis = $dateAcquis;
        $this->idedition = $idedition;
        $this->renseignement = $renseignement;
    }

    /**
     * @return mixed
     */
    public function getRenseignement()
    {
        return $this->renseignement;
    }

    /**
     * @param mixed $renseignement
     */
    public function setRenseignement($renseignement)
    {
        $this->renseignement = $renseignement;
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

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @param mixed $bookName
     */
    public function setBookName($bookName)
    {
        $this->bookName = $bookName;
    }

    /**
     * @return mixed
     */
    public function getIdstatut()
    {
        return $this->idstatut;
    }

    /**
     * @param mixed $idstatut
     */
    public function setIdstatut($idstatut)
    {
        $this->idstatut = $idstatut;
    }

    /**
     * @return mixed
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param mixed $synopsis
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return mixed
     */
    public function getNbPage()
    {
        return $this->nbPage;
    }

    /**
     * @param mixed $nbPage
     */
    public function setNbPage($nbPage)
    {
        $this->nbPage = $nbPage;
    }

    /**
     * @return mixed
     */
    public function getDateAcquis()
    {
        return $this->dateAcquis;
    }

    /**
     * @param mixed $dateAcquis
     */
    public function setDateAcquis($dateAcquis)
    {
        $this->dateAcquis = $dateAcquis;
    }

    /**
     * @return mixed
     */
    public function getIdedition()
    {
        return $this->idedition;
    }

    /**
     * @param mixed $idedition
     */
    public function setIdedition($idedition)
    {
        $this->idedition = $idedition;
    }

}