<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUserController extends Controller {

    //

    public function index() {

        $data['var'] = 5;
        $data['user_list'] = \App\User::get();
        return view('admin.create_user_form', ['data' => $data]);
    }

    public function ShowAllUsers() {

        $data['user_list'] = \App\User::get();
        return view('admin.showallusers', ['data' => $data]);
    }

}
