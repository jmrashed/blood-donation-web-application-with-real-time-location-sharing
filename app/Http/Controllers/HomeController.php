<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Donor;
class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //$divisions = DB::table("divisions")->lists("name", "id");
        //return view('search.im', compact('divisions'));
        return view('home');
    }    

    public function OurPolicy() {  
        $data['OurPolicy'] = Content:: where ('content_type','our-policy') ->get(); 
        return view('user.our-policy')->with('data', $data); 
    }
    public function SearchDonor() {  
        $data['donor'] = Donor:: where ('division_id',2) ->get(); 
        return view('user.SearchDonor')->with('data', $data); 
    }

    public function getStateList(Request $request) {
        $districts = DB::table("districts")
                ->where("division_id", $request->division_id)
                ->lists("name", "id");
        return response()->json($districts);
    }

    public function getCityList(Request $request) {
        $upazilas = DB::table("upazilas")
                ->where("district_id", $request->district_id)
                ->lists("name", "id");
        return response()->json($upazilas);
    }

    public function search() {
        return view('search.view');
    }

    public function ajax() {
        return view('search.im');
    }

}
