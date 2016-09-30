
<div><h3>Add a new course</h3></div>
<hr />
<?php
$this->layout = 'admin_default';

print $this->Form->create('Course', ['enctype'=>'multipart/form-data']);
print $this->Form->input('name', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
?>  
<div class="input">
    <?php
        echo $this->Form->label('Course Image');
        echo $this->Form->file("filename", ["id"=>"course-image",  'div'=>['class'=>'form-group']]);
    ?>
</div>
<div class="input">
    <?php
        echo $this->Form->label('Course Banner Image');
        echo $this->Form->file("banner_filename", ["id"=>"course-banner-image",  'div'=>['class'=>'form-group']]);
    ?>
</div>

<?php
//print $this->Form->input('parent_id', array("label"=>"Parent Category"));
print $this->Form->input('description', ['row', 10, 'class'=>'form-control', 'div'=>['class'=>'form-group']]);

print $this->Form->end('Create Course');