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
    <link rel="stylesheet" href="WebContent/CSS/jnoty.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>ModifBook</title>
    <style>
        input[type=text]:focus{
            outline: none;
        }
        input[type=text]:active{
            outline: none;
        }
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
                <p style="color: #9214b3;font-family: 'Gruppo';font-size: 26px;">Modification d'un livre</p>
            </div>
            <div class="container" style="text-align: center;">
                <form id="updateForm" action="" method="" style="padding-top: 1em;font-family: Verdana;font-size: 14px;">
                    <?php if (isset($IdBook)){
                            echo "<p style='color: #9a42a3;font-size: 15px;'>Infos sur le fichier : </p>";
                            echo "<p style='color: #a2a2c5;font-family: Verdana;font-size: 13px;'>Fichier téléchargé : " .$Book3[0]['nomFichier']."</p>";
                            echo "<p style='color: #9f9fc2;font-family: Verdana;font-size: 13px;'>Date  Upload : " .$Book2[0]['dateAcquis']."</p>
                            <input id='idbb' name='idbook' type='hidden' value='".$Book2[0]['idbook']."'/><input id='bna' name='' type='hidden' value='".$Book2[0]['bookName']."'/>";
                        };?>
            </div>
            <div class="container"  style="border-top: 1px solid darkgrey;padding: 1em;margin-bottom: 2em;padding-top: 2em;padding-right: 1em;">
                <p style="color: #9a42a3;font-family: 'Gruppo';font-size: 22px;">Saisie des informations </p>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <label  style="color: #8aa4af">Titre du livre :</label>
                        <input name="nameB" id="nomL" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book2[0]['bookName'];?>'>
                    </div>
                    <div class="col-md-3">
                        <label  style="color: #8aa4af">Auteur du livre :</label>
                        <input id="autN" name="auteurN" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book[0]['nomAuteur'];?>'>
                        <select class="form-control form-control-sm" id="listAute" name="auteurlist" style="display: none;">
                            <option value=1 >Select...</option>
                            <?php foreach($AuteurBook as $a): ?>
                                <option value=<?= $a['idautheur'];?>><?= $a['nomAuteur'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label  style="color: #8aa4af">Genre :</label>
                        <input id="genr" name="Genr" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book[0]['libelletype'];?>'>
                        <select  style="display: none;" class="form-control form-control-sm" id="listG" name="genrelist">
                            <option value=1 >Select...</option>
                            <?php foreach($GenreBook as $g): ?>
                                <option value=<?= $g['idtype'];?>><?= $g['libelletype'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label  style="color: #8aa4af">Langue :</label>
                        <input id="lang" name="langu" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book[0]['nomLangue'];?>'>
                        <select  style="display: none;" class="form-control form-control-sm" id="listlang" name="listelangue">
                            <option value=1 >Select...</option>
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
                        <input id="edi" name="edio" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book[0]['nomEdition'];?>'>
                        <select  style="display: none;" class="form-control form-control-sm" id="listedi" name="listedition">
                            <option value=1>select...</option>
                            <?php foreach($EditionBook as $e): ?>
                                <option value=<?= $e['idedition'];?>><?= $e['nomEdition'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label  style="color: #8aa4af">Statut du livre :</label>
                        <input id="statb" name="statB" class="form-control form-control-sm" type="text" autocomplete="off" autofocus value='<?=$Book[0]['nomstatut'];?>'>
                        <select  style="display: none;" class="form-control form-control-sm" id="liststa" name="statutlist">
                            <option value=1 >Select...</option>
                            <?php foreach($StatutBook as $s): ?>
                                <option value=<?= $s['idstatut'];?>><?= $s['nomstatut'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label  style="color: #8aa4af">Nb pages :</label>
                        <input style="width: 60px;" class="form-control form-control-sm" name="nbpa" id="nb" type="text" value='<?= $Book2[0]['nbPage'];?>''/>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-5" style="padding-top: 2em;">
                        <label style="color: #8aa4af">Synopsis :</label><i id="synopSearch" class="fa fa-search"></i>
                        <textarea class="form-control form-control-sm" name="" id="synopsy" rows="5"><?= $Book2[0]['synopsis'];?></textarea>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="row" style="margin-top: 3em;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1em;">
                            <input id="saveupdate" class="btn btn-outline-primary" type="button" value="Enregistrer">
                            <input id="ferme" class="btn btn-outline-primary" type="button" value="Annuler">
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
    <script src="WebContent/JS/jnoty.js"></script>
    <script src="WebContent/JS/scriptModif.js"></script>
</body>
</html>
