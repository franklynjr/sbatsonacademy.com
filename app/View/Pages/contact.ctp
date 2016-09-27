
<?php

App::uses('SystemConfig', 'Model');
App::uses('CakeEmail', 'Network/Email');

if($this->request->is('post'))
{
    $name = $this->request->data['name'];
    $message = createMessage($this->request->data);
    
    
    $email = new CakeEmail();
    $conf = new SystemConfig();
    $email_conf = $conf->get('mail');
    $recipient = $conf->get('contact_us_email');
    
    $email->emailFormat('html');
    $email->to($recipient);
    $email->config($email_conf);
    
    $email->subject('Message From: ' . $name);
    
    if($email->send($message))
    {
        //$this->Flash->set('Message sent!');
        echo '<div class="success"><span>Your message was sent successfully!</span></div>';
    }
}
        
function createMessage($data)
{
    
    $message =  'From: ' . $data['name'].'<br/>'.
                'Email: ' . $data['email'].'<br/>'.
                'Phone: ' . $data['phone'].'<br/><br/>'.
                'Message: <br/>'. $data['message'];
    
    return $message;
}

?>

<div class="container">
    <div>
        <h3>Contact Form</h3>
    </div>
    <div class="contact-form-container">
        <form method="post">
            
            <div class="container">
                <div class="row form-group">
                    <div class="col-lg-7">
                        <input class="form-control" type="text" name="name" placeholder="Name" required/>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="tel" name="phone" placeholder="Phone"  required/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="email" name="email" placeholder="Email"  required/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" name="message" rows="10" placeholder="Type you message here"  required></textarea>
                    </div>
                </div>
                <div>
                    <input class="form-control" formaction="/pages/contact" type="submit" value="Send"/>
                </div>
            </div>
            
        </form>
    </div>
</div>
