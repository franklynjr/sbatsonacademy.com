
<?php
$this->layout = 'admin_default';

print $this->Form->create('Category');
print $this->Form->input('name');
print $this->Form->input('parent_id', array("label"=>"Parent Category"));
print $this->Form->input('description', array('row', 10));

print $this->Form->end('Add Category');