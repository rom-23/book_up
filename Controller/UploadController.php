<?php

class UploadController extends BaseController{


    public function do_Get() {


        $this->dispatch('Vue/Upload/Upload.php');

    }

    public function do_Post(){

        $this->do_Get();
    }

}

