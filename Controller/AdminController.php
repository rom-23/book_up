<?php

class AdminController extends BaseController{


    public function do_Get() {
        $page = $this->getDecodeParams('id', null);
        $include="";
        if($page==1){
            $include = "Vue/INCLUDE/admin-auteur.php";
        }else if($page==2){
            $include = "Vue/INCLUDE/admin-edition.php";
        }else{
            $include = "Vue/INCLUDE/admin-livre.php";
        };
/*        $auteur = MySQL_BookDAO::getAllAuteur();
        $edition = MySQL_BookDAO::getAllEdition();
        $this->setAttribute('Auteur',$auteur);
        $this->setAttribute('Edition',$edition);*/
        $this->setAttribute('include',$include);
        $this->dispatch('Vue/Admin/Admin.php');
    }

    public function do_Post() {


        $this->do_Get();
    }


}