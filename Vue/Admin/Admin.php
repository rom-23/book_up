<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="WebContent/CSS/style.css">
    <link rel="stylesheet" href="WebContent/CSS/menu.css">
    <link rel="stylesheet" href="WebContent/CSS/sidebar-menu.css">
    <link rel="stylesheet" href="WebContent/CSS/smpSortableTable.css">
    <link href="WebContent/CSS/jquery.bdt.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="WebContent/CSS/jnoty.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Admin</title>
<style>
    input:focus {
        outline:none;
    }
i{
    color: #93929a;
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
            <div class=" col-md-1" style="background-color:#0e1315;">
            </div>
        <div class="col-md-5" style="background-color: rgba(2,2,5,0.14);margin-top: 1em;margin-bottom: 1em;">
       <?php include $include;?>
        </div>
        <div class=" col-md-2" style="background-color:#0e1315;">
        </div>
    </div>
</div>
</div>
<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/sidebar-menu.js"></script>
<script src="WebContent/JS/menu.js"></script>
<script src="WebContent/JS/smpSortableTable.js"></script>
<script src="WebContent/JS/jnoty.js"></script>
<script src="WebContent/JS/adminScript.js"></script>
</body>
</html>
