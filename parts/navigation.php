<?php
// inporteer benodigde functies
require_once("functions/get_products.php");
//
$categories = getProductcategorie();
if(isset($_GET['cat'])){
  $catSelected = htmlspecialchars($_GET['cat']);
}else{
    $catSelected = 1;
}

?>
<div class="col-sm-3 offset-sm-1">
    <div class="navigatie">

            <a href="index.php" class="btn btn-default btn-lg btn-block" role="button">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
            </a>
            <a href="?page=bestellen" class="btn btn-default btn-lg btn-block" role="button">Bestellen</a>
            <?php
            // Check even of de pagina bestellen is. Anders hoeven de categories niet worden ingegeladen.
            if(isset($_GET['page'])){
              if($_GET['page'] == "bestellen"){
            ?>
              <div class="list-group"><br>
                <?php
                foreach($categories AS $cat){
                  if($catSelected == $cat['id']){
                    $active = "active";
                  }else{
                    $active = "";
                  }
                  echo  '<a href="?page=bestellen&cat='. $cat['id'] .'" class="list-group-item '. $active .'"> '. $cat['naam'] .'</a>';
                }
                ?>
              </div>
            <?php
          }
        };
            
           
            
            
            
            
            ?>
            


            <div class="btn-group btn-block">
                <button type="button" class="btn btn-default btn-lg dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Wie wij zijn <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="?page=overons">Over ons</a></li>
                    <li><a href="?page=foto">Foto's</a></li>
                </ul>
            </div>

            <div class="btn-group btn-block">
                <button type="button" class="btn btn-default btn-lg dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="?page=contactgegevens">Contactgegevens</a></li>
                    <li><a href="?page=openingstijden">Openingstijden</a></li>
                    <li><a href="?page=veelgesteldevragen">Veelgestelde vragen</a></li>
                </ul>
            </div>
            <a href="?page=afrekenen" class="btn btn-primary btn-lg btn-block" role="button" id="totaalBedrag">Winkelmandje: € 0,00
            </a>
            <?php
                if($_SESSION['logged_in']){
                  echo '<a href="?page=admin&acminactie=bestellingen" class="btn btn-primary btn-warning btn-block" role="button" >Bestellingen inzien</a>';
                  echo '<a href="?page=admin&adminactie=producten" class="btn btn-primary btn-warning btn-block" role="button" >Producten wijzigen</a>';
                }
            ?>

            <?php
                 if($_SESSION['logged_in']) {
                    ?>
                    <div class="brn-group btn-block">
                        <a href="?page=admin" class="btn btn-warning btn-lg btn-block">Producten</a>
                        <a href="?page=admin2" class="btn btn-warning btn-lg btn-block">Bestellingen</a>
                    
                    </div>
                    <?php
                }
            ?>

    </div>
</div>
