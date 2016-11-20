<div id="category-list">
    <div id="sb-cat" class="container-fluid non-selectable ">    
        <ul class="nav nav-pills nav-stacked">
            <?php 
            
            if(!empty($topics)){

                foreach($topics as $topic)
                {
                   //print_r($topic);
    //                if(!empty($topic["Topic"]["name"])){
                        $cat = $topic["Topic"]["name"];
                        $id = $cat.'_'. $topic["Topic"]["id"];
                        ?>
                    <li role="presentation">
                        <div class="container-fluid" data-parent="#sb-cat" data-toggle="collapse" data-target="#<?php echo $id; ?>">
                                <div class="category-container row" style="cursor: default">
                                    <div class="image-container col-md-1 col-xs-4">
                                        <a href="/topics/view/<?php echo strtolower($cat); ?> ">
                                            <img <?php echo 'src="'.$topic["Topic"]['image'].'" alt="'.$cat .'"'; ?> />
                                        </a>
                                    </div>
                                    <div class="category-description-container col-md-11 col-xs-8">
                                        <div>
                                            <div class="category-title col-md-9">
                                                <a href="/topics/view/<?php echo strtolower($cat); ?> "> 
                                                    <h5><?php echo $cat; ?></h5>
                                                </a>
                                            </div>
                                            <div class="category-summary col-md-3">
                                                <div class="col-xs-6 summary-text">
                                                    <span class="glyphicon glyphicon-facetime-video">
                                                    <span><?php echo $topic["Topic"]['video_count'];?></span>
                                                </div>
                                                <div class="col-xs-6 summary-text">
                                                    <span class="glyphicon glyphicon-hourglass"></span> 
                                                    <span><?php echo $topic["Topic"]['video_length'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="category-description">
                                            <div class="col-lg-12 category-description-text"><?php echo $topic["Topic"]['description']; ?></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <hr />
                    </li> 
            <?php }} ?>
        </ul>
    </div>
</div>