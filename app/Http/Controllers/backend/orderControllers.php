<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\orderDetails;
use App\Models\orders;
use Illuminate\Http\Request;

class orderControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $orders = orders::orderBy('id','DESC')->get();
        return view('backend.orders.list',compact('orders'));
    }
        public function orderFilter(Request $request){

              if($request->data =="tumu"){
                  $orders=orders::orderBy('id','DESC')->get();
              }else{
                $orders = orders::where('durum',$request->data)->orderBy('id','DESC')->get();
              }
              
            return response()->json($orders);
            
        
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
        //
    }

    public function getdata(Request $request){
        
        
        $orderDetail = orderDetails::where('orders_id',$request->id)->get();
        return response()->json($orderDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
