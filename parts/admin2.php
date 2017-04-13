<?php
if(!$_SESSION['logged_in']) {
    echo "Helaas, u heeft geen rechten om deze pagina te bezoeken.";
} else {
include_once ('functions/get_orders.php');


}
?>