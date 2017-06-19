<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    //
    public function index()
    {
        $countries = DB::table("countries")->lists("name","id");
        return view('search.im',compact('countries'));
    }
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->lists("name","id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->lists("name","id");
        return response()->json($cities);
    }
}
