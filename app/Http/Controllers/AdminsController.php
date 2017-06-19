<?php

namespace App\Http\Controllers;

class AdminsController extends Controller {

    public function index() {
        $users = DB::select('select * from users where active = ?', [1]);

        return view('user.index', ['users' => $users]);
    }

}
