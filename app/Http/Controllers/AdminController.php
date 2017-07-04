<?php

namespace App\Http\Controllers;

use App\User; 
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller {

    public function __construct() {
       $this->middleware('auth');
      
    }

    public function index() {
      
        $data = User::all();
        return view('admin.view')->with('data', $data);
    }

    public function create() {

        return view('admin.create');
    }

    public function store(Request $request) {
        $User = new User;
        //$formdata = $request->all();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->remember_token = $request->_token;
        $User->save();
        return redirect('/admin');
    }

    public function show($id) {
        $data = User::find($id);
        return view('admin.show')->with('data', $data);
    }

    public function edit($id) {
        $data = User::find($id);
        return view('admin.edit')->with('data', $data);
    }

    public function update(Request $request) {
        $id = $request->id;
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect('/admin/' . $id);
    }

    public function destroy($id) {
        $admin = User::find($id);
        $admin->delete();        
        return redirect('/admin');

    }

}
