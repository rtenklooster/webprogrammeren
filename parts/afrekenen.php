<?php
// dit moet nog uit de database of sessie komen: product, aantal, prijs
$sampleArray = get_cart_detail();

if($sampleArray) {
    $numberProducts = count($sampleArray);

    //totaalbedrag uitrekenen
    $totalOrder = 0;
    foreach ($sampleArray as $product) {
        if($product["aantal"] >0 ){
            $totalOrder += $product["prijs"] * $product["aantal"];
        }
    }
    ?>

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading"><h3 class="panel-title">Uw bestelling</h3></div>
            <table class="table table-hover">
            <tr>
                <th>Product</th>
                <th>Aantal</th>
                <th colspan="2">Prijs</th>
            </tr>
            <?php foreach ($sampleArray as $index=>$product) {
                // var_dump($index);
                // var_dump($product);
                echo "<tr id={$product['id']}>";
                    echo "<td>{$product["naam"]}</td>";
                    echo "<td>{$product["aantal"]}</td>";
                    echo "<td>{$product["regelprijs"]}</td>";
                    echo "<td class='text-right'><span class='glyphicon glyphicon-remove red' id='remove'></span></td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="2">
                    <strong>Totaal</strong>
                </td>
                <td id="totaalWinkelmandje" colspan="2">
                    <strong> <?php echo convertPrice($totalOrder); ?></strong>
                </td>
            </tr>
    </table>
    </div>

    <h3>Afleveradres</h3>
    <form id="afleveradres" action="?page=bedankt" method="POST">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="tussenvoegsel">Tussenvoegsel</label>
                    <input type="text" name="tussenvoegsel" class="form-control">
                </div>
                <div class="col-xs-6">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" name="achternaam" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <label for="adres">Adres</label>
                    <input type="text" name="adres" class="form-control" required="true">
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-4">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" class="form-control" pattern="^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$" required="true">
                </div>
                <div class="col-xs-8">
                    <label for="woonplaats">Woonplaats</label>
                    <input type="text" name="woonplaats" class="form-control" required="true">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" required="true">
                </div>
                <div class="col-xs-6">
                    <label for="telefoonnummer">Telefoonnummer</label>
                    <input type="number" name="telefoonnummer" class="form-control" required="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="betaalmethode">Betaalmethode</label>
            <select name="betaalmethode" class="form-control" id="betaalmethode" required>
                <option value=""></option>
                <option value="ideal">iDeal</option>
                <option value="bijdebezorger">Bij de bezorger</option>
            </select>
        </div>

        <button id="bestel" class="btn btn-primary btn-lg pull-right">Bestel</button>
    </form>

    <?php
}else{
  ?>

      <div class="panel panel-default">
      <!-- Default panel contents -->
          <div class="panel-heading"><h3 class="panel-title">Uw bestelling</h3></div>
          <div class="alert alert-warning " role="alert" > Uw winkelmandje is nog leeg! Klik <a href="?page=bestellen">hier</a> om producten toe te voegen!
          </div>
      </div>
<?php
}
?>
<script src="js/afrekenen.js" defer></script>
