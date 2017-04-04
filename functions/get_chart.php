<?php
session_start();
extract($_POST);

function get_cart_total(){
  // Controleer of de cart gevuld is
  if(is_array($_SESSION['cart'])){
    foreach($_SESSION['cart'] AS $id => $amount){
      echo "ID: $id aantal: $amount <br />";
    }
  }else{
    echo "De mand is leeg";
    echo "0.00";
  }

}

// Er kan gevraagd worden om totaal bedrag van het mandje (action = getTotal)
// Er kan gevraagd worden om alle order regels (getCart)
if($action == "getTotal"){
  get_cart_total();
}


?>
