<script>
function setSource(file)
{
    var filename = document.getElementById("vid-file");
    var source = document.getElementById("source");
    var tmppath = URL.createObjectURL(file.files[0]);
//    /alert(tmppath);
    
    console.log(tmppath);
    source.src = tmppath;
    $.ajax({
    type: "POST",
    url: 'admin/videos/upload',
    data: data,
    success: success,
    dataType: dataType
  });

}

</script>

<?php


echo $this->Form->create("Video");
echo $this->Form->input("topic_id", ['class'=>'form-control']);
echo $this->Form->input("title", ['class'=>'form-control']);
echo $this->Form->input("description", ['class'=>'form-control']);
echo $this->Form->input("length", ['id'=>'video-length', 'class'=>'form-control']);
?>
<div>
    <div class="row">
        <div class="col-md-12"><label>Set Thumbnail</label></div>
        <canvas class="hidden-canvas" id="canvas"></canvas>
        <div class="col-md-6">
            <img id="thumbnail" alt="thumbnail" />
        </div>
        <div class="col-md-6">
            <?php
            echo  '<video oncanplay="getVideoLength()" onseeking="getVideoPosition()" ontimeupdate="getVideoPosition()" '
                              . 'id="video" class="watch-video" controls><source src="'.$path.'" type="video/mp4"></video>';
            //echo $this->Form->input("id", ['type'=>'hidden']);
            //echo $this->Form->file("filename", array("onchange"=>"setSource(this)", 
            //                                         "id"=>"vid-file"));
            ?>
        </div>
    </div>
</div>

<?php
    echo $this->Form->input("thumbnail", ['type'=>'hidden', 'id'=>'image']);
    echo $this->Form->input("id", ['type'=>'hidden']);
?>

<div><span>Position: </span><span id="position"></span></div>
    <?php
        echo $this->Form->end("Update Video");
    ?>

<script>
    $(document).ready(function ()
    {
        var hidden_image_input = document.getElementById("image");
        var image = document.getElementById("thumbnail");
        image.src = hidden_image_input.value;
        
    });
</script>
<style>
    #thumbnail{
        width: 100%;
    }
</style>