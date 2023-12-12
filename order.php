
<?php include "inc/header.php"; ?>
<?php 
session_start();
include "inc/navbar.php";
include "classes/db-conn.php"; 
?>

<?php 
echo $_SESSION['user'];

if(isset($_POST['order']))
{
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $city = htmlspecialchars(trim($_POST['city']));
    $total = (isset( $_SESSION['total']))?  $_SESSION['total']:0;
    $user_id = $_SESSION['id'];
    $code_value = (isset($_SESSION['value']))? $_SESSION['value']:0;
    $total_after_disc= (isset($_SESSION['type']) && $_SESSION['type'] == 'percentage')? ($total * $code_value) / 100: $total - $code_value;

    if(empty($name) ||empty($email) || empty($phone) || empty($city) ){
        echo '<div class="alert alert-primary" role="alert">
        All inputs required
        </div>';
                        }elseif(is_numeric($name) || is_numeric($email)){
                          echo '<div class="alert alert-primary" role="alert">
                         name or email must be string
                          </div>';
                        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                            echo '<div class="alert alert-primary" role="alert">
                            check the email syntax
                            </div>';
                          }elseif(strlen($name) < 5){
                            echo '<div class="alert alert-primary" role="alert">
          check the length of name
          </div>';
                          }else{
if(isset($_SESSION['cart'])){

    $add = "INSERT INTO `orders` (`name`,`email`,`phone`,`address`,`city`,`total`,`total_after_disc`,`user_id`) VALUES('$name','$email','$phone','$address','$city','$total','$total_after_disc','$user_id')";
    $run_add = mysqli_query($conn,$add);


foreach($_SESSION['cart'] as $value){
    $select_order = "SELECT `id` from `orders` where `user_id`='$user_id' order by id DESC";
$run_order = mysqli_query($conn,$select_order);
$order_id = mysqli_fetch_assoc($run_order)['id'];
print_r($order_id);
    $quantity = $value['quantity'];
    $product_id = $value['id'];
    $add_orders = "INSERT INTO `orders_products` (`quantity`,`order_id`,`product_id`) VALUES ('$quantity','$order_id','$product_id')";
    $run_orders = mysqli_query($conn,$add_orders);
}
unset($_SESSION['value']);
unset($_SESSION['type']);
unset($_SESSION['cart']);

}else{
    echo '<div class="alert alert-primary" role="alert">
    you do not have any item in your cart data
    </div>';
}

                          }


}









if(isset($_POST['discount'])){
    
$code =  htmlspecialchars(trim($_POST['code']));
$sql = "SELECT `id` ,`code`,`value`,`uses`,`max_uses`,`type` from `vouchers` where `code` = '$code'";
$run_sql = mysqli_query($conn,$sql);
$row = mysqli_num_rows($run_sql);
if($row > 0){
$fetch = mysqli_fetch_assoc($run_sql);
$value =  $fetch['value'];
$type =   $fetch['type'];
$uses =   $fetch['uses'];
$max_uses = $fetch['max_uses'];
$voucher_id = $fetch['id'];
$user_id = $_SESSION['id'];
$_SESSION['value'] = $value;
$_SESSION['type'] = $type;


 $sum =$_SESSION['sum'] = $uses + 1; // 1
 if(isset($sum) && $sum <= $max_uses){
    $add_uses = "UPDATE `vouchers` set `uses` ='$sum' where `code` ='$code'";
    $run_uses = mysqli_query($conn,$add_uses);
    $add = "INSERT INTO `users_vouchers` (`user_id`,`voucher_id`) values('$user_id','$voucher_id')";
    $run_add = mysqli_query($conn,$add);
    if($run_uses){
        echo '<div class="alert alert-primary" role="alert">
        code applied
           </div>';
    }
 }else{
    echo '<div class="alert alert-primary" role="alert">
    code expired
       </div>';
 }





}else{
    echo '<div class="alert alert-primary" role="alert">
    code invalid
       </div>';
}



}
?>


<div class="container col-4">
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Your name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" name="city" class="form-control" id="exampleInputPassword1" placeholder="City">
  </div>

  <button type="submit" name="order" class="btn btn-primary">Submit</button>
</form>
</div>


    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <form method="POST">
            <input type="text" name="code" placeholder="Enter coupon code">
            <button type="submit" name="discount" class="normal">Apply</button>
            </form>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

    <?php include "footer.php" ?>