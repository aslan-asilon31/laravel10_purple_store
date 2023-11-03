@extends('../layouts/backend_layout')

@section('title','User Page')

@section('content')
<div class="col-lg-12 stretch-card">

    <div class="card">
      <div class="card-body">
        <button type="button" class="btn btn-gradient-primary btn-fw collapsible" style="width: 100%">Advanced Search</button>
        <div class="content" style="display: none; padding:20px; background-color:indigo;" >
            <div class="row">
                <div class="col-6" style="margin-top:10px">
                    <input type="text" name="name" class="form-control searchName" placeholder="Search for Name Only...">
                </div>
                <div class="col-6" style="margin-top:10px">
                    <input type="text" name="email" class="form-control searchEmail" placeholder="Search for Email Only...">
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-top:10px">
                    <input type="text" name="role_id" class="form-control searchRoleId" placeholder="Search for Role Only...">
                </div>
                <div class="col-6" style="margin-top: 10px">
                    <select name="status" class="form-select searchStatus">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('users.list') }}",
                data: function (d) {
                    d.name = $('.searchName').val(),
                    d.email = $('.searchEmail').val(),
                    d.role_id = $('.searchRole').val(),
                    d.status = $('.searchStatus').val(),
                    d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role_id', name: 'role_id'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: false
            },
        ]
    });

    $(".searchName").keyup(function(){
        table.draw();
    });

    $(".searchEmail").keyup(function(){
        table.draw();
    });

    $(".searchRoleId").keyup(function(){
        table.draw();
    });

    $(".searchStatus").keyup(function(){
        table.draw();
    });

    
  });
</script>

{{-- //collapse --}}
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
</script>
    
@endpush