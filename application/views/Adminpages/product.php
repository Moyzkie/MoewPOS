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
      <p class="brand-text font-weight-light text-center ">Pharmacy</p>
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
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
         <a href="<?=base_url('addProduct')?>" class="btn btn-outline-primary float-right" >
          <i class="fas fa-cart-plus nav-icon"></i>
           Add new
         </a>
          <?php
             $flashdata="";
             $unsetflash_data="";
             if($this->session->flashdata('a_status_danger'))
             {
                $flashdata=$this->session->flashdata('a_status_danger');
                $unsetflash_data="a_status_danger";
                $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
             }else{
                $flashdata=$this->session->flashdata('a_status_success');
                $alert_danger = 'class="alert alert-success alert-dismissible text-center"';
                $unsetflash_data="a_status_success";
             }
          ?>
          <?php if($flashdata){?>
            <div <?=$alert_danger?> role="alert" id="hide">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               <i class="icon fa fa-cheack"></i> <?=$flashdata;?>
            </div>
            <?php unset($_SESSION[$unsetflash_data]);?>
          <?php }?>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="product" class="table table-bordered  table-hover ">
            <thead style="font-size: 11.4px"  class="bg-dark">
            <tr>
              <th>Picture</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Size</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data->result() as $row) { ?>
             <?php 
                if($row->stock < 20)
                {
                    $stock = "<span class='badge  badge-pill  badge-danger'>$row->stock pcs</span>";
                }else{
                    $stock = "<span class='badge  badge-pill  badge-success'>$row->stock pcs</span>";
                }
             ?>
            <tr class="text-center ">
              <td>  
                <img  style="width:36px;" alt="Avatar" class="" src="<?=base_url('assets/images/product/')?><?=$row->picture?>">
              </td>
              <td ><?= $row->id?></td>
              <td class="text"><?= $row->pname?></td>
              <td><?=$stock?></td>
              <td><span class="badge  badge-pill  badge-warning "><?=$row->price.' Php'?></span></td>
              <td><?= $row->size?></td>
              <td>
              <a href="<?=base_url('My_controller/editProduct')?>?editProduct=<?=$row->id?>" class="btn btn-sm btn-primary" >
                  <span class="fas fa-pencil-alt"></span>
                
                </a>
                  <!-- <button class="btn btn-sm btn-info ">
                <span class="far fa-eye"></span>
               
                </button> -->
                <a href="<?=base_url('My_controller/delete_product')?>?Product_id=<?=$row->id?>" class="btn btn-sm btn-danger">
                  <span class="fas fa-trash"></span>
                
                </a>
              </td>
            </tr>
            <?php }?>
            </tbody>
            <tfoot style="font-size: 11.4px"class="bg-dark">
            <tr>
              <th>Picture</th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Size</th>
              <td>Action</td>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
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

                      