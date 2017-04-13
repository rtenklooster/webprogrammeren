<?php
var_dump($_POST);
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

        // $bestel_datumtijd = date("Y-m-d H:i:s");
        // $gewenste_moment = date("Y-m-d H:i:s");
    
        global $db;
        $sql = 'INSERT INTO klant (emailadres, voornaam,tussenvoegsel,achternaam,adres,postcode,woonplaats,telefoonnummer)
                VALUES (:emailadres, 
                        :voornaam,
                        :tussenvoegsel,
                        :achternaam,
                        :adres,
                        :postcode 
                        :woonplaats, 
                        :telefoonnummer
                        );';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
        $stmt->bindParam(':tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
        $stmt->bindParam(':adres', $adres, PDO::PARAM_STR);
        $stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
        $stmt->bindParam(':woonplaats', $woonplaats, PDO::PARAM_STR);
        $stmt->bindParam(':emailadres', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefoonnummer', $telefoonnummer, PDO::PARAM_STR);
        
        // $stmt->bindParam(':bestel_datumtijd', $bestel_datumtijd, PDO::PARAM_INT);
        // $stmt->bindParam(':betaalmethode', $betaalmethodeint, PDO::PARAM_INT);
        // $stmt->bindParam(':gewenste_moment', $gewenste_moment, PDO::PARAM_INT);

        $stmt->execute();
    }
}
?>