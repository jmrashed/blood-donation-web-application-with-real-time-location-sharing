<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller {

    public function __construct() {
       $this->middleware('auth');
      
    }

    public function index() {
      
        $data = AdminModel::all();
        return view('admin.view')->with('data', $data);
    }

    public function create() {

        return view('admin.create');
    }

    public function store(Request $request) {
        $AdminModel = new AdminModel;
        //$formdata = $request->all();
        $AdminModel->name = $request->name;
        $AdminModel->email = $request->email;
        $AdminModel->password = bcrypt($request->password);
        $AdminModel->remember_token = $request->_token;
        $AdminModel->save();
        return redirect('/admin');
    }

    public function show($id) {
        $data = AdminModel::find($id);
        return view('admin.show')->with('data', $data);
    }

    public function edit($id) {
        $data = AdminModel::find($id);
        return view('admin.edit')->with('data', $data);
    }

    public function update(Request $request) {
        $id = $request->id;
        $admin = AdminModel::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect('/admin/' . $id);
    }

    public function destroy($id) {
        $admin = AdminModel::find($id);
        $admin->delete();        
        return redirect('/admin');

    }

}
