<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Section_event;
class UserController extends Controller {

    /*public function __construct() {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');
    }*/
    public function index(){

         $data['gallery']= Gallery::all();
         $sec_event= Section_event::all();

		$data['banner']="banner";
        return view('user.home', compact('sec_event'), ['data' => $data]);
    }
    
    public function show($id) {
        return view('user.profile',['user' => User::findOrFail($id)]);
    }

    public function store(Request $request) {
        $name = $request->name;
    }

    public function update(Request $request, $id) {
        
    }

}
