<?php


namespace App\Http\Controllers\Supplier;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.supplier.supplier');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), Supplier::$rules);
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
                $supplier= new Supplier();
                $supplier->supplier_gen_id="sup".time();
                $supplier->name=$request->name;
                $supplier->address=$request->address;
                $supplier->save();
                DB::commit();
                return $this->success($request);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        
    }
    public function syncTable()
    {
        $supplier=Supplier::orderBy('id','DESC')->get();

        $data_table_render = DataTables::of($supplier)

            ->addColumn('action',function ($row){

                return '<button class="btn btn-info btn-sm btn-circle waves-effect waves-light" onClick="btnEdit('.$row['id'].')"><i class="ti-info"></i></button>'.
                    '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm btn-circle waves-effect waves-light"> <i class="ti-close"></i></button>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return $this->success($id);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
