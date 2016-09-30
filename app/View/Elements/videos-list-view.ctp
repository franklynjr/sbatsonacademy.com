
<ul class="col-lg-10">
    
<?php

//$this->layout = 'admin_default';
//print_r($topics);
foreach($topics as $topic)
{
//    print_r($topic);
//    if($topic['Topic']['name'] == 'English Language Art')
//        print_r($topic);
    if(count($topic['Video']) < 1)
    {
        echo '<li><h4>' . $topic['Topic']['name']."</h4><span class=\"error-text\">You have not assigned any video tutorials to this topic. "
                                    . "Click {$this->Html->link('here', ['controller'=>'Videos', 'action'=>'upload'])} to add a video.</span></li>
                                    <div class=\"seporator\"></div>";
    }  else {
        echo '<li><h4>' . $topic['Topic']['name']. '</h4></li>'; ?>
    <ul>
        <?php
        foreach($topic['Video'] as $video)
        {?>
            <li>
                    
                <div>
                    <div class="col-xs-12 col-md-10"><span><?php echo $video['title']; ?></span></div>
                    <div class="col-xs-6 col-md-1"><span><a href="/admin/videos/edit/<?php echo $video['id']; ?>">edit</a></span></div>
                    <div class="col-xs-6 col-md-1"><span><a href="/admin/videos/delete/<?php echo $video['id']; ?>">delete</a></span></div>
                </div>  
            </li>
            <br />
            <hr/>
            <?php
                //echo $video['title'] . '<br />';            
        }
        ?>
    </ul><?php
      //echo '<div class="seporator"></div>';
    }
}
?>

</ul>