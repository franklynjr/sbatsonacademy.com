
<?php

$this->layout = 'subscription_default';

?>

<form action="" method="POST" id="payment-form">
  <span class="payment-errors"></span>

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input type="text" size="20" data-stripe="number">
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YY)</span>
      <input type="text" size="2" data-stripe="exp_month">
    </label>
    <span> / </span>
    <input type="text" size="2" data-stripe="exp_year">
  </div>

  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-stripe="cvc">
    </label>
  </div>
  <div>
      <h5>Billing</h5>
  </div>
  <div>
      <label>Address 1</label>
      <input type="text" name="data[Address][address1]" />
  </div>
  <div>
      <label>Address 2</label>
      <input type="text" name="data[Address][address2]" />
  </div>
  <div>
      <label>City</label>
      <input type="text" name="data[Address][city]" />
  </div>
  <div>
      <label>State</label>
      <input type="text" name="data[Address][state]" />
  </div>
  <div>
      <label>Zip</label>
      <input type="text" name="data[Address][zipcode]" />
      <input type="hidden" name="id" value="<?php echo $plan; ?>"/>
  </div>
  
  <input type="submit" class="submit" value="Submit Payment">
</form>