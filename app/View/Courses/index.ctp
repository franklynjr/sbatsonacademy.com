<div id="categories-content">
    <?php
    
    if(isset($courses)){
        
        echo $this->element('courses', array('courses'));

//        if(!empty($category["Video"]))
//        {
//            foreach($category["Video"] as $video)
//            {
//                print $this->Html->link($video["title"], array(
//                                'controller'=>'Videos',
//                                'action' => 'watch',
//                                $video['id']
//                ));
//                 //'<h4>'.$video["title"].'</h4>';
//                print '<p>'.$video["description"].'</p>';
//            }
//        }
    }
    ?>
    
</div>
    <?php
    
