<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.product.unit.unit');
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
        $validator= Validator::make($request->all(), Unit::$rules);
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
                $Unit= new Unit();
                $Unit->name=$request->name;
                $Unit->save();
                DB::commit();
                return $this->success($Unit);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }
    public function syncTable()
    {
        $Unit=Unit::orderBy('id','DESC')->get();

        $data_table_render = DataTables::of($Unit)

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
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return $this->success($unit);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validator= Validator::make($request->all(), Unit::$rules);
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
                //$Unit= new Unit();
                //$Unit->Unit_gen_id="sup".time();
                $unit->name=$request->name;
                $unit->update();
                DB::commit();
                return $this->success($Unit);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return $this->success($unit);
    }
}
