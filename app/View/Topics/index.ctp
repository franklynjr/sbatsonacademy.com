<?php

if(isset($topics)){
//print_r($topics);
//echo $this->element('sidebar');
    
    ?>
<div id="topics-content">
    
    <div  class="container">
        <div class="row-space-1 section"></div>
        <?php 
             if($topics['Topic']){ 
            ?>
      
        <div class="w-theme-button back col-md-3 col-xs-12">
            <div class="back col-md-2 col-xs-12">
                <a href="/courses/view/<?php echo $topics["Course"]["id"]; ?>">
                    <img src="/img/back-arrow.png" alt="back" />
                </a>
            </div>
            <div class="col-xs-10">
                <a href="/courses/view/<?php echo $topics["Course"]["id"]; ?>">
                    <?php echo $topics["Course"]["name"]; ?>
                </a>
            </div>
        </div>
        
        <div class="category-header col-md-8 col-xs-12"><h4><?php print $topics['Topic']['name']?></h4></div>
            <?php
        }
        ?>
    </div>
    
<div class="container">
<hr />
<?php 
    
    if($topics['Topic']){ ?>
       
    <?php
    if(!empty($topics["Video"]))
    {
        foreach($topics["Video"] as $video)
        {
            print   $this->element('video-list-block', ['video'=>$video]) . '<hr />';
           
        }
    }
    }else{
        if(!empty($topics["Subcategory"]))
        {
            //$topics = $topics["Subcategory"];
            print   $this->element('subtopics', ['subtopics'=>$subtopics]) . '<hr />';

            
        }
    }
    ?>
    
</div>
</div>
    <?php
    
}