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

    // Doorloop alle orders om de orderregels op te halen.
    forearch($result as $order){
      global $db;
      $sql = '
      SELECT

    }
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
SELECT orderregel.product_id, orderregel.aantal, product.naam
FROM orderregel
JOIN product ON orderregel.product_id = product.id
GROUP BY orderregel.bestelling_id
HAVING bestelling_id = 4
