<?php
echo $this->Form->create('Testimonial');
echo $this->Form->input('name', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('course_id', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('title', ['class'=>'form-control', 'type'=>'text', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('description', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);

echo $this->Form->input('id', ["type"=>"hidden"]);

echo $this->Form->end('Update Testimonial');