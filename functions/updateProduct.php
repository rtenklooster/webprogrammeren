<?php
session_start();
// Controleer of een gebruikers is ingelogd - of niet.
// Login requests worden door de formhandler afgevangen.
// Importeer de database connectie
require_once("database.php");


if(count($_POST)){
//  print_r($_POST);
  extract($_POST);

  $id = htmlspecialchars($Id0);
  $naam = htmlspecialchars($Naam1);
  $omschrijving = htmlspecialchars($Omschrijving2);
  $categorie = htmlspecialchars($Categorie3);
  $prijs = htmlspecialchars($Prijs_in_centen4);
  /*echo $id."<br>";
  echo $naam."<br>";
  echo $omschrijving."<br>";
  echo $categorie."<br>";
  echo $prijs."<br>";
*/
updateProduct($id, $naam, $omschrijving, $categorie, $prijs);
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$escaped_url = str_replace("functions/updateProduct.php", "index.php?page=admin", $escaped_url);
$escaped_url = str_replace("//", "http://", $escaped_url);
// Doorsturen naar vorige pagina.
echo '<meta http-equiv="refresh" content="0; url='.$escaped_url.'" />';

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
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
    $stmt->bindParam(':omschrijving', $omschrijving, PDO::PARAM_STR);
    $stmt->bindParam(':categorie', $categorie, PDO::PARAM_INT);
    $stmt->bindParam(':prijs', $prijs, PDO::PARAM_INT);
    $stmt->execute();
}


 ?>
