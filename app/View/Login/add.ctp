<div class="row-space-2"></div>
<?php


echo $this->Form->create("User"); ?> 
<div class="col-lg-6"> <?php
    echo $this->Form->input("firstname", ["class"=>"form-control", "div"=>["class"=>"form-group"]]); ?>
</div><div class="col-lg-6"> <?php
echo $this->Form->input("lastname", ["class"=>"form-control", "div"=>["class"=>"form-group"]]);?>
</div>
<div class="col-lg-12"> <?php
echo $this->Form->input("email", array("type"=>"email", "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->input("phone",  array("type"=>"tel", "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo '<br /><hr /><br />';
echo $this->Form->input("username", ["class"=>"form-control", "div"=>["class"=>"form-group"]]);
echo $this->Form->input("password", array("type"=>"password", "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->input("Confirm", array("type"=>"password", "class"=>"form-control", "div"=>["class"=>"form-group"]));
echo $this->Form->end("Register");
?>
</div>