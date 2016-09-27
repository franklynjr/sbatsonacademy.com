<div id="category-list">
    
    <div id="sb-cat" class="container non-selectable ">    
        <ul class="nav nav-pills nav-stacked">
            <?php 
            if(!empty($categories)){

                foreach($categories as $category)
                {
                   //print_r($category);
    //                if(!empty($category["Category"]["name"])){
                        $cat = $category["Category"]["name"];
                        $id = $cat.'_'. $category["Category"]["id"];
                        ?>
                    <li role="presentation">
                        <div class="container" data-parent="#sb-cat" data-toggle="collapse" data-target="#<?php echo $id; ?>">
                                <div class="category-container panel panel-default row">
                                    <div class="image-container col-lg-3 col-xs-4">
                                        <!--<a href="/categories/view/<?php echo strtolower($cat); ?> ">-->
                                            <img <?php echo 'src="'.$category["Category"]['image'].'" alt="'.$cat .'"'; ?> />
                                        <!--</a>-->
                                    </div>
                                    <div class="category-description-container col-lg-9  col-xs-8">
                                        <div class="category-title panel-heading">
                                            <!--<a href="/categories/view/<?php echo strtolower($cat); ?> "> -->
                                                <h3><?php echo $cat; ?></h3>
                                            <!--</a>-->
                                        </div>
                                        <div class="category-summary panel-body">
                                            <div class="col-lg-6 col-xs-6 summary-text"><span>Topics: </span> 
                                                <span><?php echo count($category["Subcategory"]);?></span>
                                            </div>
                                            <div class="col-lg-6 col-xs-6 summary-text"><span>Tutorials: </span> 
                                                <span><?php echo $this->Category->countVideos($category["Subcategory"]);?></span>
                                            </div>
                                        </div>
                                        <div class="category-description">
                                            <div class="col-lg-12 category-description-text"><p><?php echo $category["Category"]['description']; ?></p></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            
            
            
                        <div id="<?php echo $id ?>" class="subcategory-container container  panel-collapse collapse">
                            <?php

                            if(!(empty($category["Subcategory"]))){ ?>
                                <ul  class="panel-footer nav-pills nav-stacked">
                                    <?php
                                       foreach($category["Subcategory"] as $subcategory)
                                        {
                                           $sub = $subcategory["name"]; ?>
                                            <li>
                                                <a href="/categories/view/<?php echo strtolower($sub); ?> ">
                                                    <h3><?php echo $sub; ?></h3>
                                                </a>
                                            </li>
                                    <?php
                                        }
                                        ?>
                                            
                                </ul> <?php
                            }
                }
            } ?>
                            
                        </div>
        </ul>
    </div>
</div>