<?php
class ConnectionBdd {

    private static $bdd;
    private static $instance = null;

    private function __construct(){
        try{
            self::$bdd = new PDO('mysql:host=localhost;dbname=bookup_bookup','root','');
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo ' probleme avec la base donnees ...';
            echo '<br><br>erreur PDO : '.$e->getMessage();
            echo '<br><br><a href="/Home">retour</a><br><br>';
            die();
        }
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new ConnectionBdd();
        }
        return self::$bdd;
    }

    public static function closeConnection() {
        try {
            if(self::$instance!=null) { self::$bdd=null; }
            self::$bdd=null;
            self::$instance=null;
        } catch (SQLException $e) {
            die('Erreur :'.$e.getMessage());
        }
    }


}
?>
