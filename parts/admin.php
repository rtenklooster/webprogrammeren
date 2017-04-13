<?php
// http://www.bootply.com/TN4AYw6CwH implementeren


// dit moet nog uit de database of sessie komen: product, aantal, prijs
$productArray = getAllProducts();
/*echo "<pre>";
print_r($productArray);
echo "</pre>";
exit;
*/




?>
<div class="panel panel-default">
<?php
if(!$_SESSION['logged_in']){
    echo "Helaas u heeft geen rechten om deze pagina te bezoeken.";
  }else{
    ?>
  <!-- Default panel contents -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>Categorie</th>
            <th>Prijs in centen</th>
            <th>Wijzig</th>
            <th>Wis</th>
        </tr>
    </thead>
    <tbody>
      <?php

      foreach($productArray as $product){
        echo '
            <tr>
                <td style="text-align:left;">'.$product["id"].'</td>
                <td style="text-align:left;">'.$product["naam"].'</td>
                <td style="text-align:left;">'.$product["omschrijving"].'</td>
                <td style="text-align:left;">'.$product["categorie"].'</td>
                <td style="text-align:left;">'.$product["prijs"].'</td>
                <td style="text-align:left;">
                    <button class="btn btn-success" contenteditable="false" data-target="#myModal" data-toggle="modal">Wijzig</button>
                </td>
                <td style="text-align:left;">
                  <a href="functions/updateProduct.php?action=delete&id='.$product["id"].'" class="btn btn-warning" role="button">Wis</a>
                </td>
            </tr>

        ';

}
       ?>

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
<?php
}
 ?>
</div>
