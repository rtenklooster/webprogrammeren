<?php
session_start();
extract($_POST);

function get_cart_total(){
  // Controleer of de cart gevuld is
  if(isset($_SESSION['cart'])){
  if(is_array($_SESSION['cart'])){
    foreach($_SESSION['cart'] AS $id => $amount){
      //echo "ID: $id aantal: $amount <br />";
    }
    echo "15,95";
  }else{
    echo "0,00";
  }
}else{
  echo "0,00";
}
}

// Er kan gevraagd worden om totaal bedrag van het mandje (action = getTotal)
// Er kan gevraagd worden om alle order regels (getCart)
if($action == "getTotal"){
  get_cart_total();
}


?>
