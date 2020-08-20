<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;
class ProductController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories= Catagory::get();
        $units= Unit::get();
        $suppliers= Supplier::get();

        return view('backend.pages.product.product',compact(['catagories','units', 'suppliers']));
    }
    public function pricing()
    {
        return view('backend.pages.product.pricing.pricing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function syncTable()
    {
        $product=Product::orderBy('id','DESC')->with('Catagory')->with('Unit')->with('Supplier')->get();

        $data_table_render = Datatables::of($product)

            ->addColumn('action',function ($row){

                // return '<button class="btn btn-info btn-sm btn-circle waves-effect waves-light" onClick="btnEdit('.$row['id'].')"><i class="ti-info"></i></button>'.
                //     '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm btn-circle waves-effect waves-light"> <i class="ti-close"></i></button>';
                return '<button class="btn btn-info btn-sm" onClick="btnEdit('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), Product::$rules);
        if ($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $product= new Product();  
                $product->name=$request->name;
                $product->barcode=$request->barcode;
                $product->catagory_id=$request->catagory_id;
                $product->supplier_id=$request->supplier_id;
                $product->unit_id=$request->unit_id;
                $product->selling_price=$request->selling_price;
                $product->buying_price=$request->buying_price;
                $product->description=$request->description;
                $product->save();
                DB::commit();
                return $this->success($product);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }
    public function searchProductName(Request $request)
    {
        
        $value=$request->name;
        //return $value;
        $product=Product::where('name','like','%'.$value.'%')->get();
        return $this->success($product);
    }
    public function filterSupplierProduct($supplier_id)
    {
        
        $value=$supplier_id;
        //return $value;
        $filterSupplierProduct=DB::table('products')->where('supplier_id','=',$value)->get();
        return $this->success($filterSupplierProduct);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return $this->success($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator= Validator::make($request->all(), product::$rules);
        if ($validator->fails()) {
           
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $product->name=$request->name;
                $product->barcode=$request->barcode;
                $product->catagory_id=$request->catagory_id;
                $product->supplier_id=$request->supplier_id;
                $product->unit_id=$request->unit_id;
                $product->selling_price=$request->selling_price;
                $product->buying_price=$request->buying_price;
                $product->description=$request->description;
                $product->update();
                DB::commit();
                return $this->success($product);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->success($product);
    }
}
