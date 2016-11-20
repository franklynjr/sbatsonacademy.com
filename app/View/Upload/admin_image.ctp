<?php
echo $this->Form->create("Image", ['enctype'=>'multipart/form-data']);
echo $this->Form->input("name");
echo $this->Form->file("filename");
echo $this->Form->end('Upload');