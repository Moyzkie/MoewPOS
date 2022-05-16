<style>
  body{
  background-image: url("<?=base_url('assets/images/toki.jpg')?>");
  background-image: url(http://localhost/POS/assets/images/toki.jpg);
  background-repeat: no-repeat;
  background-position-x: center;
  background-size: cover;
  }
</style>
<body class="login-page" style="min-height: 332.781px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Change password!</p>
      <form action="<?=base_url()?>/My_controller/get_recovery_token?recovery_token=<?=$recovery_token?>" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="conpassword" id="conpassword" placeholder="Re-typepassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block">Save</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="userlogin" class="text-center text-dark">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center text-dark">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
