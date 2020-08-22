<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB ;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.order.order');
    }
    public function stockProduct()
    {
        return view('backend.pages.stock.product_stock');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus()
    {
       return json_encode('working');
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
        $validator= Validator::make($request->all(), Order::$rules);
        if ($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $Order= new Order();
                $Order->discount=$request->discount;
                $Order->sub_total=$request->sub_total;
                $Order->total_payable=$request->total_payable;
                $Order->paid_amount=$request->paid_amount;
                $Order->due_amount=$request->due_amount;
                $Order->supplier_id=$request->supplier_id;
                $Order->type=$request->order_type;
                $Order->save();
                foreach ($request->product_data as $key=>$value) {
                    $order_details= new OrderDetails;
                    $order_details->product_id=$value['product_id'];
                    $order_details->buying_price=$value['buying_price'];
                    $order_details->quantity=$value['quantity'];
                    $order_details->total_amount=$value['total_amount'];
                    $order_details->supplier_id=$request->supplier_id;
                    $order_details->order_id=$Order->id;
                    $order_details->save();
                }
                
               
                DB::commit();
                return $this->success($Order);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    public function syncTable()
    {
        $order=Order::with('supplier')->orderBy('id','DESC')->get();
        

        $data_table_render = DataTables::of($order)

            ->addColumn('action',function ($row){
                return view('backend.pages.order.order_action',compact('row'));
            })
            
            ->editColumn('status',function($row){
                return view('backend.pages.order.order_approve',compact('row'));
               
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }


    public function orderApproved(Request $request, Order $order)
    {
        DB::beginTransaction();
            try {
                $order->status=1;
                
                $order->update();
                $OrderDetails=OrderDetails::where('order_id',$order->id)->update(array('status'=>1));

                DB::commit();
                return $this->success($order);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function orderDetaisSynctable(Order $order)
    {
        $order_details=OrderDetails::with('product','supplier')->get();
        

        $data_table_render = DataTables::of($order_details)

            ->addColumn('action',function ($row){
                return view('backend.pages.order.order_action',compact('row'));
            })
            
            ->editColumn('status',function($row){
                return view('backend.pages.stock.status',compact('row'));
               
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
