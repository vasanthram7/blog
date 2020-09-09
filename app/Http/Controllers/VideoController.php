<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Session;
//use Illuminate\Support\Facades\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        //echo "string";
     /*   $video = new Video;
        

        $request->file('user_video')->store('upload');

        print_r($request->file());

        echo $request->input('user_video');

        echo $video->videoName = $request->file('user_video');
        
        $video->save();   
*/


     

        if($request->hasFile('file')){
          if($request->hasFile('image1')){  
            //$filename = $request->file->store('storage/upload');
            
            echo $image1 = $request->file('image1')->getClientOriginalName();
            echo $filename = $request->file('file')->getClientOriginalName();
            
             
            //exit;
             //$filename =  $request->file->getClientOriginalName();
            
            
            $filesize =  $request->file->getSize();
            $filesize1 =  $request->image1->getSize();
            
            $request->file->storeAs('public/upload',$filename);
            $request->image1->storeAs('public/image',$image1);
           
            $file = new Video;
            
            $file->videoName = $filename;
            $file->image1 = $image1;
            $file->size = $filesize;
            
            $file->name    = $request->input('name');
            $file->description    = $request->input('desc'); 

            $file->save(); 
            
            return redirect('admin');
            
        }
        return redirect('upload')->with('error', 'Please choose file to upload!');
      } 
    return redirect('upload')->with('error','Please choose file to upload!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
