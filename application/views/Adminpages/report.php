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
            <h1 class="m-0">Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
         <div class="col-12">
           <form action="<?=base_url('My_controller/generateReport')?>" method="POST"> 
           <div class="card p-3 mb-3">
             <div class="row">
               <div class="col-6  mb-3 mt-1">
                 <label for="" class="">Start Date</label>
                 <input type="date" id="min" name="min" class="form-control" required>
               </div>
               <div class="col-6 mb-3 mt-1">
                 <label for="" class="">End Date</label>
                 <input type="date" id="max" name="max" class="form-control" required>
               </div>
               <div class="col-12 mb-3  ">
                   <input  type="submit" class="btn btn-success float-right" value="Generate Report">
               </div>
             </div>
           </div>
           </form>
           <!-- <?php if($result !=Null){?> -->
          <div class="card p-3 mb-3 ">
           <div class="invoice p-3 mb-3">
             <div class="row">
               <div class="col-12">
                 <h5>
                   <i class="fas fa-globe"></i>
                    Meow Miktea
                    <small class="float-right">From: <?= $date['min']?> - <?= $date['max']?> </small>
                 </h5>
               </div>
             </div>
             <div class="row">
                <div class="col-12 table-responsive">
                  <table id="report"class="table table-striped">
                    <thead>
                    <tr>
                      <th>Order#</th>
                      <th>Product Name</th>
                      <th>Order Date</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($result->result() as $row){ ?>
                    <tr>
                      <td><?=$row->order_id?></td>
                      <td><?=$row->name?></td>
                      <td><?=$row->order_date?></td>
                      <td><?=$row->qty?></td>
                      <td><?=$row->price?></td>
                      <td><?=$row->total?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table" >
                      <thead>
                        <tr>
                        <th id = "total" style="width:50%" class="text-right"> Total Sale</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                      <?php foreach ($totalSale->result() as $totalSales){?>
                         <td class="text-right"><h1 class="badge  badge-lg  bg-success"><?=$totalSales->totalSale?></h1></td>
                        <?php }?>
                      
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row no-print">
                <div class="col-12">
                  <form action="<?=base_url('My_controller/printReport')?>" method="post">
                  <input style="display:none" type="text" id="min" name="pmin" class="form-control" value="<?= $date['min']?> ">
                  <input style="display:none" type="text" id="min" name="pmax" class="form-control"  value="<?= $date['max']?> ">
                  <button type="submit"  class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                  </form>
                </div>
              </div>
              <!-- <?php }?> -->
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
    <strong>Copyright &copy; 2021-2022- <a href="#">Pharmacy Online Shop</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
