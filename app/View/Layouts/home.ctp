<?php
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
		echo $this->fetch('css');
		echo  $this->Html->script(array("jquery-1.11.3.min"));
		echo $this->fetch('script');
	?>
	<?php echo $this->element('meta'); ?>
</head>
<body id="home">
	<div  class="wrapper">
		<?php  echo $this->Session->flash(); ?>
	</div>
		<?php echo $this->fetch('content'); ?>
		<footer class="text-center">
			<p>
				<strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a></strong> All rights reserved.
			</p>
		</footer>
	<div id="overlay"></div>
</body>
</html>
