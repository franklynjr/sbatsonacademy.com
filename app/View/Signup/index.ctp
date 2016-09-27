<div class="container">
    
<div class="row-space-1"></div>
<div class="container">
    <div class="col-lg-12"><h4>Create an Account</h4></div>
</div>
    
<div class="row-space-1"></div>
<?php


        
echo $this->Form->create("User"); ?> 
<div class="col-lg-6"> <?php
    echo $this->Form->input("firstname", ["class"=>"form-control",  "required","div"=>["class"=>"form-group"]]); ?>
</div><div class="col-lg-6"> <?php
echo $this->Form->input("lastname", ["class"=>"form-control",  "required","div"=>["class"=>"form-group"]]);?>
</div>
<div class="col-lg-12"> <?php
echo $this->Form->input("email", array("type"=>"email", "required", "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->input("phone",  array("type"=>"tel", "required","class"=>"form-control", "div"=>["class"=>"form-group"]));
echo '<br /><hr /><br />';
echo $this->Form->input("Login.username", ["class"=>"form-control",  "required", "minlength"=>4, "div"=>["class"=>"form-group"]]);
echo $this->Form->input("Login.password", array("type"=>"password","required","minlength"=>7, "class"=>"form-control", "div"=>["class"=>"form-group"]));
//echo $this->Form->input("Confirm", array("type"=>"password", "required","minlength"=>7,"class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->end("Register");
?>
</div>

</div>

<script>
$('#LoginUsername').on('keyup focusout focusin', function(e)
{
   // console.log($(e.target).val());
    var url = '/users/exists/' + $(e.target).val()+ '.json';
    $.ajax({ url: url,
                accepts: 'application/json',
                success:function(data){
                    if(data.exists)
                    {
                        $(e.target).addClass('username-error');
                        $(e.target).removeClass('username-valid');
                        
                    }else
                    {
                        
                        $(e.target).removeClass('username-error');
                        $(e.target).addClass('username-valid');
                    }
    }});
});


</script>

<style>
    
    .username-error{
        border: 2px solid red;
    }    
     .username-error:active{
        border: 2px solid red;
    }   
     .username-error:focus{
        border: 2px solid red;
    }  
    
    .username-valid{
        border: 2px solid green;
    }
    .username-valid:focus{
        border: 2px solid green;
    }
    .username-valid:active{
        border: 2px solid green;
    }

</style>