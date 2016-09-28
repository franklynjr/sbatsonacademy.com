
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

            <div class="admin-testimonial-line">
                <div class="row">
                    <div class="col-xs-6"><span>Id:</span><span> <?=$testimonial["Testimonial"]['id'] ?></span></div>
                    <div class="col-xs-6"><span>Name:</span><span> <?=$testimonial["Testimonial"]['name'] ?></span></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-11 admin-testimonial-line-description">
                        <span>
                            <a href="/admin/Testimonials/edit/<?php echo $testimonial['Testimonial']['id'] ?>">
                                <?php echo $testimonial['Testimonial']['title'] . substr($testimonial['Testimonial']['description'], 0,255)  ; ?>
                            </a>
                        </span>
                    </div>
                    <!--<div class="col-xs-6 col-md-1"><span><a href="/admin/Testimonials/edit/<?php echo $testimonial['Testimonial']['id'] ?>">edit</a></span></div>-->
                    <div class="col-xs-6 col-md-1 delete-testimonial"><span><a href="/admin/Testimonials/delete/<?php echo $testimonial['Testimonial']['id']; ?>"><img class="delete-testimonial-icon" src="/img/testimonial-delete-icon.png" alt="delete" /> <span class="delete-text">delete</span></a></span></div>
                </div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>
