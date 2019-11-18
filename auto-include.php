<?php

function __autoload($class_name) {
    //Pour les controlleurs
    $filname = $class_name . '.php';

    //Controller standard
    if (file_exists("Controller/$filname")) {
        require_once "Controller/$filname";
    }
    //Controller pour la section administrateur
    else if (file_exists("Controller/Admin/$filname")) {
        require_once "Controller/Admin/$filname";
    }
    //Pour le reste
    else {
        $filename = $class_name . '.class.php';

        //A la racine
        if (file_exists($filename)) {
            require_once $filename;
        }
        //DAO
        else if (file_exists("Model/DAO/$filename")) {
            require_once "Model/DAO/$filename";
        }
        //Model
        else if (file_exists("Model/$filename")) {
            require_once "Model/$filename";
        }
        //Test
        else if (file_exists("Services/$filename")) {
            require_once "Services/$filename";
        }
        //Non trouvé
        else {
            return false;
        }
    }
}
