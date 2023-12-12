<?php
include "inc/header.php";
include "inc/navbar.php";

?>

            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                
                <form action="handle/login-handle.php" method="post" class="container" style="width:500px ; background-color: #eee; padding: 20px;">
                <h3 class="card-title text-left mb-3">Login</h3>
                  <!-- error display -->
                <?php if(isset($_GET['error'])){ ?>
            <p style="background-color:#e9967a ; padding:20px ;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <p style="background-color:#82E0AA ; padding:20px ;"><?php echo $_GET['success']; ?></p>
            <?php } ?>
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="pass">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="login">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> <a href="http://www.facebook.com"> facebook</a> </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> <a href="http://www.google.com"> Google plus</a>  </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
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

