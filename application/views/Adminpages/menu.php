<?php 
  $hasAdmin =$this->session->has_userdata('admin_authenticated');
  $adminData = $this->session->userdata('auth_admin');
?>
<body class="hold-transition sidebar-mini layout-fixed">
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
  <!---Start Modal-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('My_controller/addmenu')?>" method="POST" >
          <div class="card-body ">
            <div class="form-group ">
              <label >Name of Menu</label>
              <input type="text" name="menu" class="form-control"  placeholder="Enter..." required>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <!---End modal-->

 <!---- Start Editmodal--->
 <div class="modal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('My_controller/updateMenu')?>" method="POST" >
          <div class="card-body ">
          <div class="form-group ">
              <label >Menu_ID</label>
              <input type="number"  id="mid" name="mid" class="form-control"  readonly>
            </div>
            <div class="form-group ">
              <label >Name of Menu</label>
              <input type="text"  id="mname" name="mname" class="form-control"  placeholder="Enter..." required>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success ">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <!---End modal-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Milk Tea Menu</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
         <div class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#add">
          <i class="fas fa-cart-plus nav-icon"></i>
           Add new
          </div>
          <?php
             $flashdata="";
             $unsetflash_data="";
             if($this->session->flashdata('c_status_danger'))
             {
                $flashdata=$this->session->flashdata('c_status_danger');
                $unsetflash_data="c_status_danger";
                $alert_danger = 'class="alert alert-danger alert-dismissible text-center"';
             }else{
                $flashdata=$this->session->flashdata('c_status_success');
                $alert_danger = 'class="alert alert-success alert-dismissible text-center"';
                $unsetflash_data="c_status_success";
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
          <table id="p_category_table" class="table table-bordered  table-hover ">
            <thead style="font-size: 11.4px"  class="bg-dark">
            <tr>
              <th>Menu_id</th>
              <th>Name of Menu</th>
              <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data->result() as $row) { ?>
            <tr class="text-center ">
              <td><?= $row->id?></td>
              <td><?= $row->menu_type?></td>
              <td>
                <button class="btn btn-sm btn-primary editmenu" data-toggle="modal" data-target="#edit">
                  <span class="fas fa-pencil-alt"></span>
                  </button>
                <a href="<?=base_url('My_controller/deletemenu')?>?menuid=<?=$row->id?>" class="btn btn-sm btn-danger">
                  <span class="fas fa-trash"></span>
                </a>
              </td>
            </tr>
            <?php }?>
            </tbody>
            <tfoot style="font-size: 11.4px"class="bg-dark">
            <tr>
              <th>Menu_id</th>
              <th>Name of Menu</th>
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
