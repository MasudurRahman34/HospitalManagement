<?php

namespace App\Http\Controllers\Catagory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;
use App\Model\Catagory;



class CatagoryController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $catagories=Catagory::whereNull('parent_id')->with('childCatagories')->get();

        return view('backend.pages.product.catagory.catagory',compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), Catagory::$rules);
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
                $catagory= new Catagory();
                $catagory->name=$request->name;
                $catagory->parent_id=$request->parent_id;
                $catagory->save();
                DB::commit();
                return $this->success($catagory);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    public function syncTable()
    {
        $catagory=Catagory::with('catagories')->orderBy('id','DESC')->get();

        $data_table_render = DataTables::of($catagory)
            ->addColumn('parent_catagory',function($catagory){
                return view('backend.pages.product.catagory.parent_catagory',compact('catagory'));
            })
            ->addColumn('action',function ($row){

                return '<button class="btn btn-info btn-sm" onClick="btnEdit('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                    '<button  onClick="btnDelete('.$row['id'].')" class="btn btn-danger btn-sm delete_class"><i class="fa fa-trash-o"></i></button>';
            })
            ->rawColumns(['parent_catagory','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        return $this->success($catagory);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $validator= Validator::make($request->all(), Catagory::$rules);
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
                //$catagory= new catagory();
                //$catagory->Unit_gen_id="sup".time();
                $catagory->name=$request->name;
                $catagory->update();
                DB::commit();
                return $this->success($catagory);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        $catagory->delete();
        return $this->success($catagory);
    }
}
