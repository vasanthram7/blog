<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>
  <video
    id="videoPlayer"
    class="video-js vjs-big-play-centered"
    muted
    controls
    preload="auto"
    width="1240"
    height="464"
    poster="MY_VIDEO_POSTER.jpg"
    
    data-setup="{}"
  >
    <source src="{{ asset('storage/upload/' . $video->videoName) }}" type="video/mp4" />
    
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

  <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
  <script src="https://cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
  <script type="text/javascript" src="{{ asset('storage/video-player.js') }}"></script>
  
</body>

</html>