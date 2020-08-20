@extends('backend.layouts.master')
    @section('title', 'catagory List')
   
    @section('content')
    <div class="container-fluid">
        <h4>Catagory List</h4>
        <ol class="breadcrumb no-bg m-b-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Catagory</a></li>
            <li class="breadcrumb-item active">Catagory List</li>
        </ol>
        <div class="box box-block bg-white">
            <div class="row">
            <div class="col-md-6">
                <h5 class="m-b-1 pull-xs-left">Export</h5>
             </div>
             <div class="col-md-6">
                <button type="button" class=" m-b-1 btn btn-success btn-circle waves-effect waves-light pull-xs-right"  data-toggle="modal" data-target="#modal">
                    <i class="ti-plus"></i>
                </button>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h6 class="modal-title" id="modalLabel">New Catagory Information</h6>
                                </div>
                                <form id="myform" action="javascript:void(0)">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Name:</label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Select Parent Catagory</label>
                                            <select name="parent_id" class="form-control" id="parent_id">
                                                <option value="" class="form-control">Primary Catagory</option>
                                                @foreach ($catagories as $catagory)
                                                    <option value="{{$catagory->id}}" class="form-control">{{$catagory->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="submit" value="0">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
             </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                        <tr>
                           <th data-priority="">Sl</th>
                           <th data-priority="">Name</th>
                           <th data-priority="">Child Catagory</th>
                           <th data-priority="">Action</th>
                           
                        </tr>
                     </thead>
                     <tbody>    </tbody>
                </table>
            </div>
        </div>
            </div>

    @endsection
    @section('script')
    {{-- @include ('backend.partials.js.datatables') --}}
    {{-- <script type="text/javascript" src="{{ asset('dashboard/html/js/index.js') }}"></script> --}}
    <script>
        var table= $('#table-2').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5','excelHtml5','csvHtml5','pdfHtml5',
                    {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                            }
                    },
                    'colvis',
                ],
                columnDefs: [ {
                    // targets: -1,
                    visible: false
                } ],
                processing:true,
                serverSide:true,
                ajax:"{!! route('catagory.synctable') !!}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'parent_catagory', name: 'parent_catagory' },
                    { data: 'action', name: 'action' }
                ]
            });
        $('#submit').click(function (e) {
               e.preventDefault();
               var id=$('#submit').val();
               console.log(id);
               $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   },
               });
               var data={
                   name:$('#name').val(),
                   parent_id:$('#parent_id').val(),
                   //numberOfClass:$('#numberOfClass').val(),
               };
               console.log(data);
               if (id>0) {
                   var url="{{url('/catagory/update')}}"+"/"+id;
               }else{
                   var url="{{url('/catagory/store')}}"
               }
               $.ajax({
                   method:"POST",
                   url: url,
                   data: data,
                   success:function (result) {
                       console.log(result);
                    if (result.error==false) {
                        $( "div").remove( ".text-danger" );
                            successNotification();
                            removeUpdateProperty("catagory");
                            document.getElementById("myform").reset();
                        }
                        if(result.error==true){
                            getError(result.message);
                        }
                },
                errors:function(xhr,errors, status){
                    console.log(status);
                }
                
            });

        });

        function btnEdit(id){
            setUpdateProperty(id, 'catagory');
            $.ajax({
                type:'GET',
                url:"/catagory/edit/"+id,
                datatype:JSON,
                success:function(result) {
                    $('#name').val(result.data.name);
                 }
            });
              
            //console.log(deleteAttribute().swal().isConfirm());
        }

    function btnDelete(id){
        console.log(id);
        swal({
             title: "Are you sure?",
             text: "You won't be able to recover this data!",
             type: "warning",
             showCancelButton: true,
             confirmButtonText: "Delete !",
             cancelButtonText: "No",
             closeOnConfirm: true,
             closeOnCancel: true,
            }).then(function(isConfirm) {
             if (isConfirm===true) {
               $.ajax({
                   url:"/catagory/destroy/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                       console.log(data)
                       table.draw();
                   }
               })


             } else {
                 swal("Cancelled", "Your data is safe !", "error");
             }
         });
            
            //console.log(deleteAttribute().swal().isConfirm());
        }
        
    </script>
    @endsection