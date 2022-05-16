$(document).ready(function(){
    $(document).on('click','.editbtn',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#e_id').val(data[1]);
    $('#e_name').val(data[2]);
    $('#e_stock').val(data[3].split(' ',1));
    $('#e_price').val(data[4].split(' ',1));
    $('#e_date').val(data[5]);
    $('#e_date_exp').val(data[6]);
    $('#e_category').val(data[8]);
    $('#e_supplier').val(data[9]);
    });
  
    $(document).on('click','.editstaff',function(){
   
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      $("#image2").attr("src","<?=base_url('assets/images/staff/')?>"+data[10]);
      $('#staf_name').val(data[2]);
      $('#staf_gender').val(data[3]);
      $('#staf_age').val(data[4]);
      $('#staf_address').val(data[5]);
      $('#staf_contact').val(data[6]);
      $('#staf_email').val(data[7]);
      $('#staf_pass').val(data[8]);
      $('#staf_code').val(data[9]);
      });
    

    $(document).on('click','.editmenu',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#mid').val(data[0]);
    $('#mname').val(data[1]);
    });

    $(document).on('click','.editsupplier',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#s_id').val(data[0]);
    $('#s_name').val(data[1]);
    });

    $(document).on('click','.addbtn',function(){
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      $('#sid').val(data[0]);
      $('#sstock').val(data[1]);
      });

  });
