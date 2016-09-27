<?php


\Stripe\Stripe::setApiKey("sk_test_BQokikJOvBiI2HlWgH4olfQ2");

\Stripe\Charge::create(array(
  "amount" => 400,
  "currency" => "usd",
  "source" => "tok_189f8e2eZvKYlo2CvXXEwPCx", // obtained with Stripe.js
  "description" => "Charge for test@example.com"
));


