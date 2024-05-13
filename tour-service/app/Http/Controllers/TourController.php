<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{

    public function index()
    {
        $tours = Tour::all();
        return response()->json($tours);
    }


    public function detail($id) {
        $tour = Tour::find($id);
        return response()->json($tour);
    }

    public function store(Request $request) {
        $tour = Tour::create([
            "name"=>$request->name,
            "country"=>$request->country,
            "location"=>$request->location
        ]);

        return response()->json($tour);
    }

    public function destroy($id) {
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return response()->json($tour);
    }

    
}
