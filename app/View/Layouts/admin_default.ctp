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

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
    
       <!--- HTML Stylesheets and Javascripts  -->
                <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
                <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
                <!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
                
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

                <!-- Optional theme -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
                
                <!-- TinyMCE -->
                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                <script>tinymce.init({ selector:'textarea',automatic_uploads: true,
                                        plugins: "image,fullscreen, link,textcolor colorpicker, code,visualblocks,contextmenu, preview", 
                                        toolbar: "forecolor backcolor | Formatting,anchor,insertfile  undo redo | alignleft aligncenter " + 
                                                 "alignright alignjustify  | sizeselect | bold italic underline | fontselect |  fontsizeselect " +
                                                 "| bullist numlist | link image | preview code",
  plugin_preview_height: 500,plugin_preview_width: 840});</script>
	<?php
                echo $this->Html->meta('icon');

		echo $this->Html->css('mm_generic');

                echo $this->Html->script('scripts');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div  id="page" class="container-fluid">
		<div id="menu-container">
                  <?php  echo $this->element("admin_menu", array("user"=>isset($user)?$user:NULL));  ?>
		</div>
		<div class="content">

			<?php echo $this->Flash->render(); ?>
                    
			<?php echo $this->fetch('content'); ?>
                </div>
        </div>
</body>
</html>
