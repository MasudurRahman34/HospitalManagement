<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{   use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.account.account');
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
         // return json_encode($request->product_data);
         $validator= Validator::make($request->all(), Account::$rules);
         if ($validator->fails()) {
             return $this->error($validator->errors(),200);
         }else{
             DB::beginTransaction();
             try {
                $account= new Account();
                $account->name=$request->name;
                $account->holder_name=$request->holder_name;
                $account->account_number=$request->account_number;
                $account->debit=$request->debit;
                $account->credit=$request->credit;
                $account->asset=$request->asset;
                $account->save();
                 DB::commit();
                 return $this->success($account);
             } catch (\Throwable $th) {
                 DB::rollBack();
                 throw $th;
             }
 
         
            } 
    }
    public function syncTable()
    {
        $account=Account::orderBy('id','DESC')->get();
        

        $data_table_render = DataTables::of($account)

            ->addColumn('action',function ($row){
                return view('backend.pages.account.account_action',compact('row'));
            })
            
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
