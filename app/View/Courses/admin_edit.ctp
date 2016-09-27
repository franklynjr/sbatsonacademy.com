
<?php
$this->layout = 'admin_default';

echo $this->Form->create('Course', ['enctype'=>'multipart/form-data']);
echo $this->Form->input('name', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);

echo $this->Form->label('Change Image');
echo $this->Form->file('filename', ['div'=>['class'=>'form-group']]); ?>

<div class="input">
    <?php
        echo $this->Form->label('Change Image');
        echo $this->Form->file('filename', ['div'=>['class'=>'form-group']]);

    ?>
</div>

<div class="input">
    <?php
        echo $this->Form->label('Course Banner Image');
        echo $this->Form->file("banner_filename", ["id"=>"course-banner-image",  'div'=>['class'=>'form-group']]);
    ?>
</div>
//print $this->Form->input('parent_id', array("label"=>"Parent Category"));
print $this->Form->input('image', ['type'=>'hidden', 'class'=>'form-control', 'div'=>['class'=>'form-group']]);
print $this->Form->input('id', ['type'=>'hidden']);
print $this->Form->input('description', array('row', 10, 'class'=>'form-control', 'div'=>['class'=>'form-group']));

print $this->Form->end('Save Course');