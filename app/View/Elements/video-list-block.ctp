<?php
if(isset($video)){ ?>

    <div class="video-list-container">
        <div class="row">
            <div class="col-md-3 col-xs-12 category-image">
                 <a class="thumbnail" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#" data-toggle="modal" data-target="#subscription-box"')?> >
                     <img src=<?php echo (empty($video["thumbnail"]) ? "/img/video-icon.png" : '"' . $video["thumbnail"].'"') ?> alt="video-icon"/>
                 </a>
            </div>
            
            <div class="col-md-9  col-xs-12 video-title-discription">
                <div class="video-title">
                    <a <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#" data-toggle="modal" data-target="#subscription-box"')?> ><h4><?php echo $video["title"]; ?></h4></a></div>
                <div class="video-discription  hidden-sm hidden-xs"><p><?php 
                if(count($video["description"] > 300))
                    echo substr ($video["description"], 0, 300) . "...";
                else
                    echo $video["description"]; ?></p></div>
                <div class="video-discription hidden-md hidden-lg"><p><?php 
                if(count($video["description"] > 150))
                    echo substr ($video["description"], 0, 150) . "...";
                else
                    echo $video["description"]; ?></p></div>
            </div>
        </div>
    </div>

<?php } ?>