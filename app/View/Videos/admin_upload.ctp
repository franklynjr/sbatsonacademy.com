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


echo $this->Form->create("Video", array("enctype"=>"multipart/form-data"));
echo '<div class="row input">';
echo $this->Form->input("topic_id", ['div'=>['class'=>'col-lg-2']]); ?> 
<div> <?php
    echo $this->Html->link("Add Topic", ['controller'=>'topics', 'action'=> 'add']); ?>
</div>
</div>
<div class="row input">
    <div class="col-lg-12">
    <label>Video File</label>
    <?=$this->Form->file("filename", array("onchange"=>"setSource(this)", "id"=>"vid-file")); ?>
</div>
</div>
<?php
                                         
echo $this->Form->input("title");
echo $this->Form->input("description");
echo $this->Form->input("length");


echo $this->Form->end("Upload Video");

