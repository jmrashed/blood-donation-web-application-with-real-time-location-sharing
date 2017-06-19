<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthlyEntryController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view()
    {
        return view('monthly-entry');
    }
     public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
