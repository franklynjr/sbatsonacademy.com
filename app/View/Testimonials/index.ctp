<div class="content">
    

<?php

//todo: create page header variable
print "<h3>What Our Past and Current Students/Parents Are Saying</h3>";

if(isset($testimonials))
{
    foreach($testimonials as $testimonial)
    {
        ?>
            <div  class="row user-testimonial"  id="<?='testimonial_'.$testimonial["Testimonial"]['id'] ?>">
                <div class="col-md-9 testimonial-content">
                    <div><h4><?=$testimonial['Testimonial']['title'] ?></h4></div>
                    <hr class="testimonial-hr"/>
                    <div><span><?=$testimonial['Testimonial']['description'] ?></span></div>
                </div>
                
                <div class="col-md-3">
                    <div>
                        <div class="user-image"></div>
                        <div><span><?=$testimonial['Testimonial']['name'] ?></span></div>
                        <div><span><?=$testimonial['Testimonial']['created'] ?></span></div>
                    </div>
                </div>
            </div>
    <hr />
<?php
    }
}
?>

</div>
