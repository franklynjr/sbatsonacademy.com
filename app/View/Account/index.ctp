<?php

if(isset($account_user))
{
//    print_r($account_subscription);
}
?>
<div class="container">
    
    <h3>Overview</h3>
    <hr />
    <div class="row">
        <div class="col-lg-2"><span>Name</span></div>
        <div class="col-lg-4"><span><?="{$account_user['User']['firstname']} {$account_user['User']['lastname']}" ?></span></div>
    </div>
    
    <div class="row">
        <div class="col-lg-2"><span>Email</span></div>
        <div class="col-lg-4"><span><?="{$account_user['User']['email']}" ?></span></div>
    </div>
    <div class="row">
        <div class="col-lg-2"><span>Phone</span></div>
        <div class="col-lg-4"><span><?="{$account_user['User']['phone']}"?></span></div>
    </div>
    <div class="row">
        <div class="col-lg-2"><span>Username</span></div>
        <div class="col-lg-4"><span><?="{$account_user['Login']['username']}" ?></span></div>
    </div>
    <div class="row">
        <div class="col-lg-2"><span>Account Type</span></div>
        <div class="col-lg-4"><span><?="{$account_user['Role']['name']}" ?></span></div>
    </div>
    
    <br/>
    <h3>Subscription</h3>
    <hr />
    <?php
    
    if(!empty($account_subscription) && isset($account_subscription)){ ?>
    <div class="row">
        <div class="col-lg-2"><span>Plan Name</span></div>
        <div class="col-lg-4"><span><?="{$account_subscription['SubscriptionPlan']['name']}" ?></span></div>
    </div>
    <div class="row">
        <div class="col-lg-2"><span>Expires</span></div>
        <div class="col-lg-4"><span><?="{$account_subscription['Subscription']['end_date']}" ?></span></div>
    </div>
    <?php
    }else
    {?>
     
    <div class="row">
        <div class="col-lg-2"><span class="error">No subscription</span></div>
    </div>
    <?php
    } ?>
</div>