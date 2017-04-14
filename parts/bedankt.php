<?php
// var_dump($_POST);
require_once('functions/database.php');

submitOrder();

function submitOrder() {
    extract($_POST);

    if(count($_POST)) {
        switch($betaalmethode){
            case "ideal":
                $betaalmethodeint = 0;
            break;
            case "bijdebezorger":
                $betaalmethodeint = 1;
            break;
        }

        $bestel_datumtijd = date("Y-m-d H:i:s");
        $gewenste_moment = date("Y-m-d H:i:s");
        // var_dump($bestel_datumtijd);

        global $db;
        $sql = 'INSERT INTO klant (emailadres, voornaam, tussenvoegsel, achternaam, adres, postcode, woonplaats, telefoonnummer)
                VALUES (:emailadres, :voornaam, :tussenvoegsel, :achternaam, :adres, :postcode, :woonplaats, :telefoonnummer);';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':emailadres', $email, PDO::PARAM_STR);
        $stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
        $stmt->bindParam(':tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
        $stmt->bindParam(':adres', $adres, PDO::PARAM_STR);
        $stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
        $stmt->bindParam(':woonplaats', $woonplaats, PDO::PARAM_STR);
        $stmt->bindParam(':telefoonnummer', $telefoonnummer, PDO::PARAM_STR);
        $stmt->execute();

        // klant id is nodig om de bestelling toe te kunnen voegen
        $klantId = $db->lastInsertId();

        $sql = 'INSERT INTO bestelling (klant_id, bestel_datumtijd, betaalmethode, gewenste_moment)
        VALUES (:klant_id, :bestel_datumtijd, :betaalmethode, :gewenste_moment);';
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':klant_id', $klantId);
        $stmt->bindParam(':bestel_datumtijd', $bestel_datumtijd);
        $stmt->bindParam(':betaalmethode', $betaalmethodeint);
        $stmt->bindParam(':gewenste_moment', $gewenste_moment);

        $stmt->execute();

        // order id is nodig om de bestelregels toe te kunnen voegen
        $orderId = $db->lastInsertId();

        // Orderregels invoeren
        // Doorloop de winkelmand en voeg regels toe.
        foreach($_SESSION['cart'] AS $id => $aantal){
          if($aantal){
              // Alleen orderregels invoeren als er meer dan 0 zijn besteld.
              $sql = 'INSERT INTO orderregel (bestelling_id, product_id, aantal)
              VALUES (:bestelling_id, :product_id, :aantal);';
              $stmt = $db->prepare($sql);

              $stmt->bindParam(':bestelling_id', $orderId, PDO::PARAM_INT);
              $stmt->bindParam(':product_id', $id,  PDO::PARAM_INT);
              $stmt->bindParam(':aantal', $aantal,  PDO::PARAM_INT);

              $stmt->execute();
          }
        }

    }
    // Bestelling verwerkt, mandje leeg!
    // LAten zien dat de order is verwerkt.
    if($orderId){
      // Mandje leegmaken
      unset($_SESSION['cart']);
      ?>
      <div class="panel panel-default">
      <!-- Default panel contents -->
          <div class="panel-heading"><h3 class="panel-title">Uw bestelling is succesvol geplaatst.</h3></div>
          <div class="alert alert-success " role="alert" ><strong>Bedankt</strong> voor uw bestelling. <br><?php echo "Uw bestelling is succesvol geplaatst. Uw bestelnummer is $orderId"; ?>
          </div>
      </div>
      <?php
    }else{
      ?>
      <div class="panel panel-default">
      <!-- Default panel contents -->
          <div class="panel-heading"><h3 class="panel-title"><strong>Helaas: er ging iets mis met uw bestelling.</h3></strong></div>
          <div class="alert alert-danger " role="alert" >Wij vragen u om het nogmaals te proberen! <br> Onze excuses voor het ongemak.
          </div>
      </div>
      <?php
    }
}
?>
