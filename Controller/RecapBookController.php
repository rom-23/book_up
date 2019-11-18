<?php

class RecapBookController extends BaseController{


    public function do_Get() {

        $this->dispatch('Vue/RecapBook/RecapBook.php');
    }

    public function do_Post(){

    if (isset($_POST['idbook'])&&isset($_POST['bookTitle'])&& isset($_POST['statutBook'])&& isset($_POST['synops'])&& isset($_POST['nbpage'])&& isset($_POST['dateAcquis'])&& isset($_POST['edition'])){
        $book = new Book($_POST['idbook'], $_POST['bookTitle'], $_POST['statutBook'], $_POST['synops'], $_POST['nbpage'],$_POST['dateAcquis'],$_POST['edition'],1);
        $update = MySQL_BookDAO::updateBook($book);
        MySQL_BookDAO::insertNewBook($_POST['idbook'],$_POST['auteur'],$_POST['genreBook'],$_POST['langueBook']);
        $recap = MySQL_BookDAO::getRecap($_POST['idbook']);
        $this->setAttribute('Update',$update);
        $this->setAttribute('Recap',$recap);

    }


       $this->do_Get();
    }

}