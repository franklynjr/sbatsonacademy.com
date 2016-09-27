<?php

$this->layout = 'admin_default';

if(isset($user_account)){
?>

<script>
    function _delete(){
        $('#delete').submit();
        console.log('delete');
    }
</script>

<form id="delete" method="post" action="/admin/users/delete/<?php echo $user_account['User']['id']; ?>">
    <input type="hidden" value="<?php echo $user_account['User']['id']; ?>" />
</form>
<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $user_account['User']['firstname']; ?>?</span></span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/users/view"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a href="javascript:_delete()"><span>Yes</span></a></div>

<?php }?>