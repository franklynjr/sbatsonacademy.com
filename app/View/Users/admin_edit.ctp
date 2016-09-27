<div class="row-space-2"></div>
<?php
$this->layout = 'admin_default';

echo $this->Form->create("User");
echo $this->Form->input("firstname");
echo $this->Form->input("lastname");
echo $this->Form->input("email", array("type"=>"email"));
echo $this->Form->input("phone",  array("type"=>"tel"));
//echo '<br /><hr /><br />';
echo $this->Form->input("role_id");
echo $this->Form->input("username");
echo $this->Form->input("id", ['type'=>'hidden']);
//echo $this->Form->input("password", array("type"=>"password"));
//echo $this->Form->input("Confirm", array("type"=>"password"));
echo $this->Form->end("Register");