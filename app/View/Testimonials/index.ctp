<?php
//print_r($testimonials);
if(isset($testimonials))
{
    foreach($testimonials as $testimonial)
    {
        ?>
            <div>
                <div><span><?=$testimonial['Testimonial']['title'] ?></span></div>
                <div><span><?=$testimonial['Testimonial']['description'] ?></span></div>
                <div>
                    <div><span><?=$testimonial['Testimonial']['name'] ?></span></div>
                </div>
            </div>
<?php
    }
}