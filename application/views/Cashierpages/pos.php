<html lang="en"><head>
<!-- CSS -->
<title>POS</title>

<link rel="shortcut icon" href="<<?=base_url('assets/images/logo.png')?>>" type="image/x-icon">
  <!-- Custom fonts for this template-->

  <link href="<?=base_url('assets1/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <!-- <link href="http://localhost/rios/assets/css/fonts-googleapis.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
<link href="<?=base_url('assets1/css/bootstrap.min.css')?>" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url('assets1/css/sb-admin-2.min.css')?>" rel="stylesheet">
<link href="<?=base_url('assets1/css/custom.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url('assets1/font-awesome/css/font-awesome.min.css')?>">
<!-- <link href="http://localhost/rios/assets/fontawesome-5.11.2/css/fontawesome.min.css?v=5.11.2" rel="stylesheet"> -->
<link href="<?=base_url('assets1/css/jquery.dataTables.min.css')?>" rel="stylesheet">
<link href="<?=base_url('assets1/css/select2.min.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url('assets1/css/style.min.css')?>">
<link href="<?=base_url('assets1/css/datepicker.css')?>" rel="stylesheet" id="bootstrap-css">


<!-- JS -->
<!-- <script src="http://localhost/rios/assets/js/jquery.min.js"></script> -->
<script src="<?=base_url('assets1/js/jquery-1.12.4.min.js')?>"></script>
<script src="<?=base_url('assets1/js/popper.min.js')?>"></script>
<!-- <script src="http://localhost/rios/assets/js/bootstrap.min.js"></script> -->
<link href="<?=base_url('assets1/css/bootstrap-toggle.min.css')?>" rel="stylesheet">

<script src="<?=base_url('assets1/js/jstree.min.js')?>"></script>

<script src="<?=base_url('assets1/jq_freeze/js/jquery.CongelarFilaColumna.js')?>"></script>

<style>
    #main_progress{
        display:none;
    }
    div#main_progress .progress-bar:before {
    content: '';
    position: absolute;
    height: 100%;
    top: 3px;
    width: 100%;
    background: #00000057;
    z-index: 999999;
}
.progress-bar{
  background-color:#fe680e !important
}
.loader-txt p {
     font-size: 13px;
     color: #666;
     text-align: center;
 }
 .loader-txt p small{
       font-size: 11.5px;
       color: #999;
 }
 #scroll-up{
   display:none
 }
 #dynamic_toast{
    position: fixed;
    top:5px;
    z-index: 9999;
    width: 20.2rem;
    right: 10px;
    display:none
    }
</style>
<style>#TLMvL{position:fixed;left:39.33%;z-index:20;background:black;color:white;font-weight:500;padding:3px 5px;margin:2px;bottom:0;border-radius:3px}@media (max-width: 600px){#TLMvL {left:0!important;width:99%}}</style></head>


<body id="page-top" class="sidebar-toggled">
<div id="main-body">
  <div class="progress" style="height: 3px;" id="main_progress">
    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<div class="modal" role="dialog" id="loader" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="mloader">
            <div class="loader"></div>
          </div>
      </div>
    </div>
  </div>
 <!-- Page Wrapper -->
 <div id="wrapper">
<a class="btn btn-danger btn-circle" id="scroll-up" href="javascript:void(0)" onclick="topFunction()"><i class="fa fa-arrow-up"></i></a>

   <style>
#accordionSidebar li,#accordionSidebar hr{
  display:none;
}
</style>

<!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="" style="height: 1089px;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/rios/">
  <div class="sidebar-brand-icon ">
    <!-- <i class="fas fa-laugh-wink"></i> -->
    <img src="<?=base_url('assets/images/logo1.1.png')?>" width="60px" heigth="60px" alt="">
  </div>
  <div class="sidebar-brand-text mx-3">TOKI|POS <sup></sup></div>
</a>

<!-- Divider -->


<!-- Nav Item - Dashboard -->


<!-- Divider -->


<!-- Heading -->
<!-- <div class="sidebar-heading">
  Maintenance
</div> -->

<!-- Nav Item - Pages Collapse Menu -->

<!-- Divider -->
<hr class="sidebar-divider" style="display: block;">
<li class="nav-item active " style="display: list-item;">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sales_collapse" aria-expanded="true" aria-controls="sales_collapse">
    <i class="fa fa-money"></i>
    <span>Sales</span>
  </a>
  <div id="sales_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item anc" href="http://localhost/rios/sales/pos">POS</a>
            <a class="collapse-item anc" href="http://localhost/rios/sales/order_list">Order List</a>
      <!-- <a class="collapse-item anc"  href="http://localhost/rios/products/product_type"></a> -->
        </div>
  </div>
</li>

<!-- Divider -->


<!-- Divider -->


<!-- <hr class="sidebar-divider admin_only">
<li class="nav-item  admin_only">
  <a class="nav-link anc"  href="http://localhost/rios/admin/delivery_list">
    <i class="fa fa-fw fa-send"></i>
    <span>Delivery List</span></a>
</li> -->





<!-- Divider -->
<hr class="sidebar-divider" style="display: block;">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
<script>
  $(document).ready(function(){
    $('.anc').each(function(){
      $(this).click(function(e){
        e.prevenDefault();
        location.replace($(this).attr('href'));
      })
    })

   
  })
</script>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

          <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="main_nav">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form> -->

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Nav Item - Alerts -->
  

  <!-- Nav Item - Messages -->
  

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cashier Side</span>
      <div class="btn btn-circle btn-sm btn-primary"><i class="fa fa-user"></i></div>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="javascript:void(0)" id="manage_account">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Account
      </a>
                <!-- <a class="dropdown-item" href="#">
        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
        Activity Log
      </a> -->
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="http://localhost/rios/login/logout">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>

</ul>

</nav>

<!-- End of Topbar -->

<div id="" class="msg_notif_clone" style="display:none">
    <a class="dropdown-item d-flex align-items-center msg_notif" href="javascript:void(0)">
        <div class="dropdown-list-image mr-3">
          <span class="btn btn-circle btn-primary"><i class="fas fa-envelope fa-fw"></i></span>
          <!-- <div class="status-indicator bg-success"></div> -->
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate user"></div>
          <div class="text-truncate text-gray-600 msg"></div>
          <div class="small text-gray-500 datetime"></div>
        </div>
      </a>
</div>

<div id="oo_alert_clone" style="display:none">
      <a class="dropdown-item d-flex align-items-center oo_alert" href="javascript:void(0)">
        <div class="mr-3">
          <div class="icon-circle bg-primary">
            <i class="fas fa-bell text-white alert-icon"></i>
          </div>
        </div>
        <div>
        
          <div class="small text-gray-500 datetime">December 12, 2019</div>
          <span class="font-weight-bold msg">A new monthly report is ready to download!</span>
        </div>
      </a>
</div>

<style>
.oo_alert.active,.msg_notif.active {
    background: #718fe6;
}
.oo_alert.active .datetime,.oo_alert.active .msg {
    color: white;
}
</style>


        <!-- Begin Page Content -->
        <div class="container-fluid page-title-field" id="main-viewer" style="height: 989px;">

          <!-- Page Heading -->
                    <!-- Content Row -->
          <div class="row">
            <form action="" id="order_frm">
<div class="col-lg-12">
    <div class="row">
        <div class="col-md-1 text-right"><label for="otype" class="control-label">Order Type</label></div>
        <div class="col-md-2">
        <input type="hidden" name="save_as" value="">
        <input type="hidden" name="amount_tendered" value="0">
            <select name="order_type" id="otype" required="" class="form-control">
                <option value="1" selected="">Dine-in</option>
                <option value="2">Take out</option>
                <option value="3">Delivery</option>
                <option value="4">Pick-up</option>
            </select>
        </div>
        <div class="col-md-1 text-right loc_field" style="display: none;"><label for="loc" class="control-label">Location</label></div>
        <div class="col-md-3 loc_field" style="display: none;">
        <textarea name="location" id="loc" cols="30" rows="2" required="" class="form-control"></textarea>

    
    </div>
        
    </div>
    <div class="row" style="" id="pg-field">

    </div>
    <br>
    
    <div class="row">
        <div class="col-md-5">
            <div class="card card-default" style="height:calc(100%)">
                <div class="card-body" style="position:relative">
                    <b>
                        <h5>Order/s</h5>
                    </b> 
                <div id="order_field">
                    <table class="table table-condensed table-striped" id="orders_tbl">
                    <colgroup>
                        <col width="5%">
                        <col width="35%">
                        <col width="10%">
                        <col width="20%">
                        <col width="30%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
                <div id="gtotal_field">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                         <tr>
                            <th width="35%" style="background: #50525e " class="text-white"><b>Total</b> <input type="hidden" name="gTotal" val="0.00" value="0.00"></th>
                            <th width="65%" style="background: #50525e" class="text-right text-white" id="gTotal">0.00</th>
                         </tr>
                        </thead>
                    </table>
          <div class="col-md-5 ">
          <!-- <button type="button" class="btn btn-sm btn-dark submit_btns" style="margin:0 5px" onclick="submit_frm(1)" id="save_btn">Save</button>  -->
          <button type="button" class=" btn btn-sm btn-dark submit_btns" style="margin:0 5px" onclick="submit_frm(2)">Pay</button>
            
        </div>
                </div>
                </div>
                </div>   
            </div>
        </div>
        <div class="col-md-7 card card-default bg-white">
            <div class="row card-body">
                <div class="col-sm-12" id="product_holder">
                 <div class="row">
                     <div class="div col-md-12" id="list_holder">
          
                    </div>
                 </div>
                </div>
                
                <!-- <div class="col-sm-4" id="pg-holder">
                    <div class="row" style="margin:0">
                        <div class="col-md-12" style="display:contents" id="pg-field1">
                       
                    </div>
                    </div>
                </div> -->
            </div>
            
        </div>
    </div>
</div>
</form>

<div class="modal" role="dialog" id="pay_modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group row">
        <div class="col-md-4">
            <label for="" class="control-label">Amount to Pay</label>
        </div>
        <div class="col-md-8 text-right" id="amount_to_pay">
        0.00
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
            <label for="" class="control-label">Amount Tendered</label>
        </div>
        <div class="col-md-8 text-right">
            <input type="text" class="form-control text-right number" step="any" id="a_rendered" placeholder="0.00">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-4">
            <label for="" class="control-label">Change</label>
        </div>
        <div class="col-md-8 text-right" id="amount_change">
        0.00
        </div>
      </div>
    </div>
       
      <div class="modal-footer">
        <button type="button" onclick="pay_now()" class="btn btn-primary" id="pay_mdl_btn">Pay</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" role="dialog" id="queue_modal" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title">Queue Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
      <div class="form-group row">
        <div class="col-md-4">
            <h4><b>OrderNo:</b></h4>
        </div>
        <div class="col-md-8">
            <b><h4 id="ref_field"></h4></b>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-8">
            <b><h5 id="queue_field"></h5></b>
        </div>
      </div>
       
      <div class="modal-footer">
        <button type="button" id="print_receipt" class="btn btn-success" data-id=""><i class="fa fa-print"></i> Print Receipt</button>
        <button type="button" onclick="location.reload()" class="btn btn-primary">New Order</button>
      </div>
    </div>
  </div>
</div>

<div id="card_holder_clone" style="display: none">
	<div class="card-data px-1" style="width: 50%">
         <div class="card mb-3 text-dark bg-gradient-white">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="card-img-top" src="" alt="Card image cap" style="height:6vw;object-fit: cover">
                    <div class="price-field"></div>
                    <div class="avail-status" style="top:4.5vw"></div>
                </div>
                <div class="col-md-8 border-left">
                    <div class="card-body " style="color:black !important">
                       <p class="card-title"> </p>
                       <!-- <p class="card-text"></p> -->
                       <div class="pull-right">
                       </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
<style>
div#product_holder {
    height: 30vw;
    overflow: auto;
}
div#pg-holder {
    border-left: 1px solid white;
}
.card .price-field {
    position: absolute;
    background: #dc354585;
    border-radius: 5px;
    padding: 0px 5px;
    right: 2%;
    top: 1%;
    font-weight: 600;
    color: #000000fc;
}
 .card-data{
        float:left;
        cursor:pointer;
    }
    #list_holder{
        display:contents;
    }
.pg-btns {
    margin: 4px 4px;
    }
    div#gtotal_field {
    position: absolute;
    width: 90%;
    bottom: 12px;
}
div#order_field {
    height: 27vw;
    overflow: auto;
}
.loc_field{
    display:none;
}
#order_frm{
    width:100%
}
.card-data .card-body {
    padding: .3rem;
}
/* @media (min-height: 960px){
    div#order_field {
    height: 48rem;
    overflow: auto;
    }

    div#product_holder {
    height: 48rem;
    overflow: auto;
} */


}
@media (min-height: 760px){
    div#order_field {
    height: 30rem;
    overflow: auto;
    }

    div#product_holder {
    height: 30rem;
    overflow: auto;
}

}
</style>
       </div>
          <!-- End of Content Row -->

          </div>
          <!-- Begin Page Content -->

        </div>
      <!-- End of Main Content -->

      </div>
    <!-- End of Content Wrapper -->


  <!-- Toast -->
  <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" id="dynamic_toast">
  
  <div class="toast-body badge-success badge-type">
    <span class="mr-2"><i class="fa fa-check badge-success badge-type icon-place"></i></span>
    <span class="msg-field"></span>
  </div>
</div>
<!-- toast -->

<!-- Universal Modal  -->
<div class="modal" role="dialog" id="universal_modal" backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mloader">
          <div class="loader"></div>
          <div class="loader-txt"><p><small>Loading ...</small></p></div>
        </div>
        <div id="body-content"></div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
    </div>
  </div>
</div>
<!-- Universal Modal  -->
  <!-- Modals -->
  <div class="modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submit" onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  </div>
  <!-- End of Page Wrapper -->

<!-- modal Script -->


<script src="<?=base_url('assets1/js/jstreetable.js')?>"></script> 
<script src="<?=base_url('assets1/js/select2.min.js')?>"></script>
<script src="<?=base_url('assets1/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets1/js/bootstrap-toggle.min.js')?>"></script>
<!-- <script src="http://localhost/rios/assets/js/popper.min.js"></script> -->
<script src="<?=base_url('assets1/fontawesome-5.11.2/js/fontawesome.min.js?v=5.11.2')?>"></script>
<script src="<?=base_url('assets1/js/freeze-table.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets1/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets1/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets1/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets1/vendor/chart.js/Chart.min.js')?>"></script>
  <script>
   window.Dtoast = ($message='',type='success')=>{
    // console.log('toast');
    $('#dynamic_toast .msg-field').html($message);
    if(type == 'info'){
      var badge = 'badge-info';
      var ico = 'fa-info';
    }else if(type == 'success'){
      var badge = 'badge-success';
      var ico = 'fa-check';
    }else  if(type == 'error'){
      var badge = 'badge-danger';
      var ico = 'fa-exclamation-triangle';
    }else  if(type == 'warning'){
      var badge = 'badge-warning';
      var ico = 'fa-exclamation-triangle';
    }
    $("#dynamic_toast .badge-type").removeClass('badge-success')
    $("#dynamic_toast .badge-type").removeClass('badge-warning')
    $("#dynamic_toast .badge-type").removeClass('badge-danger')
    $("#dynamic_toast .badge-type").removeClass('badge-info')

    $("#dynamic_toast .icon-place").removeClass('fa-check')
    $("#dynamic_toast .icon-place").removeClass('fa-info')
    $("#dynamic_toast .icon-place").removeClass('fa-exclamation-triangle')
    $("#dynamic_toast .icon-place").removeClass('fa-exclamation-triangle')

    $('#dynamic_toast .badge-type').addClass(badge)
    $('#dynamic_toast .icon-place').addClass(ico)

    
    $('#dynamic_toast .msg-field').html($message)
    // $('#dynamic_toast').show()
    $('#dynamic_toast').toast({delay:1500}).toast('show');
  }
  $(document).ready(function(){
    $('.toast').each(function(){
      $(this).on('hidden.bs.toast', function () {
        $(this).hide()
      })
      $(this).on('show.bs.toast, shown.bs.toast', function () {
        $(this).show()
      })
   })
  })
</script>
<script>
 
$(document).ready(function(){
  $('#print_receipt').click(function(){
            var nw = window.open("<?=base_url('My_controller/printReceipt/')?>"+$(this).attr('data-id'),"_blank","width=900,height=700")
            // console.log(nw)
            if(nw.document.readyState === 'complete'){
                  start_loader()
                    nw.print()
                    setTimeout(function(){
                    nw.close()
                        end_loader()
                    },750)
            }
          
   })
    load_cards()
    load_pg();
});

    window.card_data = function(){
        $('.card-data').each(function(){
            $(this).click(function(){
                // console.log($('#orders_tbl').find('.order-row[id="'+$(this).attr('data-id')+'"]').length )
                if($('#orders_tbl').find('.order-row[id="'+$(this).attr('data-id')+'"]').length > 0){
                Dtoast("Product is already on the list");
                return false;
                }

                html = '';
                html += '<tr class="order-row" id="'+$(this).attr('data-id')+'">';
                html += '<td><center><a href="javascript:void(0)" onclick="rem_prod('+$(this).attr('data-id')+')"><i class="fa fa-times" style="color:red"></i></a></center></td>'
                html += '<td>'+$(this).attr('data-name')+'<input type="hidden" name="pid[]" value="'+$(this).attr('data-id')+'"></td>'
                html += '<td><input class="qty text-right" type="number" name="qty[]" value="1" style="width:50px" required></td>'
                html += '<td class="text-right"><input class="price" type="hidden" name="price[]" value="'+$(this).attr('data-price')+'" required>'+$(this).attr('data-price')+'</td>'
                html += '<td class="text-right"><input class="t_price" type="hidden" name="tprice[]" value="'+$(this).attr('data-price')+'" required><p  class="t_price">'+$(this).attr('data-price')+'</p></td>'
                html += '</tr>';
                $('#orders_tbl tbody').prepend(html)
                // console.log(html)
                compute_totals();
                $('.qty').on('click',function(){
                    $(this).select()
                })
            })
            

        })
    }

  window.load_cards = function($id = 'all',status='1'){
        $('#list_holder').html('<div class="text-center text-white w-100"><i>Please wait...</i></div>')
        $.ajax({
            url:'<?=base_url('My_controller/get_products')?>',
            method:'POST',
            data:{id:$id,status:status},
            error:(err)=>{
                console.log(err)
            },
            success:function(resp){
                if(resp){
                    $('#list_holder').html('')
					var data = JSON.parse(resp);
					// console.log(data)
                    if(data.length <= 0 ){
                    $('#list_holder').html('<div class="text-center text-white w-100"><i>No Data...</i></div>')
                    }
					data.map(row=>{
						html = $('#card_holder_clone .card-data').clone();
						html.find('.card-title').html(row.pname);
						html.find('.price-field').html('&#8369; '+(parseFloat(row.price).toLocaleString('en-US',{style:'decimal','maximumFractionDigits' : 2})));
                        if(row.stock != 0)
                        html.find('.avail-status').html('<span class="badge badge-success">Available</span>');
                        else
                        html.find('.avail-status').html('<span class="badge badge-danger">Not Available</span>');

						html.find('.card-title').html(row.pname);
                        html.attr({'data-name':row.pname,'data-id':row.id,'data-price':(parseFloat(row.price).toLocaleString('en-US',{style:'decimal','maximumFractionDigits' : 2}))});
						// html.find('.card-text').html(row.description);
						if(row.picture == '')
							row.picture = 'uploads/products/logo.jpg'
						html.find('.card-img-top').attr('src','<?=base_url('assets/images/product/')?>'+row.picture)
						$('#list_holder').append(html)
                        
					})
                    card_data();
                   
                }

                
                
            }
            
        })
    }
    window.rem_prod = function(pid){
        $('.order-row[id="'+pid+'"]').remove()
        compute_totals();
    }

    window.compute_totals = function(){
        $('.order-row').each(function(){
            var _this = $(this)
            $(this).find('.qty').on('change keyup',function(){
                var qty = $(this).val();
                var price = _this.find('.price').val()
                
                price = price.replace(/,/g,'')
                price = parseFloat(price);
                var total_price = parseFloat(qty * price).toLocaleString('en-US',{style:'decimal','maximumFractionDigits' : 2})
                // console.log(price,qty)
                _this.find('input.t_price').val(total_price)
                _this.find('p.t_price').html(total_price)
                compute_totals()
            })
        })

        var _total = 0;
        $('.order-row').find('p.t_price').each(function(){
            var p = $(this).html()
            p = p.replace(/,/g,'')
            p = parseFloat(p)
            _total += p;
        })
       _total = parseFloat(_total).toLocaleString('en-US',{style:'decimal','maximumFractionDigits' : 2,'minimumFractionDigits' : 2})
        $('#gTotal').html(_total)
        $('[name="gTotal"]').val(_total)

    }


  window.load_pg = function(status= 1){
        $.ajax({
            url:'<?php echo base_url().'My_controller/load_pg' ?>',
            type:'POST',
            data:{status: status},
            error:(err)=>{
                console.log(err)
            },
            success:(resp)=>{
                if(resp){
                    var data = JSON.parse(resp)
                    $('#pg-field').html('<button class="btn btn-dark pg-btns pull-left" data-id="all">All</button>')
                    if(typeof data != undefined && Object.keys(data).length > 0){
                        data.map(row=>{
                            $('#pg-field').append('<button type="button" class="btn btn-dark pg-btns pull-left" data-id="'+row.id+'">'+row.menu_type+'</button>')
                        })
                    }
                    $('.pg-btns').each(function(){
                        $(this).click(function(){
                            $('.pg-btns.btn-info').removeClass('btn-info').addClass('btn-dark');
                            $(this).removeClass('btn-primary').addClass('btn-info');
                            load_cards($(this).attr('data-id'));
                        })
                    })
                }
            }
        })
  }

  window.pay_now = function(){
        $('[name="amount_tendered"').val(0)
        if($('#a_rendered').val() <= 0){
            Dtoast('Please enter amount rendered');
            return false;
        }
        // console.log($('#amount_change').html() <= -1)
        var change = $('#amount_change').html().replace(/,/g,'')
        change = parseFloat(change)
        if(change <= -1){
            Dtoast('Amount to pay is greater than rendered.','error');
            return false;
        }
        var tendered = $('#a_rendered').val()
        if(tendered <= 0)
        tendered = 0;
        $('[name="amount_tendered"').val(tendered)
        $('#order_frm').submit()
  }

  window.submit_frm =function(type){
        if($('#orders_tbl').find('.order-row').length <= 0 ){
               Dtoast('Order list is empty','error');
               return false;
           }
        $('[name="save_as"]').val(type);
        // $('#order_frm').submit()
        if(type == 2){
            $('#amount_to_pay').html($('#gTotal').html())
            $('#amount_change').html('0.00')
            $('#a_rendered').val('')
            $('#pay_modal').modal('show')
            setTimeout(function(){
                $('#a_rendered').focus();
            },750)
        }else{
            $('.submit_btns').attr('disabled',true);
            $('#save_btn').html('Please wait ...')
            $('#order_frm').submit()
        }
  }
    
  $('#otype').change(function(){
        if($(this).val() == 3)
        $('.loc_field').show();
        else
        $('.loc_field').hide();
    })
    
    $('#a_rendered').on('keyup keypress',function(e){
        if(e.which == 13){
            pay_now();
            return false;
        }
        var rendered = $(this).val();
            rendered = rendered.replace(/,/g,'')
        var amount = $('#amount_to_pay').html().replace(/,/g,'');
        amount = parseFloat(amount);
        var change = parseFloat(rendered) - amount;
        if(!isNaN(change)){
            $('#amount_change').html(parseFloat(change).toLocaleString('en-US',{style:'decimal','maximumFractionDigits' : 2,'minimumFractionDigits' : 2}))
        }else{
            $('#amount_change').html('0.00') 
        }
    })


    $('#order_frm').submit(function(e){
            e.preventDefault();
            if($('[name="save_as"]').val() == '')
            return false;

           if($('#orders_tbl').find('.order-row').length <= 0 ){
               Dtoast('Order list is empty');
               return false;
           }
        //    console.log('submitted')
        start_loader()
        $.ajax({
            url:'<?=base_url('My_controller/orderSave')?>',
            method:'POST',
            data:$(this).serialize(),
            error:(err)=>{
                console.log(err)
                Dtoast('An error occured','error')
                 end_loader()
            $('#save_btn').html('save')
            },
            success:(resp)=>{
                if(resp){
                    var data = JSON.parse(resp);
                        Dtoast('Order successfully placed');
                        $('#pay_mdl_btn').removeAttr('disabled').html('Pay');
                        $('.modal').modal('hide');
                        $('#print_receipt').attr('data-id',data);
                        $('#print_receipt').show();
                        $('#ref_field').html('<b>'+data+'</b>');
                        // $('#queue_field').html(data.queue)
                        $('#queue_modal').modal('show');
                        end_loader();
    
                }else{
                    Dtoast('An error occured','error');
                    $('#pay_mdl_btn').removeAttr('disabled').html('Pay');
                    end_loader()
                }
          }
      })
            
    })

    function start_loader($progress){
      $('#main_progress').css({display:'flex'});
      var progress = 10;
      var function_int = setInterval(()=>{
       $('#main_progress .progress-bar').css({width:+progress+'%'})
        progress += 10;
        if(progress == 90){
          clearInterval(function_int);
        }
      },2500) 
    }

    function end_loader(){
      $('#main_progress').hide();
    }
    
</script>




</div>
</div>
</body>
</html>