
<?php
echo $this->Form->create("Script", ['enctype'=>'multipart/form-data']);
echo $this->Form->input("name");
echo $this->Form->file("filename");
echo $this->Form->end('Upload');
