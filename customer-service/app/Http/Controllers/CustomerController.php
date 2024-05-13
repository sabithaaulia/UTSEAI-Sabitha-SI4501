<?php

namespace App\Http\Controllers;

use App\Events\CustomerCreated;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function index(){
        $customers = Customer::all();
        return response()->json($customers);
    }
    public function detail($id){
        $customer = Customer::find($id);
        return response()->json($customer);
    }
    public function store(Request $request){
        $customer = Customer::create([
            "name"=>$request->name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "telp"=>$request->telp
        ]);
        event(new CustomerCreated($customer));
        return response()->json($customer);
    }
    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json($customer);
    }


}
