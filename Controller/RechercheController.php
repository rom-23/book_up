<?php

class RechercheController extends BaseController{


    public function do_Get() {


        $this->dispatch('Vue/Recherche/Recherche.php');

    }

    public function do_Post(){

        $this->do_Get();
    }

}

