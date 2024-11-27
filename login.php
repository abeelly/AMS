<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<body class="hold-transition login-page" style="background-image: url('/AMS/assets/uploads/hangar.jpg'); background-size: cover; background-position: center;">
<div class="login-box">
  <div class="login-logo">
  <a href="#" class="text-red" style="font-weight: bold; font-size: 70px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
  <b><?php echo $_SESSION['system']['name']?></b>
  </a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2); border-radius: 8px;">
    <div class="card-body login-card-body">
      <form action="" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-danger">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function () {
    $('#login-form').submit(function (e) {
      e.preventDefault(); // Prevent form submission
      
      start_load(); // Start the loading indicator
      
      // Remove previous alerts
      if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
      
      // Get the password input
      let password = $('input[name="password"]').val();
      
      // Regular expression for at least one number or special character
      const passwordRegex = /(?=.*\d)|(?=.*[\W_])/;
      
      if (!passwordRegex.test(password)) {
        // Show alert if the password doesn't meet the criteria
        $(this).prepend('<div class="alert alert-danger">Password must include at least one number or special character.</div>');
        end_load();
        return;
      }

      // Submit the form via AJAX if validation passes
      $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
          console.log(err);
          end_load();
        },
        success: function (resp) {
          if (resp == 1) {
            location.href = 'index.php?page=home';
          } else {
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
            end_load();
          }
        }
      });
    });
  });
</script>
<?php include 'footer.php' ?>

</body>
</html>
