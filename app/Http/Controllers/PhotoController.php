<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Gallery_detail;

use App\Libraries\Common;
use Session;
use PDF;
use File;
use Storage;
use League\Flysystem\Filesystem;
use Excel;
use Illuminate\Support\Facades\Input;
use DB;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
           $query = DB::table('galleries AS g')
                    ->leftjoin('gallery_details AS gd', 'g.id', '=', 'gd.gallery_id')
                    ->orderBy('g.id', 'ASC');
            $data['gallery']=$query->get();
        return view('user.galleryPage',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addGallery(){
        return view('gallery.create');
    }
    public function storeGallery(Request $request){
        
        $gallery = new Gallery();
        
        $gallery->page_name = $request->page_name;
        $gallery->gallery_name = $request->gallery_name;
        $gallery->updated_by = 2;
        $gallery->save();
        return redirect('/admin/viewGallery');
    }
    
    public function viewGallery(Request $request){
         $data['gallery']= Gallery::all(); 
        return view('gallery.view')->with('data', $data);
    }
    
    public function addPhoto(){       
         $data['gallery']= Gallery::all(); 
        return view('gallery.addPhoto')->with('data', $data);
    }
    
      public function storePhoto(Request $request){
        $common = new Common;
        $f=date('Y-m-d').'_'.time(); 
        $gallery_details = new Gallery_detail();

        $gallery_details->gallery_id = $request->gallery_id;
            if ($request->photo_name) {
                $fileName = $f;
                $photo_name = $common->uploadImage('photo_name', 'images/gallery', $fileName);
                $gallery_details->photo_name = $photo_name;
            }
         
        $gallery_details->updated_by = 2;
        $gallery_details->save();
        return redirect('/admin/viewPhoto');
    }

    public function viewPhoto(){
        
         $data['gallery']= Gallery_detail::all(); 
        return view('gallery.viewPhoto')->with('data', $data);
    }
    
}
