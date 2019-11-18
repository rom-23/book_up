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
    <title>Recherche</title>
</head>
<body style="background-color: #0e1315;">
<?php include 'Vue/INCLUDE/navbar_culture.php';?>
<?php include 'Vue/INCLUDE/menu_responsive.php';?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-2">
            <?php include 'Vue/INCLUDE/sidebar-menu.php';?>
        </div>
        <div class="col-md-5"style="background-color:#0e1315;padding-top: 2em;">
            <div class="container"style="margin-bottom: 1em;background-color: rgba(2,2,5,0.14);height: 15em;">
                <div class="row"style="padding-top: 1em;padding-bottom: 1em;">
                    <p style="color: #4f116e;font-size: 25px;font-family: Gruppo;padding-left: 1em;">Recherche 1</p>
                </div>
            </div>
            <div class="container"style="margin-bottom: 1em;background-color: rgba(2,2,5,0.14);height: 15em;">
                <div class="row"style="padding-top: 1em;padding-bottom: 1em;">
                    <p style="color: #4f116e;font-size: 25px;font-family: Gruppo;padding-left: 1em;">Recherche 2</p>
                </div>
            </div>
        </div>
        <div class="col-md-5"style="background-color: #0e1315;padding-top: 2em;">
            <div class="container"style="margin-bottom: 1em;background-color: rgba(2,2,5,0.14);height: 15em;">
                <div class="row"style="padding-top: 1em;padding-bottom: 1em;">
                    <p style="color: #4f116e;font-size: 25px;font-family: Gruppo;padding-left: 1em;">Recherche 3</p>
                </div>
            </div>
            <div class="container"style="margin-bottom: 1em;background-color: rgba(2,2,5,0.14);height: 15em;">
                <div class="row"style="padding-top: 1em;padding-bottom: 1em;">
                    <p style="color: #4f116e;font-size: 25px;font-family: Gruppo;padding-left: 1em;">Recherche 4</p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/sidebar-menu.js"></script>
<script src="WebContent/JS/menu.js"></script>
</body>
</html>
