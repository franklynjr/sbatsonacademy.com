<div id="category-list">
    
    <div id="sb-cat" class="container non-selectable ">    
        <ul class="nav nav-pills nav-stacked">
            <?php 
            if(!empty($courses)){

                foreach($courses as $course)
                {
                   //print_r($course);
    //                if(!empty($course["Course"]["name"])){
                        $cat = $course["Course"]["name"];
//                        $id = $cat.'_'. $course["Course"]["id"];
                        ?>
                    <li role="presentation">
                        <!--<div class="container" data-parent="#sb-cat" data-toggle="collapse" data-target="#<?php // echo str_replace( " ", "_",$id); ?>">-->
                        <div class="container">
                                <div class="category-container panel panel-default row">
                                    <div class="image-container col-md-1 col-xs-4">
                                        <a href="/courses/view/<?php echo strtolower($cat); ?> ">
                                            <img class="course-image"<?php echo 'src="'.$course["Course"]['image'].'" alt="'.$cat .'"'; ?> />
                                        </a>
                                    </div>
                                    <div class="category-description-container col-md-11  col-xs-8">
                                        <div>
                                            <div class="category-title  col-md-9">
                                                <a href="/courses/view/<?php echo $course["Course"]["id"]?> "> 
                                                    <h5><?php echo $cat; ?></h5>
                                                </a>
                                            </div>
                                            <div class="category-summary  col-md-3">
                                                <div class="col-md-6 col-xs-6 summary-text"><span class="glyphicon glyphicon-list-alt"></span> 
                                                    <span><?php echo count($course["Topic"]);?></span>
                                                </div>
                                                <div class="col-md-6 col-xs-6 summary-text"><span class="glyphicon glyphicon-facetime-video"></span> 
                                                    <span><?php echo $this->Course->countVideos($course["Topic"]);?></span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="category-description">
                                            <div class="col-lg-12 category-description-text"><p><?php echo $course["Course"]['description']; ?></p></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </li>
               <?php
               }
            }  ?>
        </ul>
    </div>
</div>