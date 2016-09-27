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
<link href="http://vjs.zencdn.net/5.10.2/video-js.css" rel="stylesheet">

</head>
<body>
    <div  id="page" class="container-fluid">

            <div class="content">

                    <?php echo $this->Flash->render(); echo $this->Flash->render('auth');?>

                    <?php echo $this->fetch('content'); ?>
            </div>
    </div>
</body>
</html>
