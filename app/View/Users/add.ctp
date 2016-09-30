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
echo $this->Form->input("username", ["class"=>"form-control",  "required", "minlength"=>4, "div"=>["class"=>"form-group"]]);
echo $this->Form->input("password", array("type"=>"password","required","minlength"=>7, "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->input("Confirm", array("type"=>"password", "required","minlength"=>7,"class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->end("Register");
?>
</div>

</div>