<?php


if(isset($page)){
?>

<script>
//    function _delete(){
//        $('#delete').submit();
//        console.log('delete');
//    }
    $(function(){
       
        $('#delete-yes').on('click', function(e){
            e.preventDefault();
            $('#delete').submit();
            console.log('delete');
        });
    
    });
</script>

<form id="delete" method="post" action="/admin/pages/delete/<?php echo $page['Page']['id']; ?>">
    <input type="hidden" value="<?php echo $page['Page']['id']; ?>" />
</form>

<div class="error"><span>Are you sure you want to delete <span class="bold"><?php echo $page['Page']['name']; ?>?</span></span></div>
<div class="cancel-button col-xs-5 col-lg-2"><a href="/admin/pages/view"><span>No</span></a></div>
<div class=" delete-button col-xs-5 col-lg-2"><a id="delete-yes" href="#"><span>Yes</span></a></div>

<?php }?>