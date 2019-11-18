
<?php
session_start();
include 'auto-include.php';



//Si une page est demandé
if (isset($_GET['page'])) {
    $controller = $_GET['page'] . 'Controller';

    //Recherche si le controller de la page demandée existe
    if (class_exists($controller)) {
        $classController = new $controller();

        //Si une action est en paramètre URL (uniquement en post), Appel de la methode du même nom
        if ((isset($_POST['action'])) && (method_exists($classController, $_POST['action']))) {
            $classController->{$_POST['action']}();
        }
        //Si aucune action on appel de la methode get ou post
        else {
            //Appel de la methode get ou post
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $classController->do_Post();
            } else {
                $classController->do_Get();
            }
        }
    }
    else{ // sinon page erreur
        header('Location: /404');
    }
}
else{
    header('Location: Home');
}

