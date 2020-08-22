@extends('backend.layouts.master')
    @section('title', 'order List')
   
    @section('content')
    <div class="container-fluid">
        <h4>Order List</h4>
        <ol class="breadcrumb no-bg m-b-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Order</a></li>
            <li class="breadcrumb-item active">Order List</li>
        </ol>
        <div class="box box-block bg-white">
            <div class="row">
            <div class="col-md-6">
                <h5 class="m-b-1 pull-xs-left">Export</h5>
             </div>
             <div class="col-md-6">
                    <div style="hidden=true">
                    <div class="modal fade" id="modal_approve" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h6 class="modal-title" id="modalLabel">Update Order</h6>
                                </div>
                                {{-- <form id="myform" class="" method="post" action="{{ route('supplier.store') }}"> --}}
                                    <form id="myformContact" action="javascript:void(0)">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h6>Do You Want To Confirm ?</h6>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="submitApprove" value="0">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal_bill_pay" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h6 class="modal-title" id="modalLabel">Update Billing</h6>
                                </div>
                                {{-- <form id="myform" class="" method="post" action="{{ route('supplier.store') }}"> --}}
                                    <form id="myformContact" action="javascript:void(0)">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h6>Do You Want To Confirm ?</h6>
                                                <hr>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="message-text" class="form-control-label">Amount:</label>
                                                    <input type="text" class="form-control" id="country2" name="country2" value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="transaction_type" class="form-control-label">Transaction Type</label>
                                                    <select id="transaction_type" class="form-control" name="">
                                                        <option value="Cash">Cash</option>
                                                        <option value="Account">Account</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="transaction_type" class="form-control-label">Transaction To</label>
                                                    <input type="text" class="form-control" id="transaction_number" placeholder="account Number">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="transaction_type" class="form-control-label">Transaction From</label>
                                                    <select id="transaction_from" class="form-control" name="">
                                                        @foreach (App\Model\Account::get() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="btn_pay_bill" value="0">Submit</button>
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
                           <th data-priority="">Invoice_id</th>
                           <th data-priority="">Type</th>
                           <th data-priority="">Supplier</th>
                           <th data-priority="">Sub_Total</th>
                           <th data-priority="">Discount</th>
                           <th data-priority="">Total Payable</th>
                           <th data-priority="">Paid_Amount</th>
                           <th data-priority="">Due_amount</th>
                           <th data-priority="">Status</th>
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
                ajax:"{!! route('order.synctable') !!}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'Invoice_id', name: 'Invoice_id' },
                    { data: 'type', name: 'type' },
                    { data: 'supplier.official_name', name: 'supplier.official_name' },
                    { data: 'sub_total', name: 'sub_total' },
                    { data: 'discount', name: 'discount' },
                    { data: 'total_payable', name: 'total_payable' },
                    { data: 'paid_amount', name: 'paid_amount' },
                    { data: 'due_amount', name: 'due_amount' },
                    { data: 'status', name: 'status' },
                    
                    { data: 'action', name: 'action' },
                    
                ]
            });
        

        
        function btnApprove(id){
            $('#modal_approve').modal('show');
            $('#submitApprove').click(function (e) { 
                e.preventDefault();
                $.ajax({
                type:'PUT',
                url:"/api/order/approved/"+id,
                data:{
                    'id':id
                },
                success:function(result) {
                    $('#modal_approve').modal('hide');
                    setTimeout(function() {table.draw()}, 600);
                    $('#modal_bill_pay').modal('show');
                    $('#btn_pay_bill').click(function (e) { 
                        e.preventDefault();
                        btnBillPay(id);
                    });
                   
                 }
                });
            });
              
            //console.log(deleteAttribute().swal().isConfirm());
        }
        function btnPayBill(id) {
            $('#modal_bill_pay').modal('show');
            $('#btn_pay_bill').click(function (e) { 
                        e.preventDefault();
                        btnBillPay(id);
                    })
        }
        function btnBillPay(id) {  
            console.log(id);
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