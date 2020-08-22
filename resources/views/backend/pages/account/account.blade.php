@extends('backend.layouts.master')
    @section('title', 'Account List')
   
    @section('content')
    <div class="container-fluid">
        <h4>Account List</h4>
        <ol class="breadcrumb no-bg m-b-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Account</a></li>
            <li class="breadcrumb-item active">Account List</li>
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
                                    <h6 class="modal-title" id="modalLabel">New Account Informationn</h6>
                                </div>
                                {{-- <form id="myform" class="" method="post" action="{{ route('supplier.store') }}"> --}}
                                    <form id="myform" action="javascript:void(0)">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h6>Account Information</h6>
                                                <hr>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Account Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="message-text" class="form-control-label">Account Holder Name</label>
                                                    <input type="text" class="form-control" id="holder_name" name="holder_name" value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="message-text" class="form-control-label">Account Number</label>
                                                    <input type="text" class="form-control" id="account_number" name="account_number" value="">
                                                </div>
                                            </div>
        
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">Debit</label>
                                                    <input type="text" name="debit" class="form-control" id="debit" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="Designation" class="form-control-label">Credit</label>
                                                    <input type="text" class="form-control" name="credit" id="credit" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2" class="form-control-label">Asset</label>
                                                    <input type="email" class="form-control" name="asset" id="asset" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submit" value="0">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="hidden=true">
                    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h6 class="modal-title" id="modalLabel">Update Contact Informationn</h6>
                                </div>
                                {{-- <form id="myform" class="" method="post" action="{{ route('supplier.store') }}"> --}}
                                    <form id="myformContact" action="javascript:void(0)">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h6>Official Information</h6>
                                                <hr>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Official Name:</label>
                                                    <input type="text" class="form-control" id="official_name2" name="official_name2" value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="message-text" class="form-control-label">Country:</label>
                                                    <input type="text" class="form-control" id="country2" name="country2" value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="message-text" class="form-control-label">official Address:</label>
                                                    <textarea class="form-control" name="official_name2" id="official_address2" placeholder="official address,postal code etc.."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Contact Person Information</h6>
                                                <hr>
                                            </div>
                                            
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="name2" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="Designation" class="form-control-label">Designation</label>
                                                    <input type="text" class="form-control" name="designation" id="designation2" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2" class="form-control-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email2" placeholder="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-control-label">Phone Number</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile2" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submitContact" value="0">Submit</button>
                                    </div>
                                </form>
                            </div>
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
                           <th data-priority="">Account Name</th>
                           <th data-priority="">Account Holder</th>
                           <th data-priority="">Account Number/ID</th>
                           <th data-priority="">Debit</th>
                           <th data-priority="">Credit</th>
                           <th data-priority="">Asset</th>
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
        dataDismiss();
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
                ajax:"{!! route('account.synctable') !!}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'holder_name', name: 'holder_name' },
                    { data: 'account_number', name: 'account_number'},
                    { data: 'debit', name: 'debit'},
                    { data: 'credit', name: 'credit'},
                    { data: 'asset', name: 'asset' },
                    { data: 'action', name: 'action' },
                    
                    
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
                   holder_name:$('#holder_name').val(),
                   account_number:$('#account_number').val(),
                   debit:$('#debit').val(),
                   credit:$('#credit').val(),
                   asset:$('#asset').val(),
               };
               console.log(data);
               if (id>0) {
                   var url="{{url('api/account/update')}}"+"/"+id;
               }else{
                   var url="{{url('api/account/store')}}"
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
                            removeUpdateProperty("supplier");
                            document.getElementById("myform").reset();
                        }
                        if(result.error==true){
                            alert('working');
                            getError(result.message);
                        }
                },
                errors:function(xhr,errors, status){
                    console.log(status);
                }
                
            });

        });

        $('#submitContact').click(function (e) {
               e.preventDefault();
               var id=$('#submitContact').val();
               console.log(id);
               $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   },
               });
               var data={
                   name:$('#name2').val(),
                   designation:$('#designation2').val(),
                   email:$('#email2').val(),
                   mobile:$('#mobile2').val(),
                   type:"supplier",
                   //contact:$("input:name='contact'").val(),
               };
               //console.log(data);
            
                   var url="{{url('/api/contactperson/update')}}"+"/"+id;
               
               $.ajax({
                   method:"PUT",
                   url: url,
                   data: data,
                   success:function (result) {
                       console.log(result);
                    if (result.error==false) {
                        $( "div").remove( ".text-danger" );
                            successNotification();
                            //removeUpdateProperty("supplier");
                            document.getElementById("myformContact").reset();
                        }
                        if(result.error==true){
                            alert('working');
                            getError(result.message);
                        }
                },
                errors:function(xhr,errors, status){
                    console.log(status);
                }
                
            });

        });
        function btnEdit(id){
            setUpdateProperty(id, 'Supplier','modal','submit');
            $.ajax({
                type:'GET',
                url:"/supplier/edit/"+id,
                datatype:JSON,
                success:function(result) {
                    console.log(result);
                    $('#official_name').val(result.data.official_name);
                    $('#official_address').val(result.data.official_address);
                    $('#country').val(result.data.country);
                    
                 }
            });
              
            //console.log(deleteAttribute().swal().isConfirm());
        }
        function btnContactEdit(id){
            setUpdateProperty(id, 'Contact','modalContact','submitContact');
            $.ajax({
                type:'GET',
                url:"/api/contactperson/edit/"+id,
                datatype:JSON,
                success:function(result) {
                    console.log(result);
                    $('#official_name2').val(result.data.supplier.official_name);
                    $('#official_address2').val(result.data.supplier.official_address);
                    $('#country2').val(result.data.supplier.country);
                    $('#name2').val(result.data.name);
                    $('#designation2').val(result.data.designation);
                    $('#email2').val(result.data.email);
                    $('#mobile2').val(result.data.mobile);
                    
                 }
            });
        }


    function btnContactDelete(id){
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
                   url:"{{url('/api/contactperson/destroy')}}"+"/"+id,
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
                   url:"/supplier/destroy/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(result) {
                    console.log(result)
                    if(result.error==true){
                            alert(result.message);
                            
                        }else{
                            
                        table.draw();
                        }
                       
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