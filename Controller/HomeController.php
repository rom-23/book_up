<?php

class HomeController extends BaseController{


    public function do_Get() {


        $this->dispatch('Vue/Home/Home.php');

}

  public function do_Post(){

    $this->do_Get();
  }

}

