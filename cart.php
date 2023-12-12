<?php session_start(); ?>
<?php include 'inc/header.php' ?>
<?php include 'inc/navbar.php' ?>
<?php include "classes/db-conn.php" ?>
<?php include "classes/add-product.php"; ?>




<section id="page-header" class="about-header">
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
        <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
</section>

<section id="cart" class="section-p1">
        <table width="100%">

                <thead>
                        <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Desc</td>
                                <td>Quantity</td>
                                <td>price</td>
                                <td>Subtotal</td>
                                <td>Remove</td>
                             
                        </tr>
                </thead>


                <tbody>

                        <tr>
                                <?php
                                if (isset($_POST['delete'])) {
                                        if (isset($_GET["action"])) {
                                                if ($_GET["action"] == "delete") {
                                                        foreach ($_SESSION["shopping_cart"] as $keys => $value) {
                                                                if ($value["id"] == $_GET["id"]) {
                                                                        unset($_SESSION["shopping_cart"][$keys]);
                                                                }
                                                        }
                                                }
                                        }
                                }
                                ?>

                                <?php $total = 0; ?>
                                <?php
                                if (!empty($_SESSION["shopping_cart"])) {

                                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {

                                                $total += $values['item_quantity'] * $values['item_price'];
                                ?>

                                                <td><?= "<img src='img/products/" . trim($values['item_image']) . "'> "; ?></td>
                                                <td><?= $values['item_name'] ?></td>
                                                <td><?= $values['item_desc'] ?></td>
                                                <td><?= $values['item_quantity'] ?></td>
                                                <td><?= $values['item_price'] ?></td>
                                                <td><?= $values['item_quantity'] * $values['item_price'] ?></td>



                                                <form action="cart.php?action=delete&id=<?= $values["id"]; ?>" method="post">
                                                 <td><button type="submit" class="btn btn-danger" name="delete">Delete</button></td>
                                                </form>

                                                
                        </tr>
        <?php }
                                } ?>

                </tbody>
                <!-- confirm order  -->
                <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
                <tr>
                        <td>
                                <h5>total = <?= $total; ?></h5>
                        </td>
                </tr>

        </table>

<?php include "inc/footer.php"; ?>