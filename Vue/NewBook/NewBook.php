<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
    <link rel="stylesheet" href="WebContent/CSS/style.css">
    <link rel="stylesheet" href="WebContent/CSS/menu.css">
    <link rel="stylesheet" href="WebContent/CSS/sidebar-menu.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>NewBook</title>
    <style>
        label{
            font-family: Verdana;
            font-size: 13px;
        }
        i{
            color: #a4a4a4;
        }
        i:hover{
            cursor: pointer;
            color: #9a26aa;
        }
    </style>
</head>
<body style="background-color: #0e1315;">
<?php include 'Vue/INCLUDE/navbar_culture.php';?>
<?php include 'Vue/INCLUDE/menu_responsive.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include 'Vue/INCLUDE/sidebar-menu.php';?>
        </div>
        <div class="col-md-10"style="background-color: rgba(2,2,5,0.14);margin-top: 1em;margin-bottom: 1em;">
            <div class="container" style="padding:1em;margin-top: 1em;border-bottom: 1px solid darkgrey;">
                <p style="color: #9214b3;font-family: 'Gruppo';font-size: 26px;">Enregistrement d'un nouveau livre</p>
            </div>
            <div class="container" style="text-align: center;">
                <form id="newBook" action="RecapBook" method="post" style="padding-top: 1em;font-family: Verdana;font-size: 14px;">
                <?php if (isset($InfoBook)){
                    echo "<p style='color: #9a42a3;font-size: 15px;'>Infos sur le fichier : </p>";
                    foreach ($InfoBook as $info){
                            echo "<p style='color: #a2a2c5;font-family: Verdana;font-size: 13px;'>Fichier téléchargé : " .$info['bookName']."</p>";
                            echo "<p style='color: #9f9fc2;font-family: Verdana;font-size: 13px;'>Date  Upload : " .$info['dateAcquis']."</p><input id='bna' type='hidden' value='".$info['bookName']."'/><input name='dateAcquis' type='hidden' value='".$info['dateAcquis']."'/><input name='idbook' type='hidden' value='".$info['idbook']."'/>";
               }};?>
            </div>
            <div class="modal fade right" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content" style="background-color:rgba(20,26,28,0.59);border-radius:5px;border: 0.5px solid #5d5768;color: #808080;font-family: Verdana;font-size: 13px;">
                        <div class="modal-header" style="border:0;">
                        </div>
                        <div class="modal-body" style="text-align: center;padding: 0;">
                            <img src="WebContent/IMAGE/alert.png" style="margin-bottom: 1em;"/>
                            <p style="font-family: Verdana;font-size: 13px;color: #919191;">Aucun titre pour ce livre !</p>
                            <input type="button" data-dismiss="modal" class="btn btn-outline-primary" value="ok" style="margin-top: 1em;"/>
                        </div>
                        <div class="modal-footer" style="border:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container"  style="border-top: 1px solid darkgrey;padding: 1em;margin-bottom: 2em;padding-top: 2em;padding-right: 3em;">
                <p style="color: #9a42a3;font-family: 'Gruppo';font-size: 22px;">Saisie des informations </p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label  style="color: #8aa4af">Titre du livre : *</label>
                            <input name="bookTitle" id="titre" class="form-control form-control-sm" type="text" autocomplete="off" autofocus>
                        </div>
                        <div class="col-md-3">
                            <label  style="color: #8aa4af">Auteur du livre :</label>
                            <select class="form-control form-control-sm" id="auteurBook" name="auteur">
                                <option value=1>select...</option>
                                <?php foreach($AuteurBook as $a): ?>
                                    <option value=<?= $a['idautheur'];?>><?= $a['nomAuteur'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label  style="color: #8aa4af">Genre :</label>
                            <select class="form-control form-control-sm" id="genre" name="genreBook">
                                <?php foreach($GenreBook as $g): ?>
                                    <option value=<?= $g['idtype'];?>><?= $g['libelletype'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label  style="color: #8aa4af">Langue :</label>
                            <select class="form-control form-control-sm" id="langue" name="langueBook">
                                <?php foreach($LangueBook as $l): ?>
                                    <option value=<?= $l['idlangue'];?>><?= $l['nomLangue'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row"  style="margin-top: 3em;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label  style="color: #8aa4af">Edition :</label>
                            <select class="form-control form-control-sm" id="editionBook" name="edition">
                                <option value=1>select...</option>
                                <?php foreach($EditionBook as $e): ?>
                                    <option value=<?= $e['idedition'];?>><?= $e['nomEdition'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label  style="color: #8aa4af">Statut du livre :</label>
                            <select class="form-control form-control-sm" id="statut" name="statutBook">
                                <?php foreach($StatutBook as $s): ?>
                                    <option value=<?= $s['idstatut'];?>><?= $s['nomstatut'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label  style="color: #8aa4af">Nb de pages :</label>
                            <input class="form-control form-control-sm" name="nbpage" id="nbp" type="text" value="0" style="width: 60px;"/>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-5" style="padding-top: 2em;">
                            <label style="color: #8aa4af">Synopsis :</label><i id="web" class="fa fa-search"></i>
                            <textarea class="form-control form-control-sm" name="synops" rows="5">...</textarea>
                       </div>
                        <div class="col-md-4">
                        </div>
                        <div class="row" style="margin-top: 3em;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em;">
                                <input id="enregistrerBook" class="btn btn-outline-primary" type="submit" value="Enregistrer">
                                <input id="annuler" class="btn btn-outline-primary" type="button" value="Annuler">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/sidebar-menu.js"></script>
    <script src="WebContent/JS/menu.js"></script>
<script src="WebContent/JS/scriptnewBook.js"></script>
</body>
</html>
