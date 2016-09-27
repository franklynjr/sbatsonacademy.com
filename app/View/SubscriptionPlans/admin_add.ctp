<?php
echo $this->Form->create('SubscriptionPlan');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('duration', ['options'=>['P1D'=>'1 day', 'P7D'=>'7 days', 'P14D'=>'14 days', 
                     'P1M'=>'1 month', 'P3M'=>'3 months', 'P6M'=>'6 months', 
                     'P1Y'=>'1 year', 'P2Y'=>'2 years', 'P3Y'=>'3 years', 
                     'P4Y'=>'4 years', 'P5Y'=>'5 years', 'P10Y'=>'10 years']
                                    ]);

echo $this->Form->input('price');

echo $this->Form->end('Create Subscription Plan');