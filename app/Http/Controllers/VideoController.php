<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Api;

use App\Video;
use Illuminate\Http\Request;
use Session;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

//use vendor\autoload.php;

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

                            echo $video = $_FILES["file"]["name"];
                            echo $image = $_FILES["image1"]["name"];
                                                            
                            echo $image1 =$_FILES["image1"]["tmp_name"];
                            echo $video1 =$_FILES["file"]["tmp_name"];


                            $command = "ffmpeg -i $image1 -s 128x128    ../storage/app/public/image/$image"; 
                            system($command);

                            echo "Overlay has been resized";

                            $command = "ffmpeg -i $video1  -i   ../storage/app/public/image/$image";
                            $command .= " -filter_complex \"[0:v][1:v]";
                            $command .= " overlay=80:50\""; // closing double quotes
                            $command .= " -c:a copy ../storage/app/public/upload/$video"; 
                            system($command);
                            echo "Overlay has been added";
            
                $image1 = $request->file('image1')->getClientOriginalName();
                $filename = $request->file('file')->getClientOriginalName();
                echo $image1;
                

                $extension = $request->file('image1')->getClientOriginalExtension();
                $extension1 = $request->file('file')->getClientOriginalExtension();
                if($extension != 'png'){
                    return redirect('upload')->with('error','Please choose .png Image file!');
                }
                if($extension1 != 'mp4'){
                    return redirect('upload')->with('error','Please choose .mp4 Video file!');
                }
                 //$request->file->storeAs('public/upload',$filename);
                 //$request->image1->storeAs('public/image',$image1);
                    
                 //$filename =  $request->file->getClientOriginalName();
                echo $vid = $request->file('file');
                echo $img1 = $request->file('image1');
                //exit;
                


                
                
                $filesize =  $request->file->getSize();
                $filesize1 =  $request->image1->getSize();
                
                //$request->file->storeAs('public/upload',$filename);
                //$request->image1->storeAs('public/image',$image1); 
               
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
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        echo "string";

    }

     public function show($id)
    {
        //
        // $lead = Lead::findOrFail($id);
        // return view('inventory.lead_qua', compact('lead'));
        
         //$lead = Lead::findOrFail($id);
        
        $video = Video::findOrFail($id);
        return view('video', compact('video'));
        
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
