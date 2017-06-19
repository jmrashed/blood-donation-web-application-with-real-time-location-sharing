<?php

namespace App\Http\Controllers;
use App\Speech;

use Illuminate\Http\Request;

class SpeechController extends Controller
{
    public function index(){ 

        $data['speech'] = Speech:: where ('id',1) ->get(); 
        return view('user.speech')->with('data', $data);
    }
}
