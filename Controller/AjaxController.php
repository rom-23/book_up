<?php
class AjaxController extends BaseController
{

    public function do_Get()
    {
        if(isset($_GET['listbook'])) {
            $var = MySQL_BookDAO::getbookList();
            echo(json_encode($var));
        }

        if(isset($_GET['allbook'])) {
            $list = MySQL_BookDAO::getAllBook();
            echo(json_encode($list));
        }
        if(isset($_GET['listAut'])) {
            $listA = MySQL_BookDAO::getAllAuteur();
            echo(json_encode($listA));
        }
        if(isset($_GET['listEdit'])) {
            $listEd = MySQL_BookDAO::getAllEdition();
            echo(json_encode($listEd));
        }
        if(isset($_GET['countAut'])) {
            $count = MySQL_BookDAO::countAllAuteur();
            echo(json_encode($count));
        }
        if(isset($_GET['countEdit'])) {
            $counte = MySQL_BookDAO::countAllEdition();
            echo(json_encode($counte));
        }
        if(isset($_GET['nomAuteur'])) {
            if(MySQL_BookDAO::isExist($_GET['nomAuteur'])<1) {
                MySQL_BookDAO::insertAuteur(null, $_GET['nomAuteur']);
                echo(json_encode("ok"));
            }else{
                echo(json_encode("doublon"));
            }
        }
        if(isset($_GET['nomEdition'])) {
            if(MySQL_BookDAO::isExistEdition($_GET['nomEdition'])<1) {
                MySQL_BookDAO::insertEdition(null, $_GET['nomEdition']);
                echo(json_encode("ok"));
            }else{
                echo(json_encode("doublon"));
            }
        }

        if (isset($_GET['idSynopsis'])) {
            $synopsis = MySQL_BookDAO::getSynopsis($_GET['idSynopsis']);
            echo json_encode($synopsis[0]['synopsis']);
       }
        if (isset($_GET['update_id'])&&isset($_GET['idb'])&&isset($_GET['libelle'])) {
            var_dump($_GET['update_id'],$_GET['idb'],$_GET['libelle']);
            $updateT = MySQL_BookDAO::updateMe($_GET['libelle'],$_GET['update_id'],$_GET['idb']);
            echo json_encode($updateT);
        }
        if (isset($_GET['update_id_suite'])&&isset($_GET['idb'])&&isset($_GET['libelle'])) {
            var_dump($_GET['update_id_suite'],$_GET['idb'],$_GET['libelle']);
            $updateS = MySQL_BookDAO::updateMeSuite($_GET['libelle'],$_GET['update_id_suite'],$_GET['idb']);
            echo json_encode($updateS);
        }
        if (isset($_GET['nomB'])&&isset($_GET['nbP'])&&isset($_GET['syno'])&&isset($_GET['idb'])) {
            var_dump($_GET['nomB'],$_GET['nbP'],$_GET['syno'],$_GET['idb']);
            $updateSc = MySQL_BookDAO::updateMeSuite2($_GET['nomB'],$_GET['nbP'],$_GET['syno'],$_GET['idb']);
            echo json_encode($updateSc);
        }


    }

    public function do_Post()
    {


        if (isset($_FILES)) {
            if (count($_FILES) == 0) {
                $tabresponse = [];
                array_push($tabresponse, array("reponse" => "fichiers trop lourds !"));
                echo json_encode($tabresponse);
            } else {
                $count = count($_FILES['files']['name']);
                $dat = Services_PublicFonction::format_date_us_toStr(date("Y-m-d H:i:s"));
                $tabresponse = [];
                for ($i = 0; $i < $count; $i++) {
                    $book = new Book(null, $_FILES['files']['name'][$i], 1, "", 0, $dat, 1, 0);
                    $file = new FichierBook(null, $_FILES['files']['name'][$i], null);
                    array_push($tabresponse, array("reponse" => MySQL_BookDAO::saveFile($file, $book)));
                }
                echo json_encode($tabresponse);
            }
        }


    }

}

