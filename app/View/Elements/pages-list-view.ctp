
<ul class="col-lg-10">
    
<?php

//$this->layout = 'admin_default';
//print_r($topics);
foreach($pages as $page)
{
//        print_r($page);
    //    if($topic['Topic']['name'] == 'English Language Art')
    //        print_r($topic);
    ?>
        <li>

            <div>
                <div class="col-xs-12 col-md-10"><span><?php echo $page['name']; ?></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/pages/edit/<?php echo $page['id']; ?>">edit</a></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/pages/delete/<?php echo $page['id']; ?>">delete</a></span></div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>