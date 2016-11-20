
<ul class="col-lg-10">
    
<?php

foreach($courses as $course)
{
    ?>
        <li>

            <div>
                <div class="col-xs-12 col-md-10"><span><?php echo $course['Course']['name']; ?></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/courses/edit/<?php echo $course['Course']['id']; ?>">edit</a></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/courses/delete/<?php echo $course['Course']['id']; ?>">delete</a></span></div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>