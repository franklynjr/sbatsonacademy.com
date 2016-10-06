

<h3>Stripe API settings</h3>
<div class="row-space-1"></div>
<?php
$this->layout = 'admin_default';

echo $this->Form->create('StripeConfig');
echo $this->Form->input('test_secret_key', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('test_publishable_key', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('live_secret_key', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('live_publishable_key', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->label('Mode'); 
echo $this->Form->select('mode', ['test'=>'test','live'=>'live'], ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
echo $this->Form->input('name', ['type'=>'hidden',
                            'value'=>'default']);
echo $this->Form->input('id', ['type'=>'hidden', 'class'=>'form-control', 'div'=>['class'=>'form-group']]);

echo $this->Form->end("Save Payment Settings");

