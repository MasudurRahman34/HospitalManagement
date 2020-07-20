<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Model\Product;
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
        return view('backend.pages.product.product');
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
            // return response()->json([
            //     'status'=>'Error',
            //     'message' => $validator->errors(),
            //     'data' => null
            // ], 422);
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $product= new Product();
                $product->product_gen_id="pro_".time();
                $product->name=$request->name;
                $product->price=$request->price;
                $product->quantity=$request->quantity;
                $product->catagory_id=$request->catagory_id;
                $product->unit_id=$request->unit_id;
                $product->supplier_id=$request->supplier_id;
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
            // return response()->json([
            //     'status'=>'Error',
            //     'message' => $validator->errors(),
            //     'data' => null
            // ], 422);
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                //$product= new product();
                //$product->product_gen_id="sup".time();
                $product->name=$request->name;
                $product->address=$request->address;
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
