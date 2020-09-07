<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
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

            //$filename = $request->file->store('storage/upload');
            
             echo $image1 =  $request->image1->getClientOriginalName();

            echo $filename =  $request->file->getClientOriginalName();
            
            //$filesize =  $request->file->getClientSize();
            $filesize =  $request->file->getSize();
            $request->file->storeAs('public/upload/storage',$image1);
            $request->file->storeAs('public/upload',$filename);
           //return $request->file->store('public/upload');
            $file = new Video;
            //$file->videoName = 'storage/upload/'.$filename;
            $file->videoName = $filename;
            $file->size = $filesize;
            
            $file->name    = $request->input('name');
            $file->description    = $request->input('desc'); 

            $file->save(); 
            //return view('handleAdmin');
            return redirect('admin');
            //->with('videos', Video::all());
        }

    


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
