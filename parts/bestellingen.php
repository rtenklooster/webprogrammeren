<?php
// Controleer of een gebruiker is ingelogd.
$button[] = '<button class="btn btn-danger btn-sm pull-right" name="action" value="logout" style="width:100px;">Overdue</button>';
$button[] = '<button class="btn btn-primary btn-sm pull-right" name="action" value="logout" style="width:100px;">Nieuw</button>';
$button[] = '<button class="btn btn-success btn-sm pull-right" name="action" value="logout" style="width:100px;">Voltooid</button>';
$button[] = '<button class="btn btn-info btn-sm pull-right" name="action" value="logout" style="width:100px;">Gepland</button>';
$button[] = '<button class="btn btn-warning btn-sm pull-right" name="action" value="logout" style="width:100px;">Waarschuwing</button>';

if(!$_SESSION['logged_in']){
    echo "Helaas u heeft geen rechten om deze pagina te bezoeken.";
  }elseif($_SESSION['autorisatie_id'] <= 2){
    // Alleen level 1 en 2 mogen deze pagina zijn.
    require_once('functions/get_orders.php');
    // Haal de bestellingen uit de database
    $bestellingArray = getOrders();
?>

<div class="panel-group" id="accordion">
<?php
  $i = 0; // Teller initialiseren
    foreach($bestellingArray AS $order){
      ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title" style="height:25px;">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
              <strong><?php echo date("d-m-Y H:i", strtotime($order['bestelling']['bestel_datumtijd']));?></strong> Gepland:<strong><?php echo date("H:i", strtotime($order['bestelling']['gewenste_moment']));?></strong> - <?php echo $order['bestelling']['voornaam']." ". $order['bestelling']['tussenvoegsel']." ". $order['bestelling']['achternaam'].", ". $order['bestelling']['woonplaats'];?>
            </a>
            <?php echo $button[rand(0,4)]; ?>
          </h4>
        </div>
        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
          <ul class="list-group">
          <?php
            foreach($order['regels'] AS $regel){
          ?>
              <li class="list-group-item"><?php echo $regel['aantal']; ?>x <?php echo $regel['productcategorie']; ?> <?php echo $regel['productnaam']; ?> </li>
          <?php
          }
          ?>
          </ul>
        </div>
      </div>
        <?php
        $i ++; // teller ophogen.
    }
    ?>
</div>

<?php
}else{
  echo "Helaas u bent ingelogd, u heeft echter niet genoeg rechten om deze pagina te bezoeken.<br> Uw autorizatie level is ". $_SESSION['autorisatie_id']." terwijl voor deze pagina een level van  <= 2 wordt vereist.";
}
?>
