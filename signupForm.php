
<?php
include "inc/header.php";
include "inc/navbar.php";

?>
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
               
                <form method="post" action="handle/signup-handle.php" class="container" style="width:500px ; background-color: #eee; padding: 20px;">
                <h3 class="card-title text-left mb-3">Register</h3>
                <?php if(isset($_GET['error'])){ ?>
            <p style="background-color:#e9967a ; padding:20px ;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="username">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="pass">
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control p_input" name="phone">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name="add">
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit" style="width: 100px ;" class="btn btn-primary btn-block enter-btn" name="signup">Signup</button>
                  </div>
                  <div class="d-flex">
                  <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> <a href="http://www.facebook.com"> facebook</a> </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> <a href="http://www.google.com"> Google plus</a>  </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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

    <?php include "inc/footer.php" ?>