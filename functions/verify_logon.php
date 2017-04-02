<?php
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.
explode($_POST);

function verify_logon($username, $password){
  // Deze functie controleerd of een gebruiker kan worden geautenticeert.
  // Resultaat is succes of failed, bij success het user ID in de sessie veriablele $user_id
  // String speciale characters ivm. sql injecttion.
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

  // Doe hier de SQL query en return het resultaat.
  // Voorkeur: count(*) where username en password matchen.

  if($result_count >= 1){
      echo "success";
  }else{
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
