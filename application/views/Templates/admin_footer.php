
<!-- jQuery -->
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
<script>
 const defaultBtn = document.querySelector("#btnH");
 const customBtn = document.querySelector("#btnC");
 const img = document.querySelector("#imageS");
 const dateM = document.querySelector('.dateM');
 const dateX = document.querySelector('.dateX');

 let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
 function submit()
 {
     defaultBtn.click();
 }
 defaultBtn.addEventListener("change", function(){
    const file = this.files[0];
      if(file){
        const reader = new FileReader();
        reader.onload = function(){
           const result = reader.result;
           img.src = result;
        }
        
        reader.readAsDataURL(file);
      }
  });
  dateM.addEventListener('change', (event)=>{
    dateX.value = event.target.value;
    
    $(function(){
    var dtToday = new Date(dateX.value);
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    $('.dateX').attr('min', maxDate);
     });
  });
</script>

<script>
  var cleave = new Cleave('.CPH', {
    phone: true,
    phoneRegionCode: 'PH'
 });
 $('c-selection').change(function(){
   cleave.setPhoneRegionCode(this.value);
   cleave.setRawValue('');
 }) 
</script>

<script>

    //  const img = document.querySelector("#imageS");
     const table = document.querySelector("#report") 
     var sumVal = 0;
     $(table).change(function(){
        for(var i = 1; i < table.rows.length; i++)
        {
          sumVal = sumVal + parseInt(table.rows[i].cells[5].innerHTML);
        }
        document.getElementById("total").innerHTML = sumVal;
         alert(sumVal);
         console.log("qwqwq");
     }) 
</script>
<script>
    $(document).ready(function(){
      displayCriticalStock();
    });
    
  function displayCriticalStock(){
    $('#stock').DataTable({
      destroy: true,
      ajax:"<?=base_url('My_controller/displayCriticalStock')?>",
      columns:[
          {data:"id"},
          {data:"pname"},
          {data:"stock"},
          {data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button><div class="dropdown-menu"> <a class="dropdown-item" onclick="getStdInfo('+item.id+')" href="" data-toggle="modal" data-target="#editmodal">EDIT</a> <a class="dropdown-item" href="#"  onclick="deleteStdInfo('+item.id+')">DELETE</a></div>' } }
      ]
    });
  }
 </script>
</body>
</html>
