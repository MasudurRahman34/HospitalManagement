@extends('backend.layouts.master')
    @section('title', 'Product List')
   
    @section('content')
    <style>
        /* td{
            padding: .80rem !important;
        } */
    </style>
    <div class="container-fluid">
        <h4>P-RQ Center</h4>
        <div class="box box-block bg-white">
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <label for="" class="form-control-label">Search By</label>
                    <div class="form-group">
                        
                        <label class="form-check-inline">
                            <input class="form-check-input" type="radio" name="filter_by" id="inlineRadio1" value="barcode">Barcode
                        </label>
                        <label class="form-check-inline">
                            <input class="form-check-input" type="radio" name="filter_by" id="inlineRadio2" value="product_id">Product id
                        </label>
                        <label class="form-check-inline">
                            <input class="form-check-input" type="radio" name="filter_by" id="inlineRadio3" value="product_name">Product Name
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-control-label">.</label>
                    <button class="btn btn-primary form-control" type="button" onclick="btnSet()">Set</button>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-control-label">Date</label>
                    <input type="text" name="" class="form-control" value="{{ now() }}">
                </div>
                <div class="col-md-12 m-b-3 m-b-3 m-t-3">
                    <div class="table-responsive">
                        <form action="" id="select_product_form">
                        <table class="table table-striped table-bordered" id="table-2">
                            <thead>
                                <tr>
                                <th>Product Search</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                                <tr>
                                    
                                    <td width='25%'> 
                                        <div class="form-group">
                                            <select id="select_product" class="form-control" data-plugin="select" name="">
                                               
                                            </select>
                                        </div>
                                        {{-- <select id="select_product" name="" data-plugin="" class="form-control">
                                        <option value="">--please select--</option>
                                        </select> --}}
                                        {{-- <input type="text" name="" id="name" class="form-control"> --}}
                                   <td>
                                    <input type="text" name="" id="name" class="form-control" disabled>
                                  </td>
                                  <td>
                                    <input type="text" name="" id="unit" class="form-control" disabled>
                                  </td>
                                  <td>
                                    <input type="number" name="" id="buying_price" class="form-control" disabled>
                                  </td>
                                  <td>
                                    <input type="number" name="" id="selling_price" class="form-control" disabled>
                                  </td>
                                  <td>
                                    <input type="number" name="" id="qty" class="form-control" value="1">
                                  </td>
                                  <td>
                                    <input type="number" name="" id="total_amount" class="form-control" disabled>
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-success btn-circle waves-effect waves-light" onclick="addProductToTable()">
										<i class="ti-check"></i>
									</button>
                                  </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
                <div class="col-xs-12 m-b-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="product_list">
                            <thead>
                                <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                                {{-- <tr>
                                    
                                    <td class="m-5"> <select id="my-select" name="" class="form-control input-sm">
                                        <option>--please Select---</option>
                                    </select></td>
                                   <td>
                                    <input type="text" name="" id="name" class="form-control input-sm">
                                  </td>
                                  <td>
                                    <input type="text" name="" id="name" class="form-control">
                                  </td>
                                  <td>
                                    <input type="text" name="" id="name" class="form-control">
                                  </td>
                                  <td>
                                    <input type="text" name="" id="name" class="form-control">
                                  </td>
                                  <td>
                                    <input type="text" name="" id="name" class="form-control">
                                  </td>
                                  <td>
                                    <input type="text" name="" id="name" class="form-control">
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-success btn-sm label-left b-a-0 waves-effect waves-light">
										<span class="btn-label"><i class="ti-check"></i></span>
										a
									</button><button type="button" class="btn btn-success btn-sm label-left b-a-0 waves-effect waves-light">
										<span class="btn-label"><i class="ti-check"></i></span>
										b
									</button>
                                  </td>
                                    
                                </tr> --}}
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div class="col-md-6">
                    supplier details
                    due balance
                    paid balance
                    other information
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Sub Total Total</label>
                                <input type="number" class="form-control" name="sub_total" id="sub_total" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">discount</label>
                                <input type="number" class="form-control" name="discount" id="discount" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Total Payable</label>
                                <input type="number" class="form-control" name="total_payable" id="total_payable" value="0" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Paid Amount</label>
                                <input type="number" class="form-control" name="paid_amount" id="paid_amount" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Due After Payable</label>
                                <input type="number" class="form-control" name="due_amount" id="due_amount" value="0" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">.</label>
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    {{-- @include ('backend.partials.js.datatables') --}}
    {{-- <script type="text/javascript" src="{{ asset('dashboard/html/js/index.js') }}"></script> --}}
    <script>
       $('[data-plugin="select"]').select2();
   
        $(document).ready(function () {
            $('body').addClass('compact-sidebar');
        });
        function btnSet(){
           var supplier_id=$('#supplier_id option:selected').val();
           var filter_by=$("input[name='filter_by']:checked").val();
           filter_product={
               'supplier_id':supplier_id,
               'filter_by':filter_by,
           }
           
           $.ajax({
               type: "get",
               url: "/api/product/search/supplier_id"+"/"+supplier_id,
            //    data: filter_product,
               success: function (response) {
                   console.log(response);
                  var option='<option>'+'--please select---'+'</option>';
                  response.data.forEach(selectOption)

                  function selectOption(value){
                      option+='<option value='+value.id+' data-name='+value.name+' data-unit_id='+value.unit_id+' data-buying_price='+value.buying_price +' data-selling_price='+value.selling_price +'>'+filterText(value)+'</option>'
                  }
                    document.getElementById("select_product").innerHTML = option;
                  function filterText(value){
                      console.log(value, filter_by);
                      if(filter_by=='product_id'){
                          
                           return value.product_gen_id;
                      }else if(filter_by=='product_name'){
                        return value.name;
                      }else{
                        return value.barcode;
                      }
                  }
                  
                  $('[data-plugin="select"]').select2("open");
  

                  $('#select_product').on('change keyup click',function (e) { 
                      
                      
                      $("#name").val($(this).find(':selected').data('name'));
                      $("#unit").val($(this).find(':selected').data('unit_id'));
                      $("#buying_price").val($(this).find(':selected').data('buying_price'));
                      $("#selling_price").val($(this).find(':selected').data('selling_price'));
                      
                  });
                  //('[data-plugin="select"]').select2("close");
                  $('#select_product').on('select2:close',function(e){
                    $("#qty").focus();
                  });
               }
           });

        }
        $(function(){
            $('#qty,#buying_price').on('change keydown keyup click',qty);
            function qty() {
               var sum=(Number($('#qty').val()))*(Number($("#buying_price").val()));
               $("#total_amount").val(sum);
            }
        })

        function addProductToTable() {
            var product={
                'product_id':$('#select_product option:selected').val(),
                'product_name':$('#name').val(),
                'unit':$('#unit').val(),
                'buying_price':Number($('#buying_price').val()),
                'selling_price':Number($('#selling_price').val()),
                'qty':Number($('#qty').val()),
                'total_amount':Number($('#total_amount').val()),
            }
            addRow(product);
            $("#select_product_form")[0].reset();
            $('[data-plugin="select"]').select2("open");
        }
        var sub_total=0;
        function addRow(product){
            var tableB=$('#product_list tbody');
            var row=$(
            '<tr>'
                +'<td>'+product.product_id+'</td>'
                +'<td>'+product.product_name+'</td>'
                +'<td>'+product.unit+'</td>'
                +'<td>'+product.buying_price+'</td>'
                +'<td>'+product.selling_price+'</td>'
                +'<td>'+product.qty+'</td>'
                +'<td>'+product.total_amount+'</td>'
                +"<td><button type='button' class='btn btn-danger btn-circle waves-effect waves-light' onclick='deleteProductFromTable(this)'><i class='ti-close'></i></button></td>"
                    +'</tr>'                
            );
            row.data('id',product.product_id);
            row.data('id',product.product_name);
            row.data('id',product.unit);
            row.data('id',product.buying_price);
            row.data('id',product.selling_price);
            row.data('id',product.qty);
            row.data('id',product.total_amount);
            tableB.append(row);
             sub_total+=Number(product.total_amount);

            $('#sub_total').val(sub_total);

            };
            
            var last_product_price;
            function deleteProductFromTable(e){
                last_product_price=parseFloat($(e).parent().parent().find('td:nth-last-child(2)').text(),10);
                sub_total-=Number(last_product_price);
                $('#sub_total').val(sub_total);
                $(e).parent().parent().remove();
            };

            $(function(){
                $('#sub_total,#discount,#total_payable,#paid_amount,#due_amount').on('change keydown keyup click',total);
                function total(){
                    var sub_total=$('#sub_total').val();
                    var discount=$('#discount').val();
                    var total_payable=$('#total_payable').val();
                    var paid_amount=$('#paid_amount').val();
                    var due_amount=$('#due_amount').val();
                   total_payable=Number(sub_total-((discount/100)*sub_total));
                   $('#total_payable').val(total_payable);
                   due_amount=Number(total_payable-paid_amount);
                   $('#due_amount').val(due_amount);
                }
            });
    </script>
    @endsection