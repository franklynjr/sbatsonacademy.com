<?php
$this->layout = 'admin_default';

if(isset($categories)){
//print_r($categories);
  //echo $this->element('sidebar');
    ?>
<div id="categories-content">
    <div class="category-header"><h1><?php print $category['Category']['name']?></h1></div>
<div>
<hr />
<div class="row-space-2"></div>
    <?php
    
    if(!empty($category["Video"]))
    {
        foreach($category["Video"] as $video)
        {
            print   $this->element('video-list-block', ['video'=>$video]) . '<hr />';
           
        }
    }
    ?>
    
</div>
</div>
    <?php
    
}