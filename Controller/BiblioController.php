<?php

class BiblioController extends BaseController{


    public function do_Get() {
        $idbook = $this->getDecodeParams('id', null);
            if (isset($idbook)) {
                var_dump($idbook);
            }
        $this->dispatch('Vue/Biblio/Biblio.php');

    }

    public function do_Post(){

        $this->do_Get();
    }

}

