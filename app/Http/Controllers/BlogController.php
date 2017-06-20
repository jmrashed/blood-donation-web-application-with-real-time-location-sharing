<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Blog_Category;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function blog_category() {
        $data = Blog_Category::all();
        return view('blog.view_category')->with('data', $data);
    }

    public function create_category() {
        return view('blog.create_category');
    }

    public function save_category(Request $request) {
        $data = new Blog_Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect('/blog/category');
    }

    public function view_blog() {
        $data = Blog::all();
        return view('blog.view_blog')->with('data', $data);
    }

    public function view() {
        $data['blog_list'] = Blog::all();
        return view('user.blogs.list')->with('data', $data);
    }

    public function create_blog() {
        $data['category_list']= Blog_Category::all();
        return view('blog.create_blog')->with('data', $data);
    }
    public function save_blog(Request $request) {
        $data = new Blog_Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect('/blog/category');
    }

}
