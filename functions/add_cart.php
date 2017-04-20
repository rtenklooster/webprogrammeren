<?php
session_start();

// Voeg producten toe aan het mandje.
// Let op: data kan door bezoeker worden gemanipuleert, we gebruiken dus alleen het ID en de aantal. Slaan geen prijzen op in de mand.
extract($_POST);

function add_to_cart($id, $amount){
  $_SESSION['cart'][$id] = $amount;
  //echo "Gelukt: $id is $amount keer toegevoegd";
}

// Als er juiste input is, voeg dan toe aan de Session
if(isset($id) && isset($amount) && $action == "add_to_cart"){
  add_to_cart($id, $amount);
}

?>
