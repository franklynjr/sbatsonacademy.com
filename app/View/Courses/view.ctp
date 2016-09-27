
<?php
if(isset($topics)){
//print_r($categories);
//echo $this->element('sidebar');
    
    ?>

<div class="page-header-container">
    <div class="page-header-content" style="<?="background-image:url('{$course['Course']['banner']}')"?>">
    <div class="page-header-content-container-background-overlay">
    </div>
    <div class="page-header-content-container">
        <div class="page-header-content-text">
            <div class="page-header-title"><h4><?php print $course['Course']['name']?></h4></div>
            <div class="topic-header-description hidden-xs"><p><?php print $course['Course']['description']?></p></div>
        </div>
    </div>
    </div>
</div>
<div id="categories-content">
    
<!--    <div  class="container">
        <div class="w-theme-button back col-md-3 col-xs-2">
            <div class="back-arrow-img col-md-2 col-xs-12">
                <a href="/courses/">
                    <img class="back-arrow" src="/img/back-arrow.png" alt="back" />
                </a>
            </div>
            <div class="col-md-10 hidden-xs">
                <a href="/courses/">
                    Courses
                </a>
            </div>
        </div>
        <div class="category-header col-md-8 col-xs-10"><h4><?php print $course['Course']['name']?></h4></div>
        
    </div>-->
    
<div class="courses-container">

<?php 
           $this->assign('title', 'Course - ' . $course['Course']['name']);
            //$categories = $category["Subcategory"];
            print   $this->element('topics', ['topics'=>$topics]) . '<hr />';

            
        
        
    
    ?>
    
</div>
</div>
    <?php
    
}
