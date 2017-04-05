<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.

extract($_POST);

function add_to_cart($id, $amount){
  $_SESSION['cart'][$id] = $amount;
  echo "Gelukt: $id is $amount keer toegevoegd";
}

// Als er juiste input is, voeg dan toe aan de Session
if(isset($id) && isset($amount) && $action == "add_to_cart"){
  add_to_cart($id, $amount);
}

?>
