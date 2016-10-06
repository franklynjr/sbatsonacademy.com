
<ul class="col-lg-10">
    
<?php

//$this->layout = 'admin_default';
//print_r($topics);
foreach($topics as $topic)
{
    //    print_r($topic);
    //    if($topic['Topic']['name'] == 'English Language Art')
    //        print_r($topic);
    ?>
        <li>

            <div>
                <div class="col-xs-12 col-md-10"><span><?php echo $topic['Topic']['name']; ?></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/topics/edit/<?php echo $topic['Topic']['id']; ?>">edit</a></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/topics/delete/<?php echo $topic['Topic']['id']; ?>">delete</a></span></div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>