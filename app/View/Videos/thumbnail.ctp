
<style>
    #canvas {
        background: black;
        width: 100%;
}
</style>
<div class="container">
    <div>
        <h2><?php //echo $video['title'];?></h2>
    </div>
    <script>
    function getVideoPosition()
    {
        var video = document.getElementById("video");
        var canvas =  document.getElementById("canvas");
        var image =  document.getElementById("image");
        
        var time = video.currentTime;
        document.getElementById("position").innerHTML = time;
        document.getElementById("time").value = time;
        
        var context = canvas.getContext("2d");
        
        draw(video,context,canvas.width,canvas.height);
        image.value = canvas.toDataURL();
    }
    
    function draw(v,c,w,h) {
    //if(v.ended) return false;
    c.drawImage(v,0,0,w,h);
    setTimeout(draw,20,v,c,w,h);
}
    
    </script>
    <div>
        <div class="row">
            <div class="col-lg-6">
            <?php
              //print "<p>" .$file . "</p><br />";
              print '<canvas id="canvas"></canvas>';
            ?> 
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-6">
            <?php
              //print "<p>" .$file . "</p><br />";
              print '<video onseeking="getVideoPosition()" ontimeupdate="getVideoPosition()" '
                  . 'id="video" class="watch-video" controls><source src="'.$path.'" type="video/mp4"></video>';
              ?>  
            </div>
        </div>
<!--        <div class="row">
            <div class="col-lg-6">
                <img id="image" src="" alt="image"/>
            </div>
        </div>-->
        <div class="row"><p class="watch-description"><?php //echo $video['description']; ?></p></div>
    </div>
    <div><span>Position: </span><span id="position"></span></div>
    
    
    <form method="post" action="/Videos/thumbnail/<?php echo $id; ?>">
        
        <input type="hidden" id="time" name="time" id="data[time]" value="0" />
        <input type="hidden" id="image" name="image" id="data[image]" value="" />
    <input type="submit" onmousedown="getVideoPosition()" value="Save Thumbnail" />
    
    </form>
    
</div>