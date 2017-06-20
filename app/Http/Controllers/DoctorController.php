<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Doctor_designation;
use App\Hospital;
use App\Doctor_specialitie;

class DoctorController extends Controller
{
    //
    public function view(){
        $data['doctor'] = Doctor::all();
        return view('doctor.view')->with('data', $data);
    }
    
    public function create(){
        $data['designation'] = Doctor_designation::all();
        $data['hospital'] = Hospital::all(); 
        $data['specility'] = Doctor_specialitie::all();
        return view('doctor.create')->with('data', $data);
    }
}
