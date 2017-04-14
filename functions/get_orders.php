<?php

function getOrders() {
  global $db;
  $sql = '
    SELECT DISTINCT bestelling.id, bestelling.bestel_datumtijd, bestelling.gewenste_moment, klant.voornaam, klant.tussenvoegsel, klant.achternaam, klant.adres, klant.postcode, klant.woonplaats, klant.telefoonnummer
    FROM bestelling
    JOIN klant ON bestelling.klant_id = klant_id;';

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return($result);
}
?>

<pre>
  <?php
    foreach(getOrders() AS $order){
      echo $order['id'];
      echo "<br>";
    }
  print_r(getOrders()); ?>
</pre>
