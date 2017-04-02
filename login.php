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
    <div class="alert alert-warning alert-dismissible fade in hidden" role="alert" id="foutmelding" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span></button> <strong>Helaas!</strong> Je hebt een verkeerde gebruikersnaam of wachtwoord ingevuld!
    </div>
    <!-- login formulier -->
    <form class="inloggen" method="post" action="login.php" id="login_formulier">
        <h2>Inloggen</h2>

        <label for="inputEmail" class="sr-only">E-mailadres</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mailadres" required="" autofocus="">

        <label for="inputWachtwoord" class="sr-only">Wachtwoord</label>
        <input type="password" id="inputWachtwoord" class="form-control" placeholder="Wachtwoord" required="">

        <div class="checkbox">
          <label>
            <input type="checkbox" value="ingelogdBlijven">Ingelogd blijven
          </label>
        </div>

        <button class="btn btn-lg btn-danger btn-block" type="submit" id="login">Log in</button>
      </form>

    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/logon.js"></script>
    </body>
</html>
