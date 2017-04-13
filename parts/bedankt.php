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
        $id = $db->lastInsertId();

        $sql = 'INSERT INTO bestelling (klant_id, bestel_datumtijd, betaalmethode, gewenste_moment)
        VALUES (:klant_id, :bestel_datumtijd, :betaalmethode, :gewenste_moment);';
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':klant_id', $id);
        $stmt->bindParam(':bestel_datumtijd', $bestel_datumtijd);
        $stmt->bindParam(':betaalmethode', $betaalmethodeint);
        $stmt->bindParam(':gewenste_moment', $gewenste_moment);

        $stmt->execute();
    }
}
?>