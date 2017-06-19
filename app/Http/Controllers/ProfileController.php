<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('user.profile');
    }

    public function viewMyProfile()
    {
    	return view('user.profile-view');
    }
}
