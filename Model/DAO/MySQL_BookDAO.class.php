<?php

class MySQL_BookDAO
{
    private static $pdo;

    public static function isExist($nom){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = 0;
        try {
            $data = self::$pdo->prepare("SELECT 1 as result FROM autheur WHERE nomAuteur = '$nom'");
            $data->execute();
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                $resultat=$resultat+$row['result'];
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function isExistEdition($nom){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = 0;
        try {
            $data = self::$pdo->prepare("SELECT 1 as result FROM edition WHERE nomEdition = '$nom'");
            $data->execute();
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                $resultat=$resultat+$row['result'];
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function saveFile($file,$book)
    {
        $mess="";
        self::$pdo = ConnectionBdd::getInstance();
        try {
            $data = self::$pdo->prepare("SELECT idbook FROM bookfichier WHERE nomFichier='".$file->getNomFichier()."'");
            $data->execute();
            $conteA = $data->rowCount();
                if($conteA < 1)
                {
                    $data = self::$pdo->prepare("INSERT INTO book(idbook,bookName,idstatut,synopsis,nbPage,dateAcquis,idedition,renseignement)
                                             VALUES(?,?,?,?,?,?,?,?);");
                    $data->execute(array_values((array)$book));
                    (array)$book->setIdbook(self::$pdo->lastInsertId());
                    $id = self::$pdo->lastInsertId();
                    (array)$file->setIdbook($id);
                    $data = self::$pdo->prepare("INSERT INTO bookfichier(idbookfichier,nomFichier,idbook)
                                             VALUES(?,?,?);");
                    $data->execute(array_values((array)$file));
                    (array)$file->setIdbookfichier(self::$pdo->lastInsertId());
                    $data->closeCursor();
                    self::$pdo=ConnectionBdd::closeConnection();
                    $mess = "Enregistrement reussi";
                }else{
                    $mess="Deja present dans la base";
                }
        }catch(BddException $e){
            throw new BddException($e->getMessage());
        }
    return $mess;
    }
    public static function getBookById($idbook){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try {
            $data = self::$pdo->prepare("SELECT book.idbook,book.bookName,book.synopsis,book.nbPage,book.dateAcquis,book.renseignement,statut.nomstatut,edition.nomEdition
                                          from book,edition,statut 
                                          where book.idstatut = statut.idstatut
                                          AND book.idedition = edition.idedition
                                          AND book.idbook = ?;");
            $data->bindParam(1,$idbook,PDO::PARAM_INT);
            $data->execute();
            while ($rows = $data->fetch(PDO::FETCH_ASSOC)) {
                array_push($resultat, array("idbook" => $rows['idbook'],
                    "bookName" => $rows['bookName'],
                    "synopsis" => $rows['synopsis'],
                    "nbPage" => $rows['nbPage'],
                    "dateAcquis" => $rows['dateAcquis'],
                    "renseignement" => $rows['renseignement'],
                    "nomstatut" => $rows['nomstatut'],
                    "nomEdition" => $rows['nomEdition']
                ));};
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getFileById($idbook){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try {
            $data = self::$pdo->prepare("SELECT book.idbook,bookfichier.nomFichier,book.synopsis,book.nbPage,book.dateAcquis,book.renseignement,statut.nomstatut,edition.nomEdition
                                          from book,edition,statut,bookfichier 
                                          where book.idstatut = statut.idstatut
                                          AND book.idedition = edition.idedition
                                          AND book.idbook=bookfichier.idbook
                                          AND book.idbook = ?;");
            $data->bindParam(1,$idbook,PDO::PARAM_INT);
            $data->execute();
            while ($rows = $data->fetch(PDO::FETCH_ASSOC)) {
                array_push($resultat, array("idbook" => $rows['idbook'],
                    "nomFichier" => $rows['nomFichier'],
                    "synopsis" => $rows['synopsis'],
                    "nbPage" => $rows['nbPage'],
                    "dateAcquis" => $rows['dateAcquis'],
                    "renseignement" => $rows['renseignement'],
                    "nomstatut" => $rows['nomstatut'],
                    "nomEdition" => $rows['nomEdition']
                ));};
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getbookList(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try {
            $data = self::$pdo->prepare("SELECT book.idbook,book.bookName,book.dateAcquis,book.renseignement from book where book.renseignement =0 order by book.dateAcquis DESC;");
            $data->execute();
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                array_push($resultat, array("idbook"=>$row['idbook'],"bookName"=>$row['bookName'],"dateAcquis"=>$row['dateAcquis']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllGenre(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try{
            $data=self::$pdo->prepare("SELECT type.idtype,type.libelletype FROM type;");
            $data->execute();
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                array_push($resultat,array("idtype"=>$row['idtype'],
                    "libelletype"=>$row['libelletype']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllStatut(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try{
            $data=self::$pdo->prepare("SELECT statut.idstatut,statut.nomstatut FROM statut;");
            $data->execute();
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                array_push($resultat,array("idstatut"=>$row['idstatut'],
                    "nomstatut"=>$row['nomstatut']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllLangue(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try{
            $data=self::$pdo->prepare("SELECT langue.idlangue,langue.nomLangue FROM langue;");
            $data->execute();
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                array_push($resultat,array("idlangue"=>$row['idlangue'],
                    "nomLangue"=>$row['nomLangue']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllAuteur(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try{
            $data=self::$pdo->prepare("SELECT autheur.idautheur,autheur.nomAuteur FROM autheur order by autheur.nomAuteur ASC;");
            $data->execute();
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                array_push($resultat,array("idautheur"=>$row['idautheur'],
                    "nomAuteur"=>$row['nomAuteur']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllEdition(){

        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try{
            $data=self::$pdo->prepare("SELECT edition.idedition,edition.nomEdition FROM edition ORDER BY edition.nomEdition ASC;");
            $data->execute();
            while($row=$data->fetch(PDO::FETCH_ASSOC)){
                array_push($resultat,array("idedition"=>$row['idedition'],
                    "nomEdition"=>$row['nomEdition']));
            }
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getRecap($idBook){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try {
            $data = self::$pdo->prepare("SELECT type.libelletype,statut.nomstatut,langue.nomLangue,edition.nomEdition,autheur.nomAuteur
                                          from book,booktype,type,bookautheur,autheur,booklangue,langue,edition,statut 
                                          where book.idstatut = statut.idstatut
                                          AND book.idedition = edition.idedition
                                          AND booktype.idbook = book.idbook
                                          AND booktype.idtype = type.idtype
                                          AND bookautheur.idbook = book.idbook
                                          AND bookautheur.idautheur = autheur.idautheur
                                          AND booklangue.idbook = book.idbook
                                          AND booklangue.idlangue = langue.idlangue
                                          AND book.idbook = ?;");
            $data->bindParam(1,$idBook,PDO::PARAM_INT);
            $data->execute();
            $rows = $data->fetch(PDO::FETCH_ASSOC);
            array_push($resultat, array("libelletype" => $rows['libelletype'],
                "nomstatut" => $rows['nomstatut'],
                "nomLangue" => $rows['nomLangue'],
                "nomEdition" => $rows['nomEdition'],
                "nomAuteur" => $rows['nomAuteur']
            ));
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getAllBook(){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        $text='';
        $text2='';
        $text3='';
        $text4='';
        $text5='';
        try {
            $data = self::$pdo->prepare("SELECT book.idbook,book.bookName,book.nbPage,book.dateAcquis,statut.nomstatut,edition.nomEdition,type.libelletype,langue.nomLangue,autheur.nomAuteur
                                          from book,edition,statut,type,booktype,langue,booklangue,autheur,bookautheur 
                                          where book.idstatut = statut.idstatut
                                          AND book.idedition = edition.idedition
                                      AND booktype.idtype = type.idtype
                                      AND book.idbook = booktype.idbook
                                      AND langue.idlangue = booklangue.idlangue
                                      AND booklangue.idbook = book.idbook
                                      
                                      AND autheur.idautheur = bookautheur.idautheur
                                      AND bookautheur.idbook = book.idbook
                                          AND book.renseignement = 1
                                          ;");
            $data->execute();
            while($rows=$data->fetch(PDO::FETCH_ASSOC)){
                if ($rows['nomstatut']=='non determine'){
                    $text = '...';}
                else{
                    $text=$rows['nomstatut'];
                };
                if ($rows['nomLangue']=='non determine'){
                    $text2 = '...';}
                else{
                    $text2=$rows['nomLangue'];
                };
                if ($rows['libelletype']=='non determine'){
                    $text3 = '...';}
                else{
                    $text3=$rows['libelletype'];
                };
                if ($rows['nomEdition']=='non determine'){
                    $text4 = '...';}
                else{
                    $text4=$rows['nomEdition'];
                };
                if ($rows['nomAuteur']=='non determine'){
                    $text5 = '...';}
                else{
                    $text5=$rows['nomAuteur'];
                };
                array_push($resultat, array(
                    "bookName" => "<a href='ModifBook-".$rows['idbook']."'>".$rows['bookName']."</a>",
                    "dateAcquis" => $rows['dateAcquis'],
                    "libelletype" => $text3,
                    "nbPage" => $rows['nbPage'],
                    "idbook" => $rows['idbook'],
                    "nomstatut" => $text,
                    "nomEdition" => $text4,
                    "nomLangue" => $text2,
                    "nomAuteur" => $text5,
                    "synopsis"=>$rows['idbook']
                ));};
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function updateBook($book){
        self::$pdo = ConnectionBdd::getInstance();
        $bn =$book->getBookName();
        $bs =$book->getIdstatut();
        $bsy =$book->getSynopsis();
        $bnp =$book->getNbPage();
        $bd =$book->getDateAcquis();
        $bide =$book->getIdedition();
        $bre =$book->getRenseignement();
        $idb =$book->getIdbook();
        try {
            $data = self::$pdo->prepare("UPDATE book
                                          SET bookName = ?,
                                          idstatut = ?,
                                          synopsis = ?,
                                          nbPage = ?,
                                          dateAcquis = ?,
                                          idedition = ?,
                                          renseignement = ?
                                           WHERE idbook = ?;");
            $data->bindParam(1,$bn);
            $data->bindParam(2,$bs);
            $data->bindParam(3,$bsy);
            $data->bindParam(4,$bnp);
            $data->bindParam(5,$bd);
            $data->bindParam(6,$bide);
            $data->bindParam(7,$bre);
            $data->bindParam(8,$idb);
            $data->execute();
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
return $book;

    }
    public static function updateMe($libelle,$idt,$idb){
    self::$pdo = ConnectionBdd::getInstance();
    $chaine = "book".$libelle;
        $chaine2 = "id".$libelle;
    try {
        $data = self::$pdo->prepare("UPDATE $chaine
                                          SET $chaine2 = ?
                                           WHERE idbook = ?;");

        $data->bindParam(1,$idt,PDO::PARAM_INT);
        $data->bindParam(2,$idb,PDO::PARAM_INT);
        $data->execute();
        $data->closeCursor();
        self::$pdo=ConnectionBdd::closeConnection();
    }catch(PDOException $e){
        throw new BddException($e->getMessage());
    }
    return "update ok";
}
    public static function updateMeSuite($libelle,$id_update,$idboo){
        self::$pdo = ConnectionBdd::getInstance();
        $chaine2 = "id".$libelle;
        try {
            $data = self::$pdo->prepare("UPDATE book
                                          SET $chaine2 = ?
                                           WHERE idbook = ?;");

            $data->bindParam(1,$id_update,PDO::PARAM_INT);
            $data->bindParam(2,$idboo,PDO::PARAM_INT);
            $data->execute();
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return "update ok";
    }
    public static function updateMeSuite2($nom,$nbp,$syn,$idbk){
        self::$pdo = ConnectionBdd::getInstance();
        try {
            $data = self::$pdo->prepare("UPDATE book
                                          SET bookName = ?,
                                          synopsis = ?,
                                          nbPage = ?
                                           WHERE idbook = ?;");

            $data->bindParam(1,$nom,PDO::PARAM_STR);
            $data->bindParam(2,$syn,PDO::PARAM_STR);
            $data->bindParam(3,$nbp,PDO::PARAM_INT);
            $data->bindParam(4,$idbk,PDO::PARAM_INT);
            $data->execute();
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return "update ok";
    }
    public static function insertNewBook($id,$auteur,$genre,$langue)
    {
        self::$pdo = ConnectionBdd::getInstance();
        try {
            $data = self::$pdo->prepare("INSERT INTO bookautheur(idbook,idautheur)
                                         VALUES(?,?);");
            $data->bindParam(1,$id);
            $data->bindParam(2,$auteur,PDO::PARAM_INT);
            $data->execute();
            $data = self::$pdo->prepare("INSERT INTO booklangue(idbook,idlangue)
                                         VALUES(?,?);");
            $data->bindParam(1,$id);
            $data->bindParam(2,$langue,PDO::PARAM_INT);
            $data->execute();
            $data = self::$pdo->prepare("INSERT INTO booktype(idbook,idtype)
                                         VALUES(?,?);");
            $data->bindParam(1,$id);
            $data->bindParam(2,$genre,PDO::PARAM_INT);
            $data->execute();
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
    }
    public static function insertAuteur($idAut,$nomAut)
    {
        self::$pdo = ConnectionBdd::getInstance();
        try {
            $data = self::$pdo->prepare("INSERT INTO autheur(idautheur,nomAuteur)
                                         VALUES(?,?);");
            $data->bindParam(1,$idAut,PDO::PARAM_INT);
            $data->bindParam(2,$nomAut);
            $data->execute();
                       $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
    }
    public static function insertEdition($idedit,$nomEdit)
    {
        self::$pdo = ConnectionBdd::getInstance();
        try {
            $data = self::$pdo->prepare("INSERT INTO edition(idedition,nomEdition)
                                         VALUES(?,?);");
            $data->bindParam(1,$idedit,PDO::PARAM_INT);
            $data->bindParam(2,$nomEdit);
            $data->execute();
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
    }
    public static function countAllAuteur(){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = "";
        try{
            $data=self::$pdo->prepare("Select count(idautheur) from autheur;");
            $data->execute();
            $rows = $data->fetch();
                $resultat = $rows;

            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function countAllEdition(){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = "";
        try{
            $data=self::$pdo->prepare("Select count(idedition) from edition;");
            $data->execute();
            $rows = $data->fetch();
            $resultat = $rows;
            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }
        return $resultat;
    }
    public static function getSynopsis($idb){
        self::$pdo = ConnectionBdd::getInstance();
        $resultat = array();
        try {
            $data = self::$pdo->prepare("SELECT synopsis
                                          from book
                                          where book.idbook = ?;");
            $data->bindParam(1,$idb,PDO::PARAM_INT);
            $data->execute();
           $rows = $data->fetch();
                array_push($resultat, array("synopsis" => $rows['synopsis']));

            $data->closeCursor();
            self::$pdo=ConnectionBdd::closeConnection();
        }catch(PDOException $e){
            throw new BddException($e->getMessage());
        }

        return $resultat;

    }


//---------------------------------------------------------------------------------------------------------------

}