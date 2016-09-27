<?php
$this->layout = 'admin_default';

if(isset($video)){
?>
<script>
function _delete(){
    $('#delete').submit();
    console.log('delete');
}

</script>
<form id="delete" method="post" action="/admin/videos/delete/<?php echo $video['Video']['id']; ?>">
    <input type="hidden" value="<?php echo $video['Video']['id']; ?>" />
</form>
<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $video['Video']['title']; ?></span>?</span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/videos/"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a href="javascript:_delete()"><span>Yes</span></a></div>

<?php }?>