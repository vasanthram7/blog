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
           

        if($request->hasFile('file')){
          if($request->hasFile('image1')){  
                //$filename = $request->file->store('storage/upload');
            
                $image1 = $request->file('image1')->getClientOriginalName();
                $filename = $request->file('file')->getClientOriginalName();

                echo $extension = $request->file('file')->getClientOriginalExtension();
                $extension1 = $request->file('file')->getClientOriginalExtension();
                if($extension != 'png'){
                    return redirect('upload')->with('error','Please choose .png Image file!');
                }
                if($extension1 != 'mp4'){
                    return redirect('upload')->with('error','Please choose .mp4 Video file!');
                }
                 
                    
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
            return redirect('upload')->with('error', 'Please choose Image file to upload!');
        } 
    return redirect('upload')->with('error','Please choose Video file to upload!');


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
