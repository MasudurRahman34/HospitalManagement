<?php


namespace App\Http\Controllers\Supplier;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use App\Model\contactPerson;
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
        return view('backend.pages.Supplier.supplier');
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
        print_r($request->contact);
        $validator= Validator::make($request->all(), Supplier::$rules);
        if ($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $supplier= new Supplier();
                // $supplier->supplier_gen_id="sup_".time();
                $supplier->official_name=$request->official_name;
                $supplier->country=$request->country;
                $supplier->official_address=$request->official_address;
                $supplier->official_email=$request->official_email;
                $supplier->official_mobile=$request->official_mobile;
                //$supplier->contact_person=json_encode($request->contact);
                $supplier->save();
                //
                if($supplier->save() && !empty($request->name)){
                    $contact=new contactPerson();
                    $contact->name=$request->name;
                    $contact->mobile=$request->mobile;
                    $contact->email=$request->email;
                    $contact->designation=$request->designation;
                    $contact->type_id=1;
                    $contact->type='supplier';
                    $contact->save();
                }
                
                DB::commit();
                return $this->success($supplier);
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->error($e->getMessage(),200);
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
        $supplier=Supplier::with('contactPerson')->orderBy('id','DESC')->get();
        

        $data_table_render = DataTables::of($supplier)

            ->addColumn('action',function ($row){
                return view('backend.pages.Supplier.action',compact('row'));

                // return '<button class="btn btn-info btn-sm btn-circle waves-effect waves-light" onClick="btnEdit('.$row['id'].')"><i class="ti-info"></i></button>'.
                //     '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm btn-circle waves-effect waves-light"> <i class="ti-close"></i></button>';
                // return '<button class="btn btn-info btn-sm" onClick="btnEdit('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                //     '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
        
            ->addColumn('contact_person',function($supplier){
                return view('backend.pages.Supplier.contact_person',compact('supplier'));
            })
            ->addColumn('contact_action',function($supplier){
                return view('backend.pages.Supplier.contact_action',compact('supplier'));
            })
            ->rawColumns(['action','contact_person','contact_action'])
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
    public function edit(Supplier $supplier)
    {   
        return $this->success($supplier);   
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
                //$supplier= new Supplier();
                //$supplier->supplier_gen_id="sup".time();
                $supplier->name=$request->name;
                $supplier->address=$request->address;
                $supplier->update();
                DB::commit();
                return $this->success($supplier);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
       
        $supplier->delete();
        return $this->success($supplier);

    }
}
