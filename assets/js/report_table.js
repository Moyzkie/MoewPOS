// var minDate,maxDate;

// $.fn.dataTable.ext.search.push(
//     function( settings, data, dataIndex ) {
//         var min = minDate.val();
//         var max = maxDate.val();
//         var date = new Date( data[4] );
 
//         if (
//             ( min === null && max === null ) ||
//             ( min === null && date <= max ) ||
//             ( min <= date   && max === null ) ||
//             ( min <= date   && date <= max )
//         ) {
//             return true;
//         }
//         return false;
//     }
// );

// $(document).ready(function() {
//     // Create date inputs
//     minDate = new DateTime($('3/19/2021'), {
//         format: 'MMMM Do YYYY'
//     });
//     maxDate = new DateTime($('3/19/2021'), {
//         format: 'MMMM Do YYYY'
//     });
 
//     // DataTables initialisation
//     var table = $('#report').DataTable();
 
//     // Refilter the table
//     $('#min, #max').on('change', function () {
//         table.draw();
//     });
// });


// $(function () {
//     $("#report").DataTable({
//       "order": [[ 0, "desc" ]],
//       dom: 'Bfrtip',
//       buttons: [
         
//           {
//             extend: 'print',
//             className: "btn-outline-secondary",
//             text: 'Print  <i class="fas fa-print"></i>',
            
//           }

//         ],
       
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//     });
//   });

