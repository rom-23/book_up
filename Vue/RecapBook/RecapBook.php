<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="WebContent/CSS/style.css">
    <link rel="stylesheet" href="WebContent/CSS/menu.css">
    <link rel="stylesheet" href="WebContent/CSS/sidebar-menu.css">
    <link href="https://fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="WebContent/CSS/modal-loading.css">
    <link rel="stylesheet" type="text/css" href="WebContent/CSS/modal-loading-animate.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>RecapBook</title>
</head>
<body style="background-color: #0e1315;" onload="verticalTextColor();">
<?php include 'Vue/INCLUDE/navbar_culture.php';?>
<?php include 'Vue/INCLUDE/menu_responsive.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include 'Vue/INCLUDE/sidebar-menu.php';?>
        </div>
        <div class="col-md-1"style="border-left: 1px solid #7d1f8a;"></div>

        <div class="col-md-4" style=" background-color: rgba(2,2,5,0.42);padding: 2em;margin-top: 1em;margin-bottom: 3em;">
            <p style="color: #511a57;font-family: 'Gruppo';font-size: 28px;">Récapitulatif </p>
            <p style="color: #807f86;font-family: Verdana;font-size: 13px;">Ce livre est maintenant disponible dans la bibliothèque. </p>
            <div style="border: 10px solid #0e1315;background-color: rgba(2,2,5,0.5);padding: 1em;">
    <?php 
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>idBook : " .$Update->getIdbook()."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Nom du livre : " .$Update->getBookName()."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Auteur : " .$Recap[0]['nomAuteur']."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Genre : " .$Recap[0]['libelletype']."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Edition: " .$Recap[0]['nomEdition']."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Synopsis : " .$Update->getSynopsis()."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Nombre de pages : " .$Update->getNbPage()."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Langue : " .$Recap[0]['nomLangue']."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Date upload : " .$Update->getDateAcquis()."</p>";
    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Statut : " .$Recap[0]['nomstatut']."</p>";
/*    echo "<p style='color: #888888;font-size: 13px;font-family: Verdana;'>Renseignement : " .$Update->getRenseignement()."</p>";*/
            ?>
            </div>
            <a href="Upload" class="btn btn-outline-primary" id="" style="margin-left: 1em;margin-top: 2em;">Ajouter un autre livre</a>
            <a href="Biblio" class="btn btn-outline-primary" id="" style="margin-left: 1em;margin-top: 2em;">Quitter</a>
        </div>
        <div class="col-lg-3" style=" background-color: transparent;"></div>
    </div>
</div>
<?php include 'Vue/INCLUDE/Footer.php';?>
<script src="WebContent/JS/modal-loading.js"></script>
<script type="text/javascript">
    function verticalTextColor() {
        var loading = new Loading({
            title: 					'Enregistrement du livre',
            titleColor: 			'#a7aaaa',
            discription: 			'',
            discriptionColor: 		'#939491',
            animationOriginColor: 	'#908a90',
            mask: 					true,
            loadingPadding: 		'20px 50px',
            defaultApply: 	true,
        });
        loadingOut(loading);
    }
    function loadingOut(loading) {
        setTimeout(() => loading.out(), 1000);
    }
</script>
<script src="WebContent/JS/sidebar-menu.js"></script>
<script src="WebContent/JS/menu.js"></script>
</body>
</html>