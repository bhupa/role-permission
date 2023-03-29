
@extends('backend.layout.app')

@section('content')
   <div class="content-wrapper">
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-tables" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>SN.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>SN.no</th>
                     <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
     <div class="modal fade show" id="add-role-model" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Role </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Role 

                            </label>
                            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                               @foreach($roles as $key => $role)
                                <option value="{{$role->id}}">{{ $role->name}}</option>
                               @endforeach
                                
                            
                            </select>
                            <input type="hidden" name="id" id="userId" />
                        </div>
                       
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addRoles">Save changes</button>
                    </div>
                </div>

            </div>

        </div>
    <!-- /.content -->
  </div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        var baseUrl = "{{url('/')}}"
       
        $('#data-tables').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{url('admin/users')}}",
            orderable: true
            , columns: [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                },
                 {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }
                , {
                    data: 'username'
                    , name: 'username'
                },

                {
                    data: 'role'
                    , name: 'role'
                }
                , {
                    data: 'action'
                    , name: 'action'
                },

            ]
        });
        $('.select2').select2({
        templateSelection: function(selected, options) {
            if (selected.id !== '') {
            return $('<span style="color: red;">' + selected.text + '</span>');
            }
            return selected.text;
        }
     })
      

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

           $("body").on('click', '.add-roles', function(event) {
            let el = event.target;
            let id = el.getAttribute('data-id');
            let roles = el.getAttribute('data-roles');
            console.log(roles);
            $('#userId').val(id);
            var myArray = roles.replace(/\[|\]/g, '').split(',').map(function(item) {
            return parseInt(item.trim());
            });
             $('.select2').val(myArray).trigger('change');
            $("#add-role-model").modal("show");
        })
          $("body").on('click', '#addRoles', function(event) {

            var rolesId = $(".select2").val();
            console.log(rolesId);

            var id = $('#userId').val();

            if (rolesId == '') {
                alert('Please select the Role');
                return false;
            }
            $.ajax({
                url: "add-roles"
                , type: "POST"
                , data: {
                    "_token": "{{ csrf_token() }}"
                    , id: id
                    , roles: rolesId,

                }
                , success: function(response) {
                    $("#add-role-model").modal("hide");
                     $('#data-tables').DataTable().draw();
                }
                , error: function(response) {

                }
            , });
        });

       
    })

</script>

@endsection