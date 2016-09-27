
<ul class="col-lg-10">
    
<?php

//$this->layout = 'admin_default';
//print_r($topics);
foreach($testimonials as $testimonial)
{
    //    print_r($topic);
    //    if($topic['Topic']['name'] == 'English Language Art')
    //        print_r($topic);
    ?>
        <li>

            <div>
                <div class="col-xs-12 col-md-10"><span><?php echo $testimonial['Testimonial']['name'] . ($testimonial['Testimonial']['title'] == "" ? "" : " - {$testimonial['Testimonial']['title']}"); ?></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/Testimonials/edit/<?php echo $testimonial['Testimonial']['id']; ?>">edit</a></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/Testimonials/delete/<?php echo $testimonial['Testimonial']['id']; ?>">delete</a></span></div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>