<?php

namespace App\Http\Controllers;

use App\Donor;
use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Upazila;
use App\Libraries\Common;
class SearchController_1 extends Controller
{
    public function index(){
        $data['division'] = Division::all();
    	return view('search.ajax_search')->with('data', $data);;
    }

    public function DonorSearchByLocation(){
    	        $data['division'] = Division::all();
        $data['donor'] = Donor::all();
        return view('search.DonorSearchByLocation')->with('data', $data);

    }
    
    

}
