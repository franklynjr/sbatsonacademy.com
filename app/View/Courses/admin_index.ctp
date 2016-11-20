<?php
$this->layout = "admin_default";
if(isset($categories)){
//print_r($categories);
    //echo $this->element('sidebar', array('categories'));
    ?>

<div id="categories-content">
    <?php
    if(!empty($category["Video"]))
    {
        foreach($category["Video"] as $video)
        {
            print $this->Html->link($video["title"], array(
                            'controller'=>'Videos',
                            'action' => 'watch',
                            $video['id']
            ));
             //'<h4>'.$video["title"].'</h4>';
            print '<p>'.$video["description"].'</p>';
        }
    }
    ?>
    
</div>
    <?php
    
}