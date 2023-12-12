<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include "classes/db-conn.php"; ?>
<?php include "classes/add-product.php"; ?>


<?php
$product = new product;
$products = $product->getProduct(); ?>

<section id="product1" class="section-p1">
  <h2>Featured Products</h2>
  <p>Summer Collection New Modren Desgin</p>

  <?php if (isset($_GET['error'])) { ?>
    <p style="background-color:#e9967a ; padding:20px ;"><?php echo $_GET['error']; ?></p>
  <?php } ?>


  <div class="container" style="display:flex ; flex-wrap: wrap; gap: 20px;">

    <?php foreach ($products as $key => $product) { ?>

      <div class="pro">
        <form action="handle/addToCard-hanndle.php?id=<?=$product['id'] ?>" method="post">

          <input type="hidden" name="hidden_image" value="<?= $product['image']; ?>">;
          <input type="hidden" name="hidden_name" value="<?= $product['name']; ?>">;
          <input type="hidden" name="hidden_desc" value="<?= $product['description']; ?>">;
          <input type="hidden" name="hidden_price" value="<?= $product['price']; ?>">;

          <?= "<img src='img/products/" . $product['image'] . "'> "; ?>
          <div class="des">

            <h3><?= $product['name']; ?></h3>
            <h5><?= $product['description']; ?></h5>
            <div class="star " style="cursor: pointer ;">
              <i class="fas fa-star "></i>
              <i class="fas fa-star "></i>
              <i class="fas fa-star "></i>
              <i class="fas fa-star "></i>
              <i class="fas fa-star "></i>
            </div>
            <h4><span style="color: black;">Price :</span> <?= $product['price']; ?></h4>
            <input type="number" name="quant" value="1" style="width: 50px ; padding:2px ; color: blue;">

            <button type="submit" name="addToCart"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>
          </div>
        </form>

      </div>
    <?php } ?>
  </div>




</section>




<section id="pagenation" class="section-p1">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="shop.php" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>

      <li class="page-item">
        <a class="page-link" href="shop.php?" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>

</section>

<section id="newsletter" class="section-p1 section-m1">
  <div class="newstext ">
    <h4>Sign Up For Newletters</h4>
    <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
  </div>
  <div class="form ">
    <input type="text " placeholder="Enter Your E-mail... ">
    <button class="normal ">Sign Up</button>
  </div>
</section>


<?php include 'inc/footer.php' ?>