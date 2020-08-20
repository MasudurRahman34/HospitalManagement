@extends('backend.layouts.master')
    @section('title', 'Product List')
   
    @section('content')
    <div class="container-fluid">
        <h4>Product List</h4>
        <ol class="breadcrumb no-bg m-b-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active">Product List</li>
        </ol>
        <div class="box box-block bg-white">
            <div class="row">
            <div class="col-md-6">
                <h5 class="m-b-1 pull-xs-left">Export Product</h5>
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
                                    <h6 class="modal-title" id="modalLabel">New Product Information</h6>
                                </div>
                                <form id="myform" action="javascript:void(0)">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Name:</label>
                                                    <input type="text" class="form-control" id="name">
                                                    <div id="searchResult" class="bg-success">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Barcode</label>
                                                    <input type="text" class="form-control" name="barcode" id="barcode">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Catagory</label>
                                                    <select class="form-control m-b-1" id="catagory_id">
                                                        <option>--Please Select--</option>
                                                        @foreach ($catagories as $catagory)
                                                            <option value="{{$catagory->id}}">{{$catagory->name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Supplier</label>
                                                    <select class="form-control m-b-1" id="supplier_id">
                                                        <option>--Please Select--</option>
                                                        @foreach ($suppliers as $supllier)
                                                            <option value="{{$supllier->id}}">{{$supllier->official_name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Unit</label>
                                                    <select class="form-control m-b-1" id="unit_id">
                                                        <option>--Please Select--</option>
                                                        @foreach ($units as $unit)
                                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Buying price/per piece</label>
                                                    <input type="number" class="form-control" name="buying_price" id="buying_price">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Selling price/per piece</label>
                                                    <input type="number" class="form-control" name="selling_price" id="selling_price">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">Description:</label>
                                                    <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                           <th data-priority="">Product id</th>
                           <th data-priority="">Name</th>
                           <th data-priority="">Catagory</th>
                           <th data-priority="">Supplier</th>
                           <th data-priority="">Unit</th>
                           <th data-priority="">Buying Price</th>
                           <th data-priority="">Selling Price</th>
                           <th data-priority="">Quantity</th>
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
   
        

        $("#name").keyup(function (e) { 
            e.preventDefault();
            var product =$(this).val();
            //console.log(product);
        var data={
            name:product,
        };
            $.ajax({
                type: "POST",
                url: "/api/product/search/name",
                data: data,
                //dataType: "json",
                success: function (response) {
                    console.log(response);
                    var result='';
                    result+="<ul class='list-group'>"
                        response.data.forEach(list);
                        result+='</ul>';
                    function list(value){
                        result+= '<li class="list-group-item bg-primary list_autosearch" style="cursor:pointer" data-id="'+value.id+'">'+value.name+'</li>';
                    }
                    $('#searchResult').fadeIn();
                    document.getElementById("searchResult").innerHTML = result;
                }
            });
            
        });
        $(document).on('click','.list_autosearch',function () {
            $('#name').val($(this).text());
            $('#name').attr('date-id',$(this).attr('data-id'));
            $('#searchResult').fadeOut();
            
        });
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
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                },
                processing:true,
                serverSide:true,
                ajax:"{!! route('product.synctable') !!}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'product_gen_id', name: 'product_gen_id' },
                    { data: 'name', name: 'name' },
                    { data: 'catagory.name', name: 'catagory.name' },
                    { data: 'supplier.official_name', name: 'supplier.official_name' },
                    { data: 'unit.name', name: 'unit.name' },
                    { data: 'buying_price', name: 'buying_price' },
                    { data: 'selling_price', name: 'selling_price' },
                    { data: 'quantity', name: 'quantity' },
                    { data: 'action', name: 'action' }
                ]
            });
        $('#submit').click(function (e) {
               e.preventDefault();
               var id=$('#submit').val();
               $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   },
               });
               var data={
                    name:$('#name').val(),
                    barcode:$('#barcode').val(),
                    catagory_id:$('#catagory_id option:selected').val(),
                    unit_id:$('#unit_id option:selected').val(),
                    supplier_id:$('#supplier_id option:selected').val(),
                    selling_price:$('#selling_price').val(),
                    buying_price:$('#buying_price').val(),
                    description:$('#description').val(),
                //    quantity:$('#quantity').val(),
               };
               console.log(data);
               if (id>0) {
                   var url="{{url('/api/product/update')}}"+"/"+id;
               }else{
                   var url="{{url('/api/product/store')}}"
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
                            removeUpdateProperty("product");
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

        function btnEdit(id){
            setUpdateProperty(id, 'product','modal','submit');
            $.ajax({
                type:'GET',
                url:"/api/product/edit/"+id,
                datatype:JSON,
                success:function(result) {
                    console.log()
                    $('#name').val(result.data.name);
                    $('#barcode').val(result.data.barcode);
                    $('#catagory_id').val(result.data.catagory_id);
                    $('#supplier_id').val(result.data.supplier_id);
                    $('#unit_id').val(result.data.unit_id);
                    $('#selling_price').val(result.data.selling_price);
                    $('#buying_price').val(result.data.buying_price);
                    $('#description').val(result.data.description);
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
                   url:"/api/product/destroy/"+id,
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