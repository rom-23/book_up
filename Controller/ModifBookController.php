<?php

class ModifBookController extends BaseController{


    public function do_Get() {
        $idbook = $this->getDecodeParams('id', null);
        $auteur = MySQL_BookDAO::getAllAuteur();
        $statut = MySQL_BookDAO::getAllStatut();
        $genre = MySQL_BookDAO::getAllGenre();
        $langue = MySQL_BookDAO::getAllLangue();
        $edition = MySQL_BookDAO::getAllEdition();

        $book = MySQL_BookDAO::getRecap($idbook);
        $book2 = MySQL_BookDAO::getBookById($idbook);
        $book3 = MySQL_BookDAO::getFileById($idbook);
        $this->setAttribute('Book',$book);
        $this->setAttribute('Book2',$book2);
        $this->setAttribute('Book3',$book3);
        $this->setAttribute('IdBook',$idbook);
        $this->setAttribute('AuteurBook',$auteur);
        $this->setAttribute('StatutBook',$statut);
        $this->setAttribute('GenreBook',$genre);
        $this->setAttribute('LangueBook',$langue);
        $this->setAttribute('EditionBook',$edition);
        $this->dispatch('Vue/ModifBook/ModifBook.php');
    }

    public function do_Post() {


        $this->do_Get();
    }


}