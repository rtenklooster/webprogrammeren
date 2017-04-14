<div class="panel panel-default">
<?php
// Controleer of een gebruiker is ingelogd.
if(!$_SESSION['logged_in']){
    echo "Helaas u heeft geen rechten om deze pagina te bezoeken.";
  }else{
    // Haal de bestellingen uit de database
    $bestellingArray = getOrders();
?>
  <!-- Default panel contents -->
  <div class="panel panel-primary filterable">
    <div class="panel-heading">
        <h3 class="panel-title">Bestellingen</h3>
        <div class="pull-right">
            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
        </div>
    </div>
<table class="table table-bordered table-striped">
    <thead>
        <tr class="filters">
            <th id="Id"><input type="text" class="form-control" placeholder="Id" disabled></th>
            <th id="Naam"><input type="text" class="form-control" placeholder="Naam" disabled></th>
            <th id="Omschrijving"><input type="text" class="form-control" placeholder="Omschrijving" disabled></th>
            <th id="Categorie"><input type="text" class="form-control" placeholder="Categorie" disabled></th>
            <th id="Prijs in centen"><input type="text" class="form-control" placeholder="Prijs in centen" disabled></th>
            <th id="Wijzig">Wijzig</th>
            <th id="Wis">Wis</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // Doorloop de producten array en maak voor ieder product een tabel rij aan.
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
                <button class="close" type="button" data-dismiss="modal"> <span aria-hidden="true">×   </span><span class="sr-only">Sluit</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Wijzig product</h4>

            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Sluiten</button>
                <button class="btn btn-primary" type="button">Opslaan</button>
            </div>
        </div>
    </div>
</div>
<?php
  }
?>
</div>
