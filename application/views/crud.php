<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Codeigniter Ajax Crud Tutorial</h1>
                <hr style="background-color: black; color: black; height: 1px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                    data-target="#exampleModal">
                    Add Records
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" value="" required>
                                        <span id ="error_name" class="alert-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="email" value="" required>
                                        <span id ="error_email" class="alert-danger"></span>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add()" class="btn btn-primary" id="add">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="update_form">
                                    <input type="hidden" id="edit_modal_id">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="edit_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="edit_email">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="update">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    $(document).ready(function(){
        displayRecord();
    });
    function displayRecord(){
        $.ajax({
           url:"<?=base_url('My_controller/display')?>",
           type:"POST",
           success:function(data){
               $('#StdInfo').html(data);
           }
        });
    }

    function add(){
      var name = $('#name').val();
      var email = $('#email').val();
     
      $.ajax({
          url:"<?=base_url('My_controller/adds')?>",
          type:"POST",
          data:
          {
             name:name,
             email:email
          },
          success:function(data,status){
            displayRecord();
            $('#name').val(null);
            $('#email').val(null);
            var error = JSON.parse(data);
            var name_error = error.name;
            var setname = error.setname;
            $('#error_name').html(name_error);
            $('#name').val(setname);
            var email_error = error.email;
            var setemail = error.setemail;
            $('#error_email').html(email_error);
            $('#email').val(setemail);
            setTimeout(()=>$('p').remove(),3000);
            setTimeout(()=>$('p').remove(),3000);
          }
      });

      
    }

    function getuser(id){

        $.post("<?=base_url('My_controller/getuser')?>",{
            id:id
        },function(data,status){
           var user = JSON.parse(data);
           $('#edit_name').val(user.name);
           $('#edit_email').val(user.email);
        });
        $('#editModal').modal('show');
    }

    function deleteid(id){
       var con = confirm("Are you sure do you want to delete!");
       if(con == true){
          $.ajax({
            url:"<?=base_url('My_controller/delete')?>",
            type:"POST",
            data: {id:id},
            success:function(data,status){
              displayRecord();
            }
          });
       }
      
    }
    

    </script>
</body>

</html>