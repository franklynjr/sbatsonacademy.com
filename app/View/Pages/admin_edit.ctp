<?php
echo $this->Form->create('Page');
echo $this->Form->input('id', ['type'=>'hidden']);
echo $this->Form->input('name', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('title', ['class'=>'form-control',  'div'=>['class'=>'form-group']]);
echo $this->Form->input('description', ['type'=>'text','class'=>'form-control','div'=>['class'=>'form-group']]);
echo $this->Form->input('content', ['rows'=>10, 'div'=>['class'=>'form-group']]);


echo $this->Form->end('Update Page');