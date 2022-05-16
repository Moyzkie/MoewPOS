<?php
  $flashdata="";
  $unsetflash_data="";
  if($this->session->flashdata('c_danger'))
  {
    $flashdata=$this->session->flashdata('c_danger');
    $unsetflash_data="c_danger";
    $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
  }else
  {
    $flashdata=$this->session->flashdata('c_success');
    $alert_danger = 'class="alert alert-success alert-dismissible text-center"';
    $unsetflash_data="c_success";
  }
?>
<style>
  body{
  background-image: url("<?=base_url('assets/images/toki.jpg')?>");
  background-image: url(http://localhost/POS/assets/images/meow.png);
  background-repeat: no-repeat;
  background-position-x: center;
  background-size: cover;
  }
</style>
<body class="login-page" >
<div class="login-box style=" style="opacity: 0.8;">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>MEOW</b>POS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if($flashdata):?>
        <div <?=$alert_danger?> role="alert" id="hide">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-cheack"></i> <?= $flashdata?>
        </div>
        <?php unset($_SESSION[$unsetflash_data]);?>
      <?php  endif; ?>
      <form id="login-form" action="login" method="POST">
        <div class="input-group mb-3">
        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span  class="text-danger"><?php echo form_error('email');?></span>
        <div class="input-group mb-3">
        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span  class="text-danger"><?php echo form_error('password');?></span>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 mt-2">
        <a href="forgotpassword" class="text-dark ">I forgot my password</a>
      </p>
      <p class="mb-0">
      
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->




