<?php
// start Session
session_start();

// Extract de post
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
