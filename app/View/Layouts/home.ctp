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

$cakeDescription = __d('cake_dev', 'Studio');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo $cakeDescription ?>&nbsp;:&nbsp;<?php echo $this->fetch('title'); ?></title>
<link rel="apple-touch-icon" href="#"/>
<link rel="apple-touch-startup-image" href="#"/>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		//echo $this->Html->css(array('styles.min'));
		echo $this->fetch('css');
		echo  $this->Html->script(array("jquery-1.11.3.min"));
		echo $this->fetch('script');
	?>
</head>
<body id="home">
	<!-- 	<div id="Header">
			<div class="wrapper">
				<h1><?php // echo $cakeDescription; ?>Phicha</h1>
				<ul>
					<li><a href="" title="Twitter" class="twitterIcon"></a></li>
					<li><a href="" title="facebook" class="facebookIcon"></a></li>
					<li><a href="" title="linkedIn" class="linkedInIcon"></a></li>
					<li><a href="" title="Pintrest" class="pintrestIcon"></a></li>
				</ul>
			</div>
		</div>-->
		<div  class="wrapper">
		<!-- <div id="Content" class="wrapper">  -->

			<?php // echo $this->Flash->render(); ?>
			<?php  echo $this->Session->flash(); ?>
		</div>

			<?php echo $this->fetch('content'); ?>
		<div class="test"></div>
		<footer class="text-center">
			<p>
				<strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a></strong> All rights reserved.
			</p>
		</footer>
		<div id="overlay"></div>

</body>
</html>
