<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Catalog</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/  -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-video-catalog.css') }}">
    <style type="text/css">
              .errmsg {
                display: none;
              }
              .error_msg{
                color:  #f51616;
                
                font-style: initial;
                font-weight: 900;
                margin-left: -8px;
                /*font-variant: small-caps;*/
              }
              .confirmMessage{
                 font-weight: bolder;
                 font-variant: initial;
                }
        </style>    
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #373436;
  padding: 20px;
}
</style>    
</head>
<body>
   
    <div class="tm-page-wrap mx-auto">

        <div class="position-relative">
             @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            {{ session('error') }}
        </div>
    @endif
            <div class="position-absolute tm-site-header">

                <div class="container-fluid position-relative">
                   
                    <div class="row">
                        <div class="col-7 col-md-4">
                            <a href="#" class="tm-bg-black text-center tm-logo-container">
                                <i class="fas fa-video tm-site-logo mb-3"></i>
                                <h1 class="tm-site-name">Video Catalog</h1>
                            </a>
                        </div>
                        <div class="col-5 col-md-8 ml-auto mr-0">
                            <div class="tm-site-nav">
                                <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                                    <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button"
                                        data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span>
                                            <i class="fas fa-bars tm-menu-closed-icon"></i>
                                            <i class="fas fa-times tm-menu-opened-icon"></i>
                                        </span>
                                    </button>
                                    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                        <ul class="navbar-nav text-uppercase">
                                            @guest
                                            @if (Route::has('register'))
                                            @endif
                                            @else
                                            
                        
                                            <li class="nav-item active">
                                                <a class="nav-link tm-nav-link" href="/admin">Admin Home <span class="sr-only">(current)</span></a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="">{{ Auth::user()->name }}</a>
                                            </li>
                                            
                           
                        
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>

                                            @endguest
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-welcome-container text-center text-white">
                <div class="tm-welcome-container-inner">
                    <p class="tm-welcome-text mb-1 text-white"></p>
                    <p class="tm-welcome-text mb-5 text-white"></p><br><br><br><br><br>
                    <div class="container">
  <form action="/upload" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
    {{csrf_field()}}
    <label for="fname">Enter Video Name</label>
    <input type="text" id="name" name="name" placeholder="Video name..">
    <span id="err_name" class="error_msg errmsg" style="color: #f51616;">Please Enter Video Name  !...</span>
 <br>
    <label for="subject">Enter Video Description</label>
    <textarea id="desc" name="desc" placeholder="Write something.." style="height:200px"></textarea>
    <span id="err_desc" class="error_msg errmsg" style="color: #f51616;">Please Enter some description  !...</span>
<br>    
    <label for="fname">Select Image</label>
    <input type="file" id="image1" name="image1" placeholder="Image file..">
    <span id="err_img" class="error_msg errmsg" style="color: #f51616;">Please Choose .png image  !...</span>
 <br>   
    <label for="fname">Select Video</label>
    <input type="file" id="file" name="file" placeholder="Video file..">
    <span id="err_video" class="error_msg errmsg" style="color: #f51616;">Please Choose .mp4 video  !...</span>
<br>

    <input type="submit" value="Upload">
  </form>
</div>

                    
                    
                </div>
            </div>

            <div id="tm-video-container">
                <video autoplay muted loop id="tm-video">
                    <!-- <source src="video/sunset-timelapse-video.mp4" type="video/mp4"> -->
                        <source src="video/wheat-field.mp4" type="video/mp4">
                </video>    
            </div>
            
            <i id="tm-video-control-button" class="fas fa-pause"></i>
        </div>

        <div class="container-fluid">
            <div id="content" class="mx-auto tm-content-container">
               

                <!-- Subscribe form and footer links -->
                <div class="row mt-5 pt-3">
                    <div class="col-xl-6 col-lg-12 mb-4">
                        <div class="tm-bg-gray p-5 h-100">
                            <h3 class="tm-text-primary mb-3">Do you want to get our latest updates?</h3>
                            <p class="mb-5">Please subscribe our newsletter for upcoming new videos and latest information about our
                                work. Thank you.</p>
                            <form action="" method="GET" class="tm-subscribe-form">
                                <input type="text" name="email" placeholder="Your Email..." required>
                                <button type="submit" class="btn rounded-0 btn-primary tm-btn-small">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="p-5 tm-bg-gray">
                            <h3 class="tm-text-primary mb-4">Quick Links</h3>
                            <ul class="list-unstyled tm-footer-links">
                                <li><a href="#">Duis bibendum</a></li>
                                <li><a href="#">Purus non dignissim</a></li>
                                <li><a href="#">Sapien metus gravida</a></li>
                                <li><a href="#">Eget consequat</a></li>
                                <li><a href="#">Praesent eu pulvinar</a></li>
                            </ul>    
                        </div>                        
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="p-5 tm-bg-gray h-100">
                            <h3 class="tm-text-primary mb-4">Our Pages</h3>
                            <ul class="list-unstyled tm-footer-links">
                                <li><a href="#">Our Videos</a></li>
                                <li><a href="#">License Terms</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Privacy Policies</a></li>
                            </ul>
                        </div>                        
                    </div>
                </div> <!-- row -->

                <footer class="row pt-5">
                    <div class="col-12">
                        <p class="text-right">Copyright 2020 The Video Catalog Company 
                        
                        - Designed by <a href="https://templatemo.com" rel="nofollow" target="_parent">TemplateMo</a></p>
                    </div>
                </footer>
            </div> <!-- tm-content-container -->
        </div>

    </div> <!-- .tm-page-wrap -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        function setVideoSize() {
            const vidWidth = 1920;
            const vidHeight = 1080;
            let windowWidth = window.innerWidth;
            let newVidWidth = windowWidth;
            let newVidHeight = windowWidth * vidHeight / vidWidth;
            let marginLeft = 0;
            let marginTop = 0;

            if (newVidHeight < 500) {
                newVidHeight = 500;
                newVidWidth = newVidHeight * vidWidth / vidHeight;
            }

            if(newVidWidth > windowWidth) {
                marginLeft = -((newVidWidth - windowWidth) / 2);
            }

            if(newVidHeight > 720) {
                marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
            }

            const tmVideo = $('#tm-video');

            tmVideo.css('width', newVidWidth);
            tmVideo.css('height', newVidHeight);
            tmVideo.css('margin-left', marginLeft);
            tmVideo.css('margin-top', marginTop);
        }

        $(document).ready(function () {
            /************** Video background *********/

            setVideoSize();

            // Set video background size based on window size
            let timeout;
            window.onresize = function () {
                clearTimeout(timeout);
                timeout = setTimeout(setVideoSize, 100);
            };

            // Play/Pause button for video background      
            const btn = $("#tm-video-control-button");

            btn.on("click", function (e) {
                const video = document.getElementById("tm-video");
                $(this).removeClass();

                if (video.paused) {
                    video.play();
                    $(this).addClass("fas fa-pause");
                } else {
                    video.pause();
                    $(this).addClass("fas fa-play");
                }
            });
        })
    </script>
    <script type="text/javascript">

function validateform() {

 var name = $("#name").val();
 var desc = $("#desc").val();

 
 var file = document.getElementById("image1");
 var file_name = file.value;
 var extension = file_name.split('.').pop().toLowerCase();
 var size      = file.files.length;
 
 
 var file1 = document.getElementById("file");
 var file_name1 = file1.value;
 var extension1 = file_name1.split('.').pop().toLowerCase();
 var size1      = file1.files.length;
 //alert(size);
 //alert(extension1);

 


if (name ==""  || desc =="" || extension !="png" || size =="0" || extension1 !="mp4" || size1 =="0" ){  
    
  if (name == "")       {    $('#err_name').removeClass("errmsg"); }
  if (desc == "")       {    $('#err_desc').removeClass("errmsg"); }
  if (extension !="png" || size == "0"){    $('#err_img').removeClass("errmsg"); }
  
  if (extension =="mp4" || size1 == "0"){    $('#err_video').removeClass("errmsg"); }
  
  //alert("hi");

return false;
} 
} 
</script> 
<script>
    $("#name").keyup(function()    {     $("#err_name").addClass("errmsg");        });
    $("#desc").keyup(function()    {     $("#err_desc").addClass("errmsg");        });
    $("#image1").change(function() {     $("#err_img").addClass("errmsg");         });
    $("#file").change(function()   {     $("#err_video").addClass("errmsg");       });
    
</script>
</body>
</html>



