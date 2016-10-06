<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Seon Batson Tutoring');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>



    
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
        <!--- HTML Stylesheets and Javascripts  -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
                <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php
                echo $this->Html->meta('icon');

		echo $this->Html->css('mm_generic');
		echo $this->Html->script('scripts');

		echo $this->fetch('meta');
		echo $this->fetch('css');
                ?>

        <?php
		echo $this->fetch('script');
	?>
</head>

<body id="home-body">
    <?php
//echo php_uname().'<br />';
//echo PHP_OS; ?>
	<div id="page" class="container">
		
		<div class="home-content">
                    <div id="header">
                        <div class="header-image">
                            <div id="menu" class="menu-container">
                              
                                <div class="menu-bottom">
                                    <?php  echo $this->element("home_menu", array("user"=>isset($user)?$user:NULL));  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu-alias"></div>
                    <?php echo $this->Flash->render(); ?>

                    <?php echo $this->fetch('content'); ?>

                    <div class="">
                        <?php  echo $this->element("footer", array("user"=>isset($user)?$user:NULL));  ?>
                    </div>



<!--		<div id="footer">

                    <?php // echo $this->Html->link(
//                                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
//                                    'http://www.cakephp.org/',
//                                    array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
//                            );
                    ?>
                    <p>
                            <?php echo $cakeVersion; ?>
                    </p>
		</div>-->
                </div>
        </div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>

