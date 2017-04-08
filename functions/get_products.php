<?php
// Haal producten uit de database.
require('database.php');
function getProductcategorie() {
    global $db;
    $sql = '
      SELECT id, naam
      FROM productcategorie ORDER BY naam';
    $stmt = $db->prepare($sql);
    //$stmt->bindParam(':para', $meter);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//print_r(getProductcategorie());

function getProducts($cat, $start, $aantal){
    // $cat = catagorie ID
    // $start = start entry (database)
    // $aantal = aantal resultaten (database)
    global $db;
    $sql = '
      SELECT id, naam, omschrijving, prijs
      FROM product
      WHERE categorie_id = :cat
      LIMIT :start, :aantal';

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':cat', $cat, PDO::PARAM_INT);
      $stmt->bindParam(':start', $start, PDO::PARAM_INT);
      $stmt->bindParam(':aantal', $aantal, PDO::PARAM_INT);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return($result);
}

function getPrice($id){
    // Voer een ID, return een prijs in centen
    global $db;
    try
    {
    $sql = '
      SELECT prijs
      FROM product
      WHERE id = :id';

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return($result);
      print_r($result);
    }
          catch(PDOException $e)
    {
        echo '<pre>';
        echo 'Regel: '.$e->getLine().'<br>';
        echo 'Bestand: '.$e->getFile().'<br>';
        echo 'Foutmelding: '.$e->getMessage();

    }
}

getPrice(1);
getPrice("200");
function convertPrice($input){
  // Zet prijs in centen om in nette prijs in euro's

  // Prijs begint met Euro teken
  $output = "€ ";
  // Centen naar hele bedragen
  $number = round(($input / 100),2);
  // Twee decimalen verplicht
  $output .= number_format($number, 2, ',', ' ');
  return($output);
}

//print_r(getProduct(2, 2, 3));

//echo convertPrice(790);
 ?>
