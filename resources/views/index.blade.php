<!DOCTYPE html>
<html>
<head>
	<title>index page</title>

<!-- bootstrap cdn -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
<!-- bootstrap cdn -->


<!-- toast cdn -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">  -->
<!-- toast cdn -->



 


<!-- ------ -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css
">
<link href="https://datatables.yajrabox.com/css/app.css" rel="stylesheet">
<link href="https://datatables.yajrabox.com/css/demo.css" rel="stylesheet">
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
type='text/css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'
type='text/css'>
<link rel="stylesheet" href="https://datatables.yajrabox.com/highlight/styles/zenburn.css">
<script src="https://datatables.yajrabox.com/highlight/highlight.pack.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- ------ -->




</head>
<body>

<div class="container">
	<div class="card-header">
		<h3 class="text-center">Laravel Crud using Ajax and DataTables</h3>
	</div>
	<div class="card-body">
		<button class="btn btn-primary" id="addNew">Add New</button>
		<table id="users-table" class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>City</th>
          <th>Create</th>
          <th>Update</th>
          <th>Action</th>
        </tr>
    </thead>
			
		</table>	
	</div>
</div>











<!--Add Modal Start-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addForm">
          <span class="text-danger" id="errorMessage"></span>
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" id="token" value='{{csrf_field()}}'>
            <input type="text" id="name" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" id="city" id="city" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!--Add Modal End -->


<!--Edit Modal Start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateForm">
          <span class="text-danger" id="editErrorMessage"></span>
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" id="editToken" value='{{csrf_field()}}'>
            <input type="hidden" id="editId" >
            <input type="text" id="editName" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" id="editCity" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Update</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!--Edit Modal End -->


<!-- Delete Modal -->
<div class="modal fade" tabindex="-1" id="deletemodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Modal</h4>
      </div>
      <div class="modal-body">
        <h4>Are you Sure to Delete <span id="deleteName" class="text-primary" id="deleteName"></span>?</h4>
          <div class="form-group pull-right">
          <button type="close" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="button" id="deleteBtn" class="btn btn-success">Delete</button>
           </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div><
<!-- Delete Modal -->




<!-- datatables cdn -->

<!-- datatables cdn -->



<!-- jquery cdn -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- jquery cdn -->

<!-- bootstrap cdn -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
<!-- bootstrap cdn -->


<!-- toast cdn -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script> -->
<!-- toast cdn -->


<!-- ........ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script> -->
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<!-- <script src="https://datatables.yajrabox.com/js/handlebars.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<!-- ........ -->




</body>
</html>




<script>


  // Add Ajax 
  $(document).ready(function(){
//DataTables start
    oTable=$('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: 'http://localhost/AjaxCrud/getData',
      columns:[
      {data: 'id'},
      {data: 'name'},
      {data: 'city'},
      {data: 'created_at'},
      {data:  'updated_at'},
      {data: 'action', orderable: false, searchable: false}

      ]
    });
//DataTables End


    // Add Ajax start
    $('#addNew').on('click',function(){
      $('#addModal').modal('show');
      $('#errorMessage').hide();
    });

    $('#addForm').on('submit',function(e){
        e.preventDefault();
        var name = $('#name').val();
        var city = $('#city').val();
        var token = $('#token').val();
        $.ajax({
          type:"post",
          url:"saveData",
          data:{
            name:name,
            city:city,
            _token:token,
          },
          success:function(res)
          {
             if(res=="200")
             {
               $('#name').val("");
               $('#city').val("");
               $('#errorMessage').hide();
               toastr.success(name, "Successfully Added");
                oTable.draw(true);


             }
             else
             {
              $('#errorMessage').show();
              $('#errorMessage').html(res);
             }

          },
          error:function(error)
          {
            console.log(error);
          }
        });

    });
    // Add Ajax End

//Start Edit
    $(document).on('click','.edit',function(){
      var id = $(this).attr("id");
        $.ajax({
          type:"GET",
          url:"editData/"+id,
          success:function(res)
          {
            if(res == "404")
              alert(res+", Not Found");
            else{
              $('#editModal').modal('show');
              $('#editId').val(res.id);
              $('#editName').val(res.name);
              $('#editCity').val(res.city);
          }

          },
          error:function(error)
          {
            console.log(error);
          }

        });
    });
//End Edit


// Update Start
    $("#updateForm").on('submit', function(e){
      e.preventDefault();
      var id =$("#editId").val();
      var name =$("#editName").val();
      var city =$("#editCity").val();
      var token=$('#editToken').val();
      $.ajax({
        url:"updateData/"+id,
        type:"POST",
        data:{
          name:name,
          city:city,
          _token:token,
        },
        success:function(response){
          if(response == "200"){
             toastr.info("Updated Successfully");
             $("#editModal").modal("hide");

            oTable.draw(true);
          }
          else if(response == "404"){
            alert(response, "Not Found");
          }
          else{
            $("#editErrorMessage").show();
            $("#editErrorMessage").html(response);
            
          }
         
        },
        error:function(error){
          console.log(error);
        }
      });

    });
// Update End



  $(document).on('click', '.delete', function() {
      var id=$(this).attr("id");
      $("#deletemodal").modal('show');
       $("#deletemodal #deleteBtn").attr("itemId", id);

      var s = $(this).parent().parent().children().eq(1).html();
      $("#deleteName").text(s);

    });

    $(document).on('click', "#deleteBtn", function(){
      var id = $(this).attr("itemId");
      $(this).removeAttr('itemId');
      $.ajax({
        url:"deleteData/"+id,
        type:"get",
        success:function(data){
          toastr.warning("Student Deleted Successfully");
          $("#deletemodal").modal("hide");
          oTable.draw(true);    
        },
        error:function(error){
          console.log(error);
        }

      });
    });
      
// Delete End





  });
</script>