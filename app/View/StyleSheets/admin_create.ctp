<?php

echo $this->Form->create("StyleSheet");
echo $this->Form->input("name");
echo $this->Form->input("code", ['id'=>'editor', 'row'=>5]);
echo $this->Form->end("Save");

