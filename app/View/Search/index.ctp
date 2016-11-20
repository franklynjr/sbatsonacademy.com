<ul>
<?php

if(sizeof($videos) > 0 || sizeof($topics) > 0 || sizeof($courses) > 0)
{
    echo '<span class="bold">Search results</span> for \''. $terms. "' <hr />"; 
}

if(isset($videos) && sizeof($videos) > 0)
{
    foreach ($videos as $video)
    {
        $id = $video['Video']['id'];
        $name = $video['Video']['title'];
        $description = $video['Video']['description'];
        ?>
    <li>
        <div>
            <div>
                <h5><a href="/videos/watch/<?=$id?>" alt="<?=$name ?>" ><?=$name ?> </a></h5>
            </div>
            <div class="result-description"><span><?=$description?> </span></div>
        </div>
    </li>
    <?php
    }
}

if(isset($topics) && sizeof($topics) > 0)
{
     foreach ($topics as $topic)
    {
        $id = $topic['Topic']['id'];
        $name = $topic['Topic']['name'];
        $description = $topic['Topic']['description'];
        ?>
        <li>
            <div>
                <div>
                    <h5><a href="/topics/view/<?=$id?>" alt="<?=$name ?>" ><?=$name ?> </a></h5>
                </div>
                <div class="result-description"><span><?=$description?> </span></div>
            </div>
        </li>
        <?php
    }
}

if(isset($courses) && sizeof($courses) > 0)
{
  foreach ($courses as $course)
    {
        $id = $course['Course']['id'];
        $name = $course['Course']['name'];
        $description = $course['Course']['description'];
        ?>
        <li>
            <div class="search-result">
                <div>
                    <h5><a href="/courses/view/<?=$id?>" alt="<?=$name ?>" ><?=$name ?> </a></h5>
                </div>
                <div class="result-description"><span><?=$description?> </span></div>
            </div>
        </li>
        <?php
    }
}

?>



</ul>
<?php // echo $this->element('sql_dump'); 