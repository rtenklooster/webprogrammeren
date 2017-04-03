<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <?php include("parts/header.php"); ?>

    <div class="container">
        <div class="row">
            <?php include("parts/navigation.php"); ?>

            <!-- welke pagina? -->
            <?php
            if (isset($_GET["page"])) {
                $page = htmlspecialchars($_GET["page"]);
                include("parts/{$page}.php");
            } else {
                include("parts/main.php");
            }
            ?>

        </div>
    </div>

    <?php include("parts/footer.php"); ?>

    <!-- javascripts laden -->
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/logon.js"
    </body>
</html>
