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
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Naam</th>
            <th>omschrijving</th>
            <th>Categorie</th>
            <th>Prijs</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align:center;">123@hotmail.com</td>
            <td style="text-align:center;">0123456</td>
            <td style="text-align:center;">user123</td>
            <td style="text-align:center;">Admin</td>
            <td style="text-align:center;">
                <button class="btn btn-success" contenteditable="false" data-target="#myModal" data-toggle="modal">Edit</button>
            </td>
        </tr>
    </tbody>
</table>
<div tabindex="-1" class="modal fade" id="myModal" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"> <span aria-hidden="true">×   </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Modal title</h4>

            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
