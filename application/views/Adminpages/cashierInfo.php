<style>
    .alert-danger p{
        color:red;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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
          <img src="<?= base_url('assets/images/admin/').$adminData['picture']?>" class="img-circle elevation-2" alt="User Image">
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
            <h1 class="m-0">Cashier Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
        <div class="card-header">
         <a href="#" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addmodal" >
          <i class="fas fa-cart-plus nav-icon"></i>
           Add new
         </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="admin" class="table table-bordered  table-hover ">
            <thead style="font-size: 11.4px"  class="bg-dark">
            <tr>
              <th>ID</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            </thead>
           
            <tfoot style="font-size: 11.4px"class="bg-dark">
            <tr>
              <th>ID</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>
  <!-----addmodal-->
  <div id="addmodal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="add_admin" enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black" id="">Add Cashier</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
      <div class="form-group col-md-12">
       <label>Username</label>
       <input type="text" id="add_username" name="add_username"   class="form-control"  value="" required>
       <span id ="error_username" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="add_email" name="add_email"  class="form-control" required>
         <span id ="error_email" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="add_password" name="add_password"  class="form-control" required>
         <span id ="error_password" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="add_profile" name="add_profile"  class="form-control" required>
         <span id ="error_profile" name ="error_profile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
     <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button"  onclick="addCashier()"  class="btn btn-primary" >Save</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-----End addmodal-->

 <!-----editmodal-->
 <div id="editmodal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="" METHOD="POST" id="edit_admin" enctype="multipart/form-data">
     <div  style="" class="modal-header">      
      <h4 class="modal-title text-black" id="">Edit Cashier</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body row">     
      <div class="form-group col-md-12">
        <input type="text" id="id" name="id" style="display:none">
        <input type="text" style="display:none" id ="oldp" name="oldp">
        <input type="text" style="display:none" id ="oldpassword" name="oldpassword">
       <label>Username</label>
       <input type="text" id="edit_username" name="edit_username"   class="form-control"  value="" required>
       <span id ="error_editusername" class="alert-danger"></span>
     </div>
      <div class="form-group col-md-12">
         <label>Email</label>
         <input type="email" id="edit_email" name="edit_email"  class="form-control" required>
         <span id ="error_editemail" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Password</label>
         <input type="password" id="edit_password" name="edit_password"  class="form-control" required>
         <span id ="error_editpassword" class="alert-danger"></span>
      </div>    
      <div class="form-group col-md-12">
         <label>Profile</label>
         <input type="file" id="edit_profile" name="edit_profile"  class="form-control" required>
         <span id ="error_editprofile" name ="error_profile" class="alert-danger"></span>
      </div>
     </div>
     <div  style="" class="modal-footer">
     <input type="reset" class="btn btn-danger"  value="Clear">
      <button type="button"  onclick="editCashier()"  class="btn btn-primary" >Save</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-----End editmodal-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url();?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url();?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url();?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url();?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url();?>assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url();?>ass/dist/js/pages/dashboard.js"></script> -->

<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url();?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url();?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script src="<?= base_url();?>assets/js/category_table.js"></script>
<script src="<?= base_url();?>assets/js/product_table.js"></script>
<script src="<?= base_url();?>assets/js/supplier_table.js"></script>
<script src="<?= base_url();?>assets/js/edit.js"></script>
<script src="<?= base_url();?>assets/js/report_table.js"></script>
<script src="<?= base_url();?>assets/js/custom.js"></script>
<script src="<?= base_url();?>assets/js/cleave.js"></script>
<script src="<?= base_url();?>assets/js/cleave-phone.i18n.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
 $(document).ready(function(){
  cashierInfo()
    });
    function cashierInfo(){
      $('#admin').DataTable({
      destroy: true,
      ajax:"<?=base_url('My_controller/displayCashierInfo')?>",
      columns:[
        {data:"id"},
        {data:"username"},
        {data:"email"},
        {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getCashier('+item.id+')" href="" data-toggle="modal" data-target="#editmodal">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteCashier('+item.id+')">DELETE</a></div>' } }
      ],
      "responsive": true, "lengthChange": false, "autoWidth": false,
    });
  }

function getCashier(id){

$.post("<?=base_url('My_controller/getCashier')?>",{
   id:id
 },function(data,status){
   var Admin = JSON.parse(data);
   $('#id').val(Admin.id)
   $('#oldp').val(Admin.picture)
   $('#edit_username').val(Admin.username);
   $('#edit_email').val(Admin.email);
   $('#edit_profile').val(Admin.profile);
   $('#edit_status').val(Admin.status);
   $('#oldpassword').val(Admin.password)
  });
}

function addCashier(){
    
    var formData = new FormData($('#add_admin')[0]);

    $.ajax({
        url:"<?=base_url('My_controller/addCashier')?>",
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
          cashierInfo()
          $('#add_username').val(null);
          $('#add_email').val(null);
          $('#add_password').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var ausername_error = error.username;
          var aemail_error = error.email;
          var apassword_error = error.password;
          //setvalue
          var setvalue_ausername = error.setusername;
          var setvalue_aemail = error.setemail;
          var setvalue_apassword = error.setpassword;
          //display_seterror
          $('#error_username').html(ausername_error);
          $('#error_email').html(aemail_error );
          $('#error_password').html(apassword_error);
          //display_setvalue
          $('#add_username').val(setvalue_ausername);
          $('#add_email').val(setvalue_aemail );
          $('#add_password').val(setvalue_apassword);
          //remove error in 5 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);

          }
          else if(error.validation ==false)
          {
            swal(
           'Success!',
           'You Add New Addmin!',
           'success'
           )
            $('#addmodal').modal('hide');
            $('#addmodal')[0].reset();
          }
        }
    });
}

function editCashier(){

var formData = new FormData($('#edit_admin')[0]);
$.ajax({
    url:"<?=base_url('My_controller/editCashier')?>",
    type:"POST",
    data:formData,
    processData: false,
    contentType: false,
    success:function(data){
      cashierInfo()
          $('#edit_username').val(null);
          $('#edit_email').val(null);
          $('#edit_password').val(null);
          var error = JSON.parse(data);
          if(error.validation ==true){
          //seterror
          var ausername_error = error.username;
          var aemail_error = error.email;
          var apassword_error = error.password;
          //setvalue
          var setvalue_ausername = error.setusername;
          var setvalue_aemail = error.setemail;
          var setvalue_apassword = error.setpassword;
          //display_seterror
          $('#error_editusername').html(ausername_error);
          $('#error_editemail').html(aemail_error );
          $('#error_editpassword').html(apassword_error);
          //display_setvalue
          $('#edit_username').val(setvalue_ausername);
          $('#edit_email').val(setvalue_aemail );
          $('#edit_password').val(setvalue_apassword);
          //remove error in 5 second
          setTimeout(()=>$('p').remove(),5000);
          setTimeout(()=>$('p').remove(),5000);

          }
          else if(error.validation ==false)
          {
            swal(
           'Success!',
           'Update Success!',
           'success'
           )
            $('#editmodal')[0].reset();
            $('#editmodal').modal('hide');
          }
          
    }
  });
}

function deleteCashier(id){
       var con = confirm("Are you sure do you want to delete!");
       if(con == true){
          $.ajax({
            url:"<?=base_url('My_controller/deleteCashier')?>",
            type:"POST",
            data: {id:id},
            success:function(data,status){
              cashierInfo()
            }
          });
       }
      
    }
</script>