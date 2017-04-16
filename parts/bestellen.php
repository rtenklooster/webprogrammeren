<?php
// Welke productcategorie
if(isset($_GET['cat'])){
  $catSelected = htmlspecialchars($_GET['cat']);
}else{
    $catSelected = 1;
}
// Haal de producten op.
$producten = getProducts($catSelected, 0, 8 );


 ?>
<div class="row">
  <?php
  foreach($producten AS $product){
  ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/products/<?php echo $product['id'] ?>.png" alt="<?php echo $product['naam'] ?>">
      <div class="caption">
        <h3><?php echo $product['naam'];?></h3>
        <p><?php echo $product['omschrijving'];?></p>

        <div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-btn">
              <!-- de button's moeten unieke id's meekrijgen -->
                <button class="btn btn-danger" id="product<?php echo $product['id']; ?>min" type="button"> - </button>
                <button class="btn btn-primary" id="product<?php echo $product['id']; ?>plus" type="button"> + </button>
              </span>
              <input type="text" id="product<?php echo $product['id']; ?>amount" class="form-control" value="<?php echo getNrInChart($product['id']); ?>">
            </div>
          </div>

          <div class="col-lg-6">
            <button class="btn btn-primary pull-right" id="product<?php echo $product['id']; ?>order" type="button"><?php echo convertPrice($product['prijs']); ?></button>
          </div>
        </div><!-- /.row -->

      </div>
    </div>
  </div>
<?php
} ?>


</div>
<?php //print_r($_SESSION['cart']); ?>
<script src="js/bestellen.js" defer></script>
