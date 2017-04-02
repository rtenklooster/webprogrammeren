<?php
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.
explode($_POST);

function verify_logon($username, $password){
  // Deze functie controleert of een gebruiker kan worden geautenticeert.
  // In ons project gebruiken wij het emailadres als username.
  // We vragen het password op aan de hand van een ingevulde username

  // String speciale characters ivm. sql injecttion.
    $username = mysql_real_escape_string($username);

  // Doe hier de SQL query en return het resultaat.
  $hashed_password = "";

  if (password_verify($password, $hashed_password)) {
    echo "success";
  }
  else {
    echo "failed";
  }
}

// Test ingegeven credentials.
if(($username != "") AND ($password != ""){
  verify_logon($username, $password);
}else{
  echo "Onjuiste gegevens verstuurd";
}
 ?>
