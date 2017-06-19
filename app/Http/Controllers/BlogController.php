<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function view() {
        $data['blog_list'] = Blog::all();
        return view('user.blogs.list')->with('data', $data);
       
    }

}
