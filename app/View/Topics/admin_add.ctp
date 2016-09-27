
<?php
$this->layout = 'admin_default';

print $this->Form->create('Topic', ['enctype'=>'multipart/form-data']);
print $this->Form->input('name', ['required']);
print $this->Form->input('course_id',['required']);
?>
<div class="input">
    <?php
        echo $this->Form->label('Topic Image');
        echo $this->Form->file("filename", array("id"=>"topic-image"));
    ?>
</div>
<div class="input">
    
    <?php
        echo $this->Form->label('Topic Banner Image');
        echo $this->Form->file("banner_filename", array("id"=>"topic-banner-image"));
    ?>
</div>

<?php
//print $this->Form->input('parent_id', array("label"=>"Parent Category"));
print $this->Form->input('description', array('row'=> 10));

print $this->Form->end('Create Topic');