<?php
if(isset($categories)){
//print_r($categories);
//echo $this->element('sidebar');
    
    ?>
<div id="categories-content">
    
    <div  class="container">
        <?php 
        if($category['Category']['parent_id'] == 0){ 
            ?>
        <a href='/categories'> << Courses</a>
        <?php }else{
            ?>
        
        <div class="back col-md-3 col-xs-3">
            <a href="/categories/view/<?php echo $parent["Category"]["id"]; ?>">
                <?php echo "<< ".$parent["Category"]["name"]; ?>
            </a>
        </div>
        
        <div class="category-header col-md-9 col-xs-9"><h4><?php print $category['Category']['name']?></h4></div>
            <?php
        }
?>
    </div>
    
<div class="container">
<hr />
<?php 
    if($category['Category']['parent_id'] != 0){ ?>
       
    <?php
    if(!empty($category["Video"]))
    {
        foreach($category["Video"] as $video)
        {
            print   $this->element('video-list-block', ['video'=>$video]) . '<hr />';
           
        }
    }
    }else{
        if(!empty($category["Subcategory"]))
        {
            //$categories = $category["Subcategory"];
            print   $this->element('subcategories', ['subcategories'=>$subcategories]) . '<hr />';

            
        }
    }
    ?>
    
</div>
</div>
    <?php
    
}