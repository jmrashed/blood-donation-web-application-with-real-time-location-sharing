<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function contactPage() {

        $data['post'] = \App\Post::where('post_slug','contact')->get();
        return view('user.contactPage', ['data' => $data]);

    }
    public function aboutus() { 
        $data['post'] = \App\Post::where('post_slug','aboutus')->get();
        return view('user.aboutus', ['data' => $data]);

    }
    public function WhoWeAre() { 
        $data['title'] = "About Us";
        $data['post'] = \App\Post::where('post_slug','who-we-are')->get();
	
        return view('user.aboutus', ['data' => $data]);

    }
    public function VisionMissionValue() {

        $data['post'] = \App\Post::where('post_slug','vision-mission-values')->get();
        return view('user.aboutus', ['data' => $data]);

    }






}
