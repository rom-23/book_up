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
    <link rel="stylesheet" href="WebContent/CSS/responsive.dataTables.min.css">
    <link rel="stylesheet" href="WebContent/CSS/sidebar-menu.css">
    <link rel="stylesheet" type="text/css" href="WebContent/CSS/datatables.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Bibliotheque</title>
    <style>
        a:hover{
            color: #dbd9db;
            text-decoration: none;
        }
        a{
            color: #96969a;
        }
        i:hover{
            cursor: pointer;
            color: #962ebf;
            }
        .modal-body p {
             word-wrap: break-word;
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
     <div class="col-md-10"  style="padding-top: 2em;padding-bottom: 1em;margin-top: 1em;background-color: #141a1c;margin-bottom: 1em;">
        <label  style="color: #841a8f;font-size: 28px;font-family: 'Gruppo';margin-bottom: 1em;">Bibliothèque </label>
            <div class="col-md-12" style="background-color: transparent;padding-bottom: 2em;padding-top: 2em;">
            <table id="table_id" class="display" style="margin: 0;!important;width: 100%;padding: 0;!important;">
                <thead>
                <tr>
                    <th>Nom du livre&nbsp;<i class="fas fa-sort"></i></th>
                    <th>Date upload&nbsp;<i class="fas fa-sort"></i></th>
                    <th>Genre&nbsp;<i class="fas fa-sort"></i></th>
                    <th>NbPage&nbsp;<i class="fas fa-sort"></i></th>
                    <th>idbook&nbsp;<i class="fas fa-sort"></i></th>
                    <th>Lu/non lu&nbsp;<i class="fas fa-sort"></i></th>
                    <th>Edition&nbsp;<i class="fas fa-sort"></i> </th>
                    <th>Langue&nbsp;<i class="fas fa-sort"></i> </th>
                    <th>Auteur&nbsp;<i class="fas fa-sort"></i> </th>
                    <th></th>
                </tr>
                 </thead>
                <tbody>
                </tbody>
            </table>
            </div>

        <div class="modal fade right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="background-color:rgba(20,26,28,0.59);border-radius:5px;border: 0.5px solid #5d5768;color: #808080;font-family: Verdana;font-size: 13px;">
                    <div class="modal-header" style="border:0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p id="idbb"></p>
                    </div>
                    <div class="modal-footer" style="border:0;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/sidebar-menu.js"></script>
<script src="WebContent/JS/menu.js"></script>
<script type="text/javascript" src="WebContent/JS/datatables.js"></script>
<script type="text/javascript" src="WebContent/JS/dataTables.responsive.min.js"></script>
<script src="WebContent/JS/scriptBook.js"></script>

</body>
</html>










