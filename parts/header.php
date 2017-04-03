<div class="header">
  <nav class="navbar navbar navbar-fixed-top">
          <div class="container">
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                  Inloggen<span class="caret"></span>
                </a>

                <div class="dropdown-menu" id="loginForm">
                  <div class="row">
                    <div class="container-fluid">

                      <form class="inloggen" method="post" action="index.php" id="login_formulier">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input class="form-control" name="email" id="inputEmail" type="email">
                        </div>
                        <div class="form-group">
                          <label>Wachtwoord</label>
                          <input class="form-control" name="wachtwoord" id="inputWachtwoord" type="password"><br>
                        </div>
                        <button type="submit" id="login" class="btn btn-success btn-sm">Login</button>
                      </form>

                    </div>
                  </div>
                </div>
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
