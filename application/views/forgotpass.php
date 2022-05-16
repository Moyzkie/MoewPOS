<style>
  body{
  background-image: url("<?=base_url('assets/images/toki.jpg')?>");
  background-image: url(http://localhost/POS/assets/images/meow.png);
  background-repeat: no-repeat;
  background-position-x: center;
  background-size: cover;
  }
</style>
<body class="login-page" style="min-height: 332.781px;">
<div class="login-box" style="opacity:0.8">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <?php
        $flashdata="";
        $unsetflash_data="";
        if($this->session->flashdata('c_danger'))
        {
            $flashdata=$this->session->flashdata('c_danger');
            $unsetflash_data="c_danger";
            $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
        }
        else
        {
            $flashdata=$this->session->flashdata('c_success');
            $alert_danger = 'class="alert alert-success alert-dismissible text-center"';   
            $unsetflash_data="c_success";
        }?>
        <?php if($flashdata):?>
            <div <?=$alert_danger?> role="alert" id="hide">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <i class="icon fa fa-cheack"></i> <?= $flashdata?>
            </div>
            <?php unset($_SESSION[$unsetflash_data]);?>
       <?php  endif; ?>
      <form action="sendrecovery_token" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block">Send Recovery token</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="userlogin" class="text-center text-dark">Login</a>
      </p>
      <p class="mb-0">
     
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->