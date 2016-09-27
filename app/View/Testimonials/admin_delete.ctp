<?php


if(isset($testimonial)){
?>

<script>
    function _delete(){
        $('#delete').submit();
        console.log('delete');
    }
</script>

<form id="delete" method="post" action="/admin/testimonials/delete/<?php echo $testimonial['Testimonial']['id']; ?>">
    <input type="hidden" value="<?php echo $testimonial['Testimonial']['id']; ?>" />
</form>
<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $testimonial['Testimonial']['name']."'s</span> testimonial?"; ?></span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/testimonials/view"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a href="javascript:_delete()"><span>Yes</span></a></div>

<?php }?>