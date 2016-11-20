
<ul class="col-lg-10">
    
<?php

//$this->layout = 'admin_default';
//print_r($topics);
foreach($subscription_plans as $subscription_plan)
{
    //    print_r($topic);
    //    if($topic['Topic']['name'] == 'English Language Art')
    //        print_r($topic);
    ?>
        <li>

            <div>
                <div class="col-xs-12 col-md-10"><span><?php echo $subscription_plan['SubscriptionPlan']['name']; ?></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/subscriptionplans/edit/<?php echo $subscription_plan['SubscriptionPlan']['id']; ?>">edit</a></span></div>
                <div class="col-xs-6 col-md-1"><span><a href="/admin/subscriptionplans/delete/<?php echo $subscription_plan['SubscriptionPlan']['id']; ?>">delete</a></span></div>
            </div>  
        </li>
        <br />
        <hr/>
    <?php
}
?>

</ul>