<div class="row-space-2"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="container-fluid">
                    <div class="row section">
                        <h4>Login</h4>
                    </div>
            </div>
            <?php
                    echo $this->Form->create("Login", ['class'=>'login-form']);
                    echo $this->Form->input("username", array('label'=>['class'=>'login-label'],
                                                              'class'=>'form-control',
                                                              'div'=>'form-group'));

                    echo $this->Form->input("password", array('label'=>['class'=>'login-label'],
                                                              'type'=>"password",
                                                              'class'=>'form-control',
                                                              'div'=>'form-group')); 
                    
                    echo $this->Form->input("App.redirect", ['type'=>'hidden']);
                    ?>
            <div class="form-row>">
                <!--<a href="/users/reset/password" >forgot password</a>-->
                <div class="container-fluid submit-container">
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <a href="/users/reset/password" >forgot password</a>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <?php
                                echo $this->Form->end("Login", ['div'=>false]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container-fluid">
                <div class="row">
                    <div><h4>Do not have an account?</h4></div>
                    <div><span>Click <a href="/signup">here</a> to create an account</span></div>
                </div>
            </div>
        </div>
    </div>
    </div>
