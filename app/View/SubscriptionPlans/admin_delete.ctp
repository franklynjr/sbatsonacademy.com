<?php


if(isset($subscription_plan)){
?>

<script>
    function _delete(){
        $('#delete').submit();
        console.log('delete');
    }
</script>

<form id="delete" method="post" action="/admin/subscriptionplans/delete/<?php echo $subscription_plan['SubscriptionPlan']['id']; ?>">
    <input type="hidden" value="<?php echo $subscription_plan['SubscriptionPlan']['id']; ?>" />
</form>
<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $subscription_plan['SubscriptionPlan']['name']; ?>?</span></span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/subscriptionplans/view"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a href="javascript:_delete()"><span>Yes</span></a></div>

<?php }?>