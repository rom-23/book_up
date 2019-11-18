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
    <link rel="stylesheet" href="WebContent/CSS/smpSortableTable.css">
    <link rel="stylesheet" href="WebContent/CSS/jquery.dropdown.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="WebContent/CSS/jnoty.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Upload</title>
    <style>
        .inputfile {
            cursor: pointer;
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
        <div class="col-md-10" style="margin-top: 1em;margin-bottom: 1em;">
            <div class="row" style="padding-left:3em;padding-top: 1em;padding-bottom: 1em;background-color:rgba(2,2,5,0.14);" id="fileInput">
                <div class="col-md-12" style="color: #5e6361;font-size: 13px;">
                    <p style="color: rgba(146,20,180,0.86);font-size: 26px;font-family: 'Gruppo';padding-left: 1em;margin-top: 1em;">Upload des fichiers téléchargés</p> ( Les fichiers téléchargés sont enregistrés dans la mémoire de l'application )
                </div>
                <div class="modal fade right" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content" style="background-color:rgba(20,26,28,0.59);border-radius:5px;border: 0.5px solid #5d5768;color: #808080;font-family: Verdana;font-size: 13px;">
                            <div class="modal-header" style="border:0;">
                            </div>
                            <div class="modal-body" style="text-align: center;padding: 0;">
                                <img src="WebContent/IMAGE/alert.png" style="margin-bottom: 1em;"/>
                                <p style="font-family: Verdana;font-size: 13px;color: #919191;">Aucun fichier sélectionné !</p>
                                <input type="button" data-dismiss="modal" class="btn btn-outline-primary" value="ok" style="margin-top: 1em;"/>
                            </div>
                            <div class="modal-footer" style="border:0;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form enctype=multipart/form-data id="formuP" class="form-group">
                        <div class="form-group row">
                            <div class="col-md-8" style="margin-top:3em;">
                                <div class="form-control">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                                    <input type="file" multiple id="fichier" name="files[]" style="color: grey;" class="inputfile">
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 3em;margin-bottom: 1em;">
                                <input type ="submit" id="btnSendForm" class="btn btn-outline-primary" value="Upload"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-10">
                    <div class="row" style="padding-bottom: 1em;margin-top: 2em;" id="">
                        <div class="col-md-10"style="color: #5e6361;font-size: 13px;">
                            <p style="color: rgba(146,20,180,0.86);font-size: 24px;font-family: 'Gruppo';padding-left: 1em;margin-top: 1em;">Liste des fichiers enregistrés</p><p> - Compléter les informations sur le livre en cliquant sur Editer afin de les enregistrer dans la bibliothèque</p>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12"  style="padding-top: 2em;">
                                <div class="table-responsive">
                                    <table id="myTable" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th id="idbook"style="color: rgba(106,106,129,0.96);">id</th>
                                            <th id="bookName"style="color: rgba(106,106,129,0.96);">Titre</th>
                                            <th id="dateAcquis"style="color: rgba(106,106,129,0.96);">Date Upload</th>
                                            <th id="edition"style="color: rgba(106,106,129,0.96);">Editer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/jquery.dropdown.js"></script>
<script src="WebContent/JS/sidebar-menu.js"></script>
<script src="WebContent/JS/menu.js"></script>
<script src="WebContent/JS/smpSortableTable.js"></script>
<script src="WebContent/JS/jnoty.js"></script>
<script src="WebContent/JS/upload.js"></script>


</body>
</html>
