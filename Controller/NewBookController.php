<?php

class NewBookController extends BaseController{


    public function do_Get() {
        $idbook = $this->getDecodeParams('id', null);
        $statut = MySQL_BookDAO::getAllStatut();
        $genre = MySQL_BookDAO::getAllGenre();
        $langue = MySQL_BookDAO::getAllLangue();
        $edition = MySQL_BookDAO::getAllEdition();
        $auteur = MySQL_BookDAO::getAllAuteur();

        $book = MySQL_BookDAO::getBookById($idbook);
        $this->setAttribute('InfoBook',$book);
        $this->setAttribute('StatutBook',$statut);
        $this->setAttribute('GenreBook',$genre);
        $this->setAttribute('LangueBook',$langue);
        $this->setAttribute('EditionBook',$edition);
        $this->setAttribute('AuteurBook',$auteur);

        $this->dispatch('Vue/NewBook/NewBook.php');
    }

    public function do_Post() {


        $this->do_Get();
    }


}