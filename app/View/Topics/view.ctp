<?php


if(isset($topic)){
    
    $this->assign('title', 'Topic - ' . $topic['Topic']['name']);
    ?>
<div class="page-header-container">
    <div class="page-header-content" style="<?="background-image:url('{$topic['Topic']['banner']}')"?>">
    <div class="page-header-content-container-background-overlay">
    </div>
    <div class="page-header-content-container">
        <div class="page-header-content-text">
            <div class="page-header-title"><h4><?php print $topic['Topic']['name']?></h4></div>
            <div class="topic-header-description hidden-xs"><p><?php print $topic['Topic']['description']?></p></div>
        </div>
    </div>
    </div>
</div>
<div id="content">
    



    
<div class="topics-container">
<hr />
<?php 
    
    if($topic['Topic']){ ?>
       
    <?php
    if(!empty($topic["Video"]))
    {
        
        foreach($Video as $video)
        {
            // todo: system settings
            $video_view = "inline";
            
            if($video_view === "block")
            {
                print   $this->element('video-list-block',  ['video'=>$video['Video'], 'redirect'=>"/videos/watch/{$video['Video']['id']}"]) . 
                        '<hr class="video-list-hr"/>';
            }  else {
                //print_r($video);
                print   $this->element('video-list-inline', ['video'=>$video['Video'], 'redirect'=>"/videos/watch/{$video['Video']['id']}"]) . 
                        '<hr class="video-list-hr"/>';
                
            }
        }
    }
    }else{
        if(!empty($topic["Subcategory"]))
        {
            //$topic = $topic["Subcategory"];
            print   $this->element('subtopics', ['subtopics'=>$subtopics]) . '<hr />';
            
        }
    }
    
            echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));   
    ?>
</div>
    
    <div id="subscription-box" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Subscription Required</h4>
                </div>
                <div class="modal-body">
                    <p>Purchase a subscription today to get immediate access to this course and many more you can watch anytime, anywhere</p>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-6">                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-xs-6">                    
                        <a class="btn btn-default"  href="/subscriptions/purchase/monthly" >Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
              
    <div id="login-box" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login Required</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo $this->Form->create('Login', ['url'=>'/login']);
                    echo $this->Form->input('username', ['class'=>'form-control', 'div'=>['class'=>'form-group']]);
                    echo $this->Form->input('password', ['class'=>'form-control', 'div'=>['class'=>'form-group']]); ?>
                    <div class="modal-footer">
                    <div class="col-xs-6">                    
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                    </div>
                    <div class="col-xs-6">                    <?php
                        echo $this->Form->input('App.redirect', ['type'=>'hidden', 'value'=>'', 'class'=>'form-control', 'div'=>['class'=>'form-group']]);
                        echo $this->Form->end('login');
                        ?>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
    <?php
    
}