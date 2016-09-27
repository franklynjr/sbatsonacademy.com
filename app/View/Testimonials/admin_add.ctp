<?php
echo $this->Form->create('Testimonial');
echo $this->Form->input('title', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('name', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
//echo $this->Form->input('description');
echo $this->Form->input('course_id', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);

echo $this->Form->input('description', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);

echo $this->Form->end('Add Testimonial');