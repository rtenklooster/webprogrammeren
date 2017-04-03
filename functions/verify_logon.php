<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.

extract($_POST);

function verify_logon($username, $password){
  // Deze functie controleert of een gebruiker kan worden geautenticeert.
  // In ons project gebruiken wij het emailadres als username.
  // We vragen het password op aan de hand van een ingevulde username

  // String speciale characters ivm. sql injecttion.
    $username = mysql_real_escape_string($username);

  // Doe hier de SQL query en return het resultaat.
  $hashed_password = "";

  if (!password_verify($password, $hashed_password)) {
    $_SESSION['logged_in'] = 1;
    $_SESSION['user_id'] = 1234;
    echo "success";
  }
  else {
    $_SESSION['logged_in'] = 0;
    $_SESSION['user_id'] = "";
    echo "failed";
  }
}

// Test ingegeven credentials.
if(isset($email) && isset($password) && $action == "login"){
  verify_logon($email, $password);
}
 ?>
