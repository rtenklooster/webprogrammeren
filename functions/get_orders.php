<?php

function getOrders() {
  global $db;
  $sql = '
    SELECT DISTINCT bestelling.id, bestelling.bestel_datumtijd, bestelling.gewenste_moment, klant.voornaam, klant.tussenvoegsel, klant.achternaam, klant.adres, klant.postcode, klant.woonplaats, klant.telefoonnummer
    FROM bestelling
    JOIN klant ON bestelling.klant_id = klant.id;';

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Doorloop alle orders om de orderregels op te halen.
    $i = 0; // teler op 0
    foreach($result AS $order){
      $output[$i]['bestelling'] = $order;
      global $db;
      $sql = '
        SELECT orderregel.aantal, product.naam AS productnaam, productcategorie.naam As productcategorie
        FROM orderregel
        JOIN product ON orderregel.product_id = product.id
        JOIN productcategorie ON product.categorie_id = productcategorie.id
        WHERE orderregel.bestelling_id = :bestelling_id';

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':bestelling_id', $order['id'], PDO::PARAM_INT);
        $stmt->execute();
        $orderregels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output[$i]['regels']= $orderregels;
        $i++;
    }
    return($output);
}
?>
