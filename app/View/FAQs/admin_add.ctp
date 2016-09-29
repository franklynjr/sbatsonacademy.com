<h3><span>Add a new Frequently Asked Question</span></h3>
<?php

echo $this->Form->create("FAQ");
echo $this->Form->input('category', ['div'=>['class'=>'form-group']]);
echo $this->Form->input('question', ['rows'=>5, 'div'=>['class'=>'form-group']]);
echo $this->Form->input('answer', ['rows'=>10, 'div'=>['class'=>'form-group']]);
echo $this->Form->end("Save");