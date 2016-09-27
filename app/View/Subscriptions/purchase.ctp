
<?php

$this->layout = 'subscription_default';
if(isset($plan)){
?>
<!--<div class="container">
    <div class="row section">
        <h4><?php echo $plan; ?>Subscription</h4>  
    </div>  
</div>-->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="container-fluid">
                <div class="row section">
                    <h4><?php echo $plan["name"] ." "; ?>Subscription</h4>  
                </div>  
            </div>
            <form action="" method="POST" id="payment-form">
              <span class="payment-errors"></span>

              <div class="form-row form-group">
                <label>
                  <span>Name on Card</span>
                </label>
                  <input class="form-control" type="text" size="50" data-stripe="name" required>
              </div>
              <div class="form-row form-group">
                    <label>
                      <span>Card Number</span>
                        <input class="form-control" type="text" size="20" data-stripe="number" required>
                    </label>
                </div>
              
              <div class="form-row form-group">
                  
                <div class="row">
                    <div class="col-lg-10">
                        <label>
                        <span>Expiration (MM/YY)</span></label>
                        <input class="exp-input form-control" type="text" size="2" data-stripe="exp_month" required>
                        <span> / </span>
                        <input class="exp-input form-control" type="text" size="2" data-stripe="exp_year" required>
                    </div>

                    <div class="col-lg-2">
                      <label>
                        <span>CVC</span>
                      </label>
                        <input class="form-control" type="text" size="4" data-stripe="cvc" required>
                    </div>
                 </div> 
              </div>
              <br />
              <hr />
              <div class="section">
                  <h4>Billing Information</h4>
              </div>
              <div class="form-group">
                  <label>Address 1</label>
                  <input class="form-control" type="text" name="data[Address][address1]" value="<?php echo empty($user['Address']) ? '' :$user['Address']['address1']; ?>"/>
              </div>
              <div class="form-group">
                  <label>Address 2</label>
                  <input class="form-control" type="text" name="data[Address][address2]" value="<?php echo empty($user['Address']) ? '' :$user['Address']['address2']; ?>" />
              </div>
           
              <div class="container-fluid">
                <div class="row">   
                    <div class="col-lg-4 form-group form-group no-left-padding no-right-padding">
                        <!--<label>City</label>-->
                        <!--<input class="form-control" type="text" name="data[Address][city]" value="<?php echo empty($user['Address']) ? '' :$user['Address']['city']; ?>"/>-->
                        <?php echo $this->Form->input('Address.city', ["class"=>"form-control"]);
                        ?>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 form-group no-left-padding no-right-padding">
                        <!--<label>State</label>-->
                         <?php 
                              $state = $user['Address']['state'];
                              //echo $state;
                              $options = array_column(array_column($states, 'State'), 'abbreviation');


                              echo $this->Form->input('Address.state', ['options' => $options, 'default' => 24, 'class'=>'form-control']);?>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 form-group no-left-padding no-right-padding">
                        <label>Zip</label>
                        <input class="form-control" type="text" name="data[Address][zip]" value="<?php echo empty($user['Address']) ? '' :$user['Address']['zip']; ?>"/>
                        <input type="hidden" name="id" value="<?php echo $plan["name"]; ?>"/>
                    </div>
                </div>
              </div>
              <input class="form-control" type="hidden" name="data[Address][id]" value="<?php echo empty($user['Address']) ? '' :$user['Address']['id']; ?>"/>
              
              <div class="form-group row">
                  <div class="col-lg-12  no-left-padding"><div class="col-xs-6 col-xs-6"><h4>Total: </h4></div><div class="col-xs-6 col-xs-6 no-right-padding"><h4 class="plan-price"><?php echo $plan["price"]; ?></h4></div></div>
              </div>
              <input type="submit" class="submit purchase-plan-btn" value="Purchase">
            </form>
        </div> <!-- end col-lg-8 -->
        
        <div class="col-lg-4 hidden-xs left-border">
            <div>
                <h3>Plan Details</h3>
            </div>
        </div>
        
    </div>
</div>
<?php } 

