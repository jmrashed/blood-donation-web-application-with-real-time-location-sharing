<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {


    }
    public function faq() {

        $data['post'] = \App\Faq::where('category','faq')->get();
        return view('user.faq', ['data' => $data]);

    }
}
