<?php
    
    
    App::uses('SystemConfig', 'Model');
    
    $this->layout = 'home';
    

//MediaManager::create_thumbnail();
    if(isset($user))
    {
//        print_r($user);
        //print 'subscription ends '. strtotime($user['Subscription']['end_date']). ' now' .(new DateTime())->getTimestamp();
//        if($issubscribed)
//        {
//            echo '<p> you are subscribed </p>';
//        }  else {
//            echo '<p> you are NOT subscribed </p>';
//        }
        //$user['Subscription']['stripe_cust_id'] = 1;
        //print($user['Subscription']['stripe_cust_id']);
        
    }
//    $conf = new SystemConfig();
//    print_r($conf->get('mail'));
//    echo get_class($user_o);
    if(isset($var))
    {
//        print_r($var);
    }
    
    
print($content);
    ?>

    
