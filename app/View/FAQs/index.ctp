<div class="content">
    <div class="faq-header-text">
      <h3><span>Frequently Asked Questions</span></h3>
    </div>  
    <br/>
<?php

if($faqs)
{
    foreach($faqs as $FAQ)
    {
        ?>

<div class="faq-content">
    <div class="faq-question"><?=$FAQ['FAQ']['question']; ?></div>
    <div class="faq-question"><?=$FAQ['FAQ']['answer']; ?></div>
</div>

<?php
    }
}
?>
</div>