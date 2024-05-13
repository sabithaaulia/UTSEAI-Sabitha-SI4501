<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    

    public function index(){
        $orders = Order::all();
        return response()->json($orders);
    }
    public function detail($id){
        $order = Order::find($id);
        return response()->json($order);
    }

    public function customer($id){
        $order = Order::where('customer_id',$id)->get();
        return response()->json($order);
    }
    public function tour($id){
        $order = Order::where('tour_id',$id)->get();
        return response()->json($order);
    }
    public function store(Request $request){
        $order = Order::create([
            "customer_id"=>$request->customer_id,
            "tour_id"=>$request->tour_id,
            "status"=>$request->status
        ]);
        return response()->json($order);
    }
    public function destory($id){
        $order = Order::find($id);
        $order->delete();

        return response()->json($order);
    }


}
