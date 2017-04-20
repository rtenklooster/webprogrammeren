<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.
// Importeer de database connectie
require_once("database.php");
if(!$_SESSION['logged_in']){
  echo "<b>Wegwezen</b>, je moet zijn ingelogd";
  exit;
}else{

if(count($_POST)){
//  print_r($_POST);
  extract($_POST);

  $productId = htmlspecialchars($Id0);
  $naam = htmlspecialchars($Naam1);
  $omschrijving = htmlspecialchars($Omschrijving2);
  $categorie = htmlspecialchars($Categorie3);
  $prijs = htmlspecialchars($Prijs_in_centen4);
/*  echo $productId."<br>";
  echo $naam."<br>";
  echo $omschrijving."<br>";
  echo $categorie."<br>";
  echo $prijs."<br>";
*/

updateProduct($productId, $naam, $omschrijving, $categorie, $prijs);
// nieuwe url aanmaken voor de redirect
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$escaped_url = str_replace("functions/updateProduct.php", "index.php?page=producten", $escaped_url);
$escaped_url = str_replace("//", "http://", $escaped_url);
// Doorsturen naar vorige pagina.
echo '<meta http-equiv="refresh" content="0; url='.$escaped_url.'" />';

}elseif(isset($_GET['action']) && $_GET['action'] == "delete"){
  // We gaan een product wissen (deactiveren)
  wisProduct($_GET['id']);
  $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

  // nieuwe url aanmaken voor de redirect
  $escaped_url = $url;
  $id = $_GET['id'];
  $string = "functions/updateProduct.php?action=delete&id=".$id;
  $escaped_url = str_replace($string, "index.php?page=producten", $escaped_url);
  $escaped_url = str_replace("//", "http://", $escaped_url);
  // Doorsturen naar vorige pagina.
  //echo $escaped_url;
  echo '<meta http-equiv="refresh" content="0; url='.$escaped_url.'" />';
}

}
function updateProduct($id, $naam, $omschrijving, $categorie, $prijs){
  GLOBAL $db;
  $sql = '
    UPDATE product
    SET naam = :naam,
        omschrijving = :omschrijving,
        categorie_id = :categorie,
        prijs = :prijs
    WHERE product.id = :id
    LIMIT 1';

    $stmt = $db->prepare($sql);
    // Escape chars
    $naam         =   htmlspecialchars($naam);
    $omschrijving =   htmlspecialchars($omschrijving);
    $stmt->bindParam(':id',           $id, PDO::PARAM_INT);
    $stmt->bindParam(':naam',         $naam, PDO::PARAM_STR);
    $stmt->bindParam(':omschrijving', $omschrijving, PDO::PARAM_STR);
    $stmt->bindParam(':categorie',    $categorie, PDO::PARAM_INT);
    $stmt->bindParam(':prijs',        $prijs, PDO::PARAM_INT);
    $stmt->execute();
}
2
function wisProduct($id){
  GLOBAL $db;
  $sql = '
    UPDATE product
    SET actief = 0
    WHERE product.id = :id
    LIMIT 1';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
 ?>
