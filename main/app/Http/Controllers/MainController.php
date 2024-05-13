<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    private $customerUrl = "http://127.0.0.1:8002";
    private $orderUrl = "http://127.0.0.1:8001";
    private $tourUrl = "http://127.0.0.1:8000";

    public function getTourOfCustomer($id) {
        $responseCustomer = Http::get($this->customerUrl."/api/customers/{$id}")->json();
        $responseOrder = Http::get($this->orderUrl."/api/orders/customers/".$responseCustomer['id'])->json();
        foreach($responseOrder as $res) {
            $responseTour = Http::get($this->tourUrl."/api/tours/{$res['tour_id']}")->json();
            $responseCustomer["tours"] = $responseTour;
            $responseCustomer['status'] = $res['status'];
        }

        return response()->json($responseCustomer);
    }

    public function getCustomerOfTours($id) {
        $responseTour = Http::get($this->tourUrl."/api/tours/{$id}")->json();
        $responseOrder = Http::get($this->orderUrl."/api/orders/tours/".$id)->json();
        foreach($responseOrder as $res) {
            $responseCustomer = Http::get($this->customerUrl."/api/customers/{$res['id']}")->json();
            $responseTour['customers'] = $responseCustomer;
            $responseTour['status'] = $res['status'];
        }

        return response()->json($responseTour);

    }

}
