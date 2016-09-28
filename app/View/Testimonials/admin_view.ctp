<div class="container">
<div class="row-space-1"></div>
<div class="row">
    <div class="col-lg-6 col-md-6 hidden-xs hidden-sm"><span><h3>Testimonials</h3></span></div><div class="col-lg-2 col-md-2 col-xs-12  col-sm-12 w-theme-button top-button"><span><a href="/admin/testimonials/add">Add a Testimonials</a></span></div>
</div>
<div class="row">
    <div class="col-lg-6 hidden-lg hidden-md"><span><h3>Testimonials</h3></span>
</div>

<hr />
<?php
echo $this->element('admin-testimonials-list');

?>
</div>
</div>


<style>
    .admin-testimonial-line{
        text-decoration: none;
        color: #000;
    }
    
    .admin-testimonial-line a{
        text-decoration: none;
        color: #000;
    }
    .admin-testimonial-line :hover{
        text-decoration: none;
    }
    .admin-testimonial-line-description{
        
        line-height: 1.2em;
        max-height: 60px;
        overflow: hidden;
    }
    .delete-text{
        color:red;
        text-align: center;
    }
    .delete-testimonial-icon{
        width: 32px;
        height: 32px;
    }
    
    .delete-testimonial{
        display: none;
    }    
    
    

    
 </style>
 
 <script>
     $('.admin-testimonial-line')
              $('.admin-testimonial-line').on('mouseleave', function(e)
                {
                 $(this).find('.delete-testimonial').css('display', 'none');
                });
                
             $('.admin-testimonial-line').on('mouseenter', function(e)
             {
                $(this).find('.delete-testimonial').css('display', 'block');
             });
 </script>