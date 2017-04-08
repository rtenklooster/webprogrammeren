<?php
// dit moet nog uit de database of sessie komen: product, aantal, prijs
$sampleArray = [["Pizza", 3, 12.50], ["Pasta", 2, 15.50]];
$numberProducts = count($sampleArray);

//totaalbedrag uitrekenen
$totalOrder = 0;
foreach ($sampleArray as $product) {
    $totalOrder += $product[2];
}



function intToEuro($input = 0) {
    setlocale(LC_MONETARY, 'nl_NL');
    $value = money_format('%(#1n', $input);
    return str_replace('Eu','&euro;',$value);
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
            echo "<tr>";
                echo "<td>{$product[0]}</td>";
                echo "<td>{$product[1]}</td>";
                echo "<td>" . intToEuro($product[2]) ."</td>";
                echo "<td class='text-right'><span class='glyphicon glyphicon-remove red' id='remove'></span></td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="2">
                <strong>Totaal</strong>
            </td>
            <td colspan="2">
                <strong> <?php echo intToEuro($totalOrder); ?></strong>
            </td>
        </tr>
</table>
</div>

<button class="btn btn-primary btn-lg pull-right">Bestel</button>

<?php

?>
<script src="js/afrekenen.js" defer></script>