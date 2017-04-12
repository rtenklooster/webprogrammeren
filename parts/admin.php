<?php
// http://www.bootply.com/TN4AYw6CwH implementeren


// dit moet nog uit de database of sessie komen: product, aantal, prijs
$sampleArray = get_cart_detail();

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
    <div class="panel-heading"><h3 class="panel-title">Bestellingen</h3></div>
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