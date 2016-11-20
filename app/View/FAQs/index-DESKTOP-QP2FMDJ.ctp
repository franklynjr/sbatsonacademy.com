
<h3><span>Frequently Asked Questions</span></h3>
<?php

if($faqs)
{
    foreach($faqs as $FAQ)
    {
        ?>

<div>
    <div class="faq-question"><?=$FAQ['FAQ']['question']; ?></div>
    <div class="faq-question"><?=$FAQ['FAQ']['answer']; ?></div>
</div>

<?php
    }
}