<?php
$cakeDescription = __d('cake_dev', 'studio chardon');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title><?php echo $cakeDescription ?> <?php echo $this->fetch('title'); ?></title>
	<link rel="apple-touch-icon" href="<?= env('HTTP_HOST')  ?>/img/apple-image.png"/>
	<link rel="apple-touch-startup-image" href="<?= env('HTTP_HOST')  ?>/img/apple-image.png"/>
	<?php	echo $this->Html->meta('icon');
	echo $this->element("meta");
	echo $this->fetch('meta');
	echo $this->Html->css('styles.min');
	echo $this->fetch('css');
	?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body id="home" data-target=".navbar-fixed-top">
	<div class="side-collapse-container">
		<?php  echo $this->element('carousel'); ?>
		<?php   echo $this->element('navigation'); ?>
		<div class="container ">
			<div class="breadcrumb" style="margin-top:10px;">
				<div id="bc1" class="btn-group btn-breadcrumb">
					<?php   echo $this->Html->getCrumbs('', array(
						'text' => '<i class="glyphicon glyphicon-home"></i>',
						"class"=>"btn btn-default",
						'url' => array('controller' => 'homes', 'action' => 'index'),
						'escape' => false
						));
					?>
				</div><?php echo $this->element('social'); ?>
					<?php echo $this->Session->flash(); ?>
			</div>
		</div>
			<?php echo $this->fetch('content'); ?>
			<?php  echo $this->element('footer'); ?>
		<div class="site-cache" id="site-cache">
		</div>
	</div>
</body>
<?php
echo  $this->Html->script(array("default.min"));
echo $this->fetch('script');	?>
</html>
