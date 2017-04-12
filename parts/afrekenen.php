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
                <td colspan="2">
                    <strong> <?php echo convertPrice($totalOrder); ?></strong>
                </td>
            </tr>
    </table>
    </div>

    <h3>Afleveradres</h3>
    <form>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <label for="naam">Naam</label>
                    <input type="text" name="naam" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <label for="straat">Straat</label>
                    <input type="text" name="straat" class="form-control">
                </div>
                <div class="col-xs-4">
                    <label for"huisnummer">Huisnummer</label>
                    <input type="text" name="huisnummer" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" class="form-control" pattern="^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$">
                </div>
                <div class="col-xs-8">
                    <label for="woonplaats">Woonplaats</label>
                    <input type="text" name="woonplaats" class="form-control">
                </div>
            </div>
        </div>
    </form>

    <h3>Betaalmethode</h3>
    <div class="dropdown">
         <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             Kies <span class="caret">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li id="ideal"><a href="#">iDeal</a></li>
            <li id="bezorger"><a href="#">Aan de bezorger</a></li>
        </ul>

    </div>

    <button class="btn btn-primary btn-lg pull-right">Bestel</button>

    <?php
}
?>
<script src="js/afrekenen.js" defer></script>
