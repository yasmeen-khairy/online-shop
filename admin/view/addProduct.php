

<?php

 
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../classes/db-conn.php"; 



?>
<?php require_once 'App.php'; ?>
<?php 
$Categories = $category->getCats();
?>
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="../../handle/add-product-handle.php" enctype="multipart/form-data">
                <?php if(isset($_GET['error'])){ ?>
            <p style="background-color:#E76544 ; padding:20px ;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p style="background-color:#4BC557
                                    ; padding:20px ;"><?php echo $_GET['success']; ?></p>
            <?php } ?>
         
                  <div class="form-group">
                    <label>Category</label>
                  
                     
                    
                    <select style="color: white;" name="cat" class="form-control p_input">
                    <option value="Choose category">Choose category</option>
                    <?php  foreach($Categories as $Cate): ?>
                      <option value="<?= $Cate['title'] ?>"><?= $Cate['title'] ?></option>
                      <?php endforeach; ?>
                    </select>  
                                
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php 
include "../view/footer.php";

 ?>