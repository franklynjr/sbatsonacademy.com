<?php
$this->layout = 'admin_default';

if(isset($course)){
?>
<script>
function _delete(){
    $('#delete').submit();
    console.log('delete');
}

</script>
<form id="delete" method="post" action="/admin/courses/delete/<?php echo $course['Course']['id']; ?>">
    <input type="hidden" value="<?php echo $course['Course']['id']; ?>" />
</form>
<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $course['Course']['name']; ?>?</span></span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/courses/view"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a href="javascript:_delete()"><span>Yes</span></a></div>

<?php }?>