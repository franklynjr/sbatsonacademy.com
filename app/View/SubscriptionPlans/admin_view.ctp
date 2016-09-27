<div class="container">
<div class="row-space-1"></div>
<div class="row">
    <div class="col-lg-6 col-md-6 hidden-xs hidden-sm"><span><h3>Subscription Plans</h3></span></div><div class="col-lg-2 col-md-2 col-xs-12  col-sm-12 w-theme-button top-button"><span><a href="/admin/subscriptionplans/add">Add a new Subscription Plan</a></span></div>
</div>
<div class="row">
    <div class="col-lg-6 hidden-lg hidden-md"><span><h3>Subscription Plans</h3></span>
</div>

<hr />
<?php
echo $this->element('subscription_plans-list-view');

?>
</div>
</div>