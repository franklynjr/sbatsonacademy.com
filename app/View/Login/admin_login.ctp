<div class="row-space-2"></div>
<?php
echo $this->Form->create("User");
echo $this->Form->input("username");
echo $this->Form->input("password", array("type"=>"password"));
echo $this->Form->end("Login");

