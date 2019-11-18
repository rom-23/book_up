<?php

abstract class BaseController {

    private $data = array();

    public abstract function do_Get();

    public abstract function do_Post();

    // Appel une vue
    protected function dispatch($vue) {
        if (file_exists($vue)) {
            //Créer les variables associées aux data
            extract($this->data);
            //Inclut la page
            include_once $vue;
        }
    }

    // Ajoute des attributs pour la vue
    public function setAttribute($key, $object) {
        $this->data[$key] = $object;
    }

    /**
     * Récupère un paramètre de type GET ou POST
     *
     * @param String $key - La clé
     * @param Object $default - La valeur par defaut si elle n'existe pas
     * @return Object
     */
    protected function getParams($key, $default) {

        if(isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        else {
            return $default;
        }
    }

    /**
     * Récupère un paramètre de type GET ou POST (avec "urldecode()")
     *
     * @param String $key - La clé
     * @param Object $default - La valeur par defaut si elle n'existe pas
     * @return Object
     */
    protected function getDecodeParams($key, $default) {

        if(isset($_REQUEST[$key])) {
            return urldecode($_REQUEST[$key]);
        }
        else {
            return $default;
        }
    }
}
