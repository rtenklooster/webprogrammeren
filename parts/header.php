<div class="header" id="header">
  <nav class="navbar navbar navbar-fixed-top">
          <div class="container">
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="loginText">
                  <?php if(!$logged_in){
                    echo "inloggen";
                  }else{
                    echo "Welkom ".ucfirst(strtolower($_SESSION["user_name"]))." (uitloggen)";
                    ?>
                    <?php
                  }
                  ?>
                  <span class="caret"></span>
                </a>
                <?php if(!$logged_in){
                  ?>
                <div class="dropdown-menu" id="loginForm">
                  <div class="row">
                    <div class="container-fluid">

                      <form class="inloggen" id="login_formulier">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input class="form-control" name="email" id="inputEmail" type="email">
                        </div>
                        <div class="form-group">
                          <label>Wachtwoord</label>
                          <input class="form-control" name="wachtwoord" id="inputWachtwoord" type="password"><br>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade in hidden" role="alert" id="foutmelding" >
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span></button> <strong>Helaas!</strong> Je hebt een verkeerde gebruikersnaam of wachtwoord ingevuld, probeer het nogmaals!
                        </div>
                        <button type="submit" id="login" class="btn btn-success btn-sm">Login</button>
                      </form>

                    </div>
                  </div>
                </div>
                <?php
              }else{
                ?>
                <div class="dropdown-menu" id="logoutForm">
                  <div class="row">
                    <div class="container-fluid">
                      <form class="uitloggen" id="logout_formulier" method="POST" action="index.php">
                        <button type="submit" id="login" class="btn btn-danger btn-sm pull-right" name="action" value="logout">Uitloggen</button>
                      </form>

                    </div>
                  </div>
                </div>
                <?php
              } ?>
              </li>
            </ul>
          </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container text-center">
      <h1 class="bedrijfsnaam">PHP Pizza</h1>
      <p class="lead beschrijving">The best in town</p>
    </div>
</div>
