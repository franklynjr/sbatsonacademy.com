
<?php 
//print_r($topic);

//    print_r($videos);
//$this->layout = 'blank';
if(!empty($video)) { ?>

<div class="container">
    <!--<div class="row-space-1 section"></div>-->
<!--    <div class="row">
        <div class="w-theme-button back col-md-3 col-xs-12">
            <div class="back-arrow-img col-xs-2 col-md-2">
                <a href="/topics/view/<?php echo $topic['name']; ?>" alt="<?php echo $topic['name']; ?>">
                    <img src="/img/back-arrow.png" alt="back" />
                </a>
            </div>
            <div class="col-xs-10">
                <a href="/topics/view/<?php echo $topic['name']; ?>" alt="<?php echo $topic['name']; ?>">
                    <div class="back-to-category button"><span><?php echo $topic['name']; ?></span></div>
                </a>
            </div>
        </div>
    </div>-->
    <!--<hr />-->
    
    <div class="row watch-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><h2 id="video-title"><?php echo $video['title']?></h2></div></div>
            <div id="player" class="row">
                <div class="col-lg-9">
                <video id="video" class="video-js vjs-sublime-skin watch-video watch-video" controls> </video>
                <div class="watch-video-description"><span id="video-description"><?php echo $video['description']; ?></span></div>

        <!--    <div class="row">
                <div class="seporator"></div>
                    <h2><?php echo $video['title']?></h2>
                <div class="seporator"></div>
                </div>
                <div class="row">
                    <p class="watch-description"><?php echo $video['description']; ?></p>
                </div>-->
                <?php
                    //print "<p>" .$file . "</p><br />";
                    //            print '<video id="video" autoplay="true" class="video-js vjs-sublime-skin watch-video" controls preload="auto" '
                    //                . 'data-setup="{}"><source id="video-source" ></video>';
                    //              print '<video id="video" class="video-js vjs-sublime-skin watch-video" controls preload="auto" '
                    //                . 'data-setup="{}"></video>';

                  ?>  
                </div>
                <div class="col-lg-3">

                <div class="row">
                    <!--<div class="seporator"></div>-->
                    <h4 class="playlist-h4"> <a href="/topics/view/<?php echo $topic['name']; ?>"> <?="{$topic['name']}"; ?></a></h4>
                    <div class="seporator"></div>
                <!-- The playlist menu will be built automatically in here: -->
                <ol class="vjs-playlist"></ol>
                </div>
                        <?php
                            echo isset($currentItem) ? "self.player.playlist.currentItem($currentItem);" : "";
                            ?>
                </div>
            </div>
        
<!--        <div class="row">
            <div>
               <button class="previous">Previous</button>
            </div>
            <div>
                <button class="next">Next</button>
            </div>
        </div>-->
        
        
<!--        <div class="row hidden-lg">
            <div class="col-lg-6 col-xs-6">
               <button class="btn btn-default previous">Previous</button>
            </div>
            <div class="col-lg-6 col-xs-6">
                <button class="btn btn-default next">Next</button>
            </div>
        </div>-->

    </div>

</div>

</div>
<script src="/js/lib/video.js"></script>   
<script src="/js/lib/videojs-playlist.min.js"></script>
<script src="/js/lib/videojs-playlist-ui.js"></script>

<!--<script src="/js/videojs-media-sources.js"></script>-->  


<script>
    
<?php
    //print_r($videos)
// Create Playlist
    if(isset($videos) && !empty($videos))
    {
        $sources = "";
        $currentItem = null;
        
        //generate the playlist sources
        foreach($videos as $_video){
            $sources .= "
            {   name: \"{$_video['name']}\",
                id: \"{$_video['id']}\",
                description: \"{$_video['description']}\",
                duration: 50,
                sources: [{
                            src: \"{$_video['path']}\",
                            type: \"video/mp4\"
                          }]
            },";

        if($video['id'] == $_video['id'])
        {
            $currentItem = $_video['data-value'];
        }
    }
    
    
    echo 'var videoList = [' .$sources . '];';
    
    }
?>


    var self = this;
    var video = document.getElementById('video');    
    self.player = videojs(document.querySelector('video'), {
      inactivityTimeout: 0
    });

 

    self.player.playlist(videoList);
    self.player.playlistUi();
    self.player.playlist.autoadvance(0);
    
    self.lastUpdate = 0;
    

    
    $(video).on('play',  function(e){
        $(video).off('timeupdate');
        
        $(video).on('timeupdate',  function updateUserProgress(e){
        //console.log('/videos/progress/<?=$user['User']['id']?>/'+self.player.playlist()[self.player.playlist.currentItem()]['id']+'/'+e.target.currentTime);
    //    console.log(self.player.playlist()[self.player.playlist.currentItem()]['id']);
        var currentTime = e.target.currentTime;
        
        $("#video-title").html(self.player.playlist()[self.player.playlist.currentItem()]['name']);
        $("#video-description").html(self.player.playlist()[self.player.playlist.currentItem()]['description']);
        
        if((Number(currentTime)-self.lastUpdate) > 5){
            $.ajax('/videos/progress/<?=$user['User']['id']?>/'+self.player.playlist()[self.player.playlist.currentItem()]['id']+'/'+e.target.currentTime);
            self.lastUpdate = currentTime;
        }

    });
    });
    
    <?php
    
    echo isset($currentItem) ? "self.player.playlist.currentItem($currentItem);" : "";
    ?>
        
        
//        getVideo('<?php echo $path;?>', function(data)
//        {
////            video.src = URL.createObjectURL(data);
//        
//            video.src = window.URL.createObjectURL(data);
//
//        });
//   document.querySelector('.previous').addEventListener('click', function() {
//      player.playlist.previous();
//    });
//
//     document.querySelector('.next').addEventListener('click', function() {
//      player.playlist.next();
//    }); 
    
    
    
///videos/stream/ed55b5cfc3d87803b7862779e69f343d?sid=12660b624e9c7193631d2a10eac2373e097db391a65cd54eac1586d94855e673

function getVideo(url, callback){

  var req = new XMLHttpRequest();

  req.open('GET', url, true);
  req.responseType = 'arraybuffer';
  req.onload = function(){
        var blob = new Blob([req.response]);
        
        //var byte = new Uint8Array(req.response);

//        video.src = blob;
          callback(blob);

  };
  req.send(null);
}


</script>

<!--  <script>
  var video,
      req = new XMLHttpRequest();
  videojs.options.flash.swf = "video-js.swf";
  video = videojs('video');
  req.open('GET', '/files/test.mp4', true);
  req.responseType = 'arraybuffer';
  req.onload = function(){
    var mediaSource = new videojs.MediaSource(),
        bytes = new Uint8Array(req.response);
    mediaSource.on('sourceopen', function(event){
      var sourceBuffer = mediaSource.addSourceBuffer('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
      sourceBuffer.appendBuffer(bytes, video);
    });
    video.src({ 
      src: videojs.URL.createObjectURL(mediaSource), 
      type: "video/mp4"
    });
  };
  req.send(null);
  </script>-->

<style>
    .video-dimensions{
        width: 100%;
        height: 100%
    }
</style>

<?php }
    echo $this->Html->css('player');
    