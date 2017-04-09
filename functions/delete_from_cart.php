<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.

extract($_POST);

function delete_from_cart($id){
  unset($_SESSION['cart'][$id]);
  echo "Gelukt: $id is verwijderd";
}

// Als er juiste input is, voeg dan toe aan de Session
if(isset($id) && $action == "delete_from_cart"){
  delete_from_cart($id);
}

?>
