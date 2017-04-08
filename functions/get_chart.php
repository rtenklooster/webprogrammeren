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

function get_total(){
  // Controleer of de cart gevuld is
  if(isset($_SESSION['cart'])){
  if(is_array($_SESSION['cart'])){
    foreach($_SESSION['cart'] AS $id => $amount){
        // Haal hier de data op:
        // 1. Pizza Bolognese Small   1x    16,95   16,95   + - X
        // 2. Pizza Bolognese Small   1x    16,95   16,95   + - X
        // 3. Pizza Bolognese Small   1x    16,95   16,95   + - X
        // 4. Totaal:                 3x            41,95
        echo "Mandindhoud";
    }

  }else{
    echo "De winlelmand bevat nog geen items.";
  }
}else{
  echo "De winkelmand bevat nog geen items.";
}
}
// Er kan gevraagd worden om totaal bedrag van het mandje (action = getTotal)
// Er kan gevraagd worden om alle order regels (getCart)
if($action == "getTotal"){
  get_cart_total();
}
if($action == "getCart"){
  get_cart_detail();
}

?>
