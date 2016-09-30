
<?php

if(isset($video)){ ?>

    <div class="video-list-container">
        <div class="row">
            <div class="col-md-2 col-xs-5 category-image">
                <?php 
                    if(isset($user)){ ?>
                        <a class="topic-video-thumbnail" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#"   onclick="(function update(){ $(\'#AppRedirect\').val(\'' .$redirect . '\');})()" data-toggle="modal" data-target="#subscription-box"')?> >
                             <img src=<?php echo (empty($video["thumbnail"]) ? "/img/video-icon.png" : '"' . $video["thumbnail"].'"') ?> alt="video-icon"/>
                         </a>
                <?php
                        }else { ?>
                            <a  class="topic-video-thumbnail"  <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#"   onclick="(function update(){ $(\'#AppRedirect\').val(\'' .$redirect . '\');})()"  data-toggle="modal" data-target="#login-box"')?> >
                                <img src=<?php echo (empty($video["thumbnail"]) ? "/img/video-icon.png" : '"' . $video["thumbnail"].'"') ?> alt="video-icon"/>
                            </a>
                        <?php } ?>
            </div>
            
            <div class="col-md-10  col-xs-7 video-title-discription">
                <div class="video-title">
                    <?php 
                        if(isset($user)){ ?>
                            <a <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#" data-toggle="modal" data-target="#subscription-box"')?> ><h5><?php echo $video["title"]; ?></h5></a>
                    <?php
                        }else
                        { ?>
                            <a <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#"  onclick="(function update(){ $(\'#AppRedirect\').val(\'' .$redirect . '\');})()" data-toggle="modal" data-target="#login-box"')?> ><h5><?php echo $video["title"]; ?></h5></a>
                        <?php
                            }
                        ?>
                </div>
                <div class="video-discription"><?php 
                   echo $video["description"]; 
                    ?>
                </div>
                 <div class="video-information hidden-xs">
                    <div class="">
                        <div class="col-xs-5 col-lg-3 video-information-text"><span><?=date_format(new DateTime($video["created"]),'M j, Y'); ?></span></div>
                        <div class="col-xs-5 col-lg-3 video-information-text"><?=$video['length']?></div>
                        <div class="col-xs-2 col-lg-2 video-information-text"><?='0%'?></div>
                        <div class="col-xs-12 col-lg-4 video-information-text">
                            <div class="no-padding col-xs-12"><?php 
                            if(isset($user)){ ?>
                                <a class="watch-now-btn btn" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#" data-toggle="modal" data-target="#subscription-box"')?> ><span>watch now</span></a>
                            <?php
                                }else
                                { ?>
                                    <a class="watch-now-btn btn" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#"   onclick="(function update(){ $(\'#AppRedirect\').val(\'' .$redirect . '\');})()"  data-toggle="modal" data-target="#login-box"')?> ><span>watch now</span></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
   </div>

        <div class="video-information hidden-md hidden-lg  hidden-sm">
            <div class="row">
                <div class="col-xs-5 col-lg-3 video-information-text"><span><?=date_format(new DateTime($video["created"]),'M j, Y'); ?></span></div>
                <div class="col-xs-5 col-lg-3 video-information-text"><?=$video['length']?></div>
                <div class="col-xs-2 col-lg-2 video-information-text"><?='0%'?></div>
                </div>
            <div class="row">
                <div class="col-xs-12 col-lg-4 video-information-text">
                    <div class="no-padding col-xs-12"><?php 
                    if(isset($user)){ ?>
                        <a class="watch-now-btn btn" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#" data-toggle="modal" data-target="#subscription-box"')?> ><span>watch now</span></a>
                    <?php
                        }else
                        { ?>
                            <a class="watch-now-btn btn" <?php echo ($is_subscribed? 'href="/videos/watch/'.$video['id'] .'" ':'href="#"    onclick="(function update(){ $(\'#AppRedirect\').val(\'' .$redirect . '\');})()" data-toggle="modal" data-target="#login-box"')?> ><span>watch now</span></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

  
    </div>
