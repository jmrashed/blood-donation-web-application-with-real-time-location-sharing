<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlooddonnerController extends Controller
{
    
public function __construct()
    {
       // $this->middleware('auth');
}

public function index(){

	return view('admin.profile');
}
     public function showProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }


  public function store(Request $request)
    {
        $name = $request->input('name');

        //
    }


      public function update(Request $request, $id)
    {
        //
    }
}
