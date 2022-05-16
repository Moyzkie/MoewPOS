<?php 
  $hasAdmin =$this->session->has_userdata('admin_authenticated');
  $adminData = $this->session->userdata('auth_admin');
?>
<body class="sidebar-mini layout-fixed sidebar-closed sidebar-collapse">
<div class="loder"></div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php if($hasAdmin){ ?>
          <img src="<?=base_url('assets/images/admin/').$adminData['picture']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=base_url('My_controller/adminProfile')?>" class="d-block"><?= $adminData['username']; ?></a>
          <?php } ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
               <a href="dashBoard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="<?=base_url('product')?>" class="nav-link  ">
                  <i class="nav-icon fas fa-capsules"></i>
                  <p>
                    Products
                  </p>
               </a>
          </li>
          <li class="nav-item">
            <a href="orders" class="nav-link  ">
              <i class="fas fa-cart-arrow-down"></i>
                <p>
                  Orders
              </p>
            </a>
        </li>
          <li class="nav-item">
            <a href="report" class="nav-link  ">
              <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Sales
              </p>
            </a>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="cashierInfo" class="nav-link">
                 <i class="fas fa-user-lock nav-icon"></i>
                  <p>Cashier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminInfo" class="nav-link">
                 <i class="fas fa-user-lock nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item">
            <a href="Alogout" class="nav-link  ">
               <i class=" nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log-out
              </p>
            </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="container-fluid">
      <div class="">
       <div class="card">
         <div class="row">
           <div class="col-md-9">
             <div class="card card-warning card-outline">
             <form action="<?=base_url('My_controller/productAdd')?>" method="POST" enctype="multipart/form-data">
                <div class="row m-2">
                   <div class="col-md-12 mt-2">
                       <label for="">Product Name</label>
                       <input type="text" name="p_name"class="form-control"  value= "<?php echo set_value('p_name');?>" placeholder="Enter here" required>
                       <span class="text-danger"><?php echo form_error('p_name');?></span>
                    </div>
                    <div class="col-md-12 mt-2">
                    <label for="">Product Detail</label>
                    <textarea name="p_detail" class="form-control" value= "<?php echo set_value('p_detail');?>" rows="15" required></textarea>
                    <span class="text-danger"><?php echo form_error('p_detail');?></span>
                    </div>
                </div>
             </div>
           </div>
           <div class="col-md-3">
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
               <div class="card">
                  <img src="<?=base_url('assets/images/tm1.jpg')?>" id="imageS" alt="" >
                </div>
                <div  onclick="submit()" class="btn btn-primary btn-block mt-3" id="btnC">Choose Image</div>
                <input style="display:none" id="btnH" type="file"  name="p_image" required>
              </div>
              <div class="row m-2">
                <div class="col-md-6 mt-2">
                  <label for="">Stock</label>
                  <input type="number" name="p_stock" class="form-control" value= "" placeholder="Input here" required >
                  <span class="text-danger"><?php echo form_error('p_stock');?></span>
                </div><?php echo set_value('p_stock');?>
                <div class="col-md-6 mt-2">
                  <label for="">Price</label>
                  <input type="number" name= "p_price"class="form-control" value= "<?php echo set_value('p_price');?>" placeholder="Input here" required>
                  <span class="text-danger"><?php echo form_error('p_price');?></span>
                </div>
                <div class="col-md-12 mt-2">
                  <select class="form-control " name="p_category" >
                    <option value="" >Select Menu</option>
                     <?php foreach($menu->result() as $row) { ?>
                     <option value="<?=$row->id?>"><?=$row->menu_type?></option>
                     <?php } ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('p_category');?></span>
                </div>
                <div class="col-md-12 mt-2">
                  <select class="form-control "   name="p_supplier" >
                    <option value="" >Select Size</option>
                    <option value="S" >S</option>
                    <option value="M" >M</option>
                    <option value="L" >L</option>
                  </select>
                  <span class="text-danger"><?php echo form_error('p_supplier');?></span>
                </div>
                <div class="col-md-6 mt-2">
                   <button type="submit" class="btn btn-outline-primary btn-block ">Submit</button>
                 </div>
                 <div class="col-md-6 mt-2" >
                   <button type="" class="btn btn-outline-danger btn-block" >Cancel</button>
                 </div>
              </div>
            </form>
            </div>
           </div>
         </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
