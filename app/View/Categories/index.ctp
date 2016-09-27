

<div id="categories-content">
    <?php
    
    if(isset($categories)){
        
        echo $this->element('categories', array('categories'));

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
    
