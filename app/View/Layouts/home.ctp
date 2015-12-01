<?php $cakeDescription = __d('cake_dev', 'Studio Chardon');
      $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php echo $this->Html->charset(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $cakeDescription ?> <?php echo $this->fetch('title'); ?></title>
<link rel="apple-touch-icon" href="<?= env('HTTP_HOST')  ?>/img/apple-image.png"/>
<link rel="apple-touch-startup-image" href="<?= env('HTTP_HOST')  ?>/img/apple-image.png"/>
<?php echo $this->Html->meta('icon');
echo $this->element('meta');
echo $this->fetch('meta');
echo $this->Html->css(array('home.min'),array('inline'=>false));
echo $this->fetch('css'); ?>
</head>
<body id="home">
<div id="container"  class="site-container">
  <header class="header">
    <a href="#" class="header__icon" id="header__icon"></a>
    <?php  echo $this->element('social'); ?>
  </header>
	<!--nocache-->
	<?php echo $this->Session->flash(); ?>
	<?php // echo $this->Session->flash('auth'); ?>
	<!--/nocache-->
	<h1><?php  echo $cakeDescription  ?></h1>
	<?php echo $this->fetch('content'); ?>



	 <div id='container_footer'></div>
</div><div class="site-cache" id="site-cache"></div>
<footer id="footer">
	<p>
		<strong>
			<small>
				<em>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a></em>
			</small>
		</strong> All rights reserved
	</p>
</footer>
<div id="overlay"></div>
<?php $this->Html->scriptStart(array('inline'=>false)); ?>
 (function($){
    /* Quand je clique sur l'icône hamburger je rajoute une classe au body */
    $('#header__icon').click(function(e){
        e.preventDefault();
        $('body').toggleClass('with--sidebar');
    });
    /* Je veux pouvoir masquer le menu si on clique sur le cache */
   $('#site-cache').click(function(e){
       $('body').removeClass('with--sidebar');
   })
})(jQuery);
<?php $this->Html->scriptEnd(); ?>
<?php
echo  $this->Html->script(array("home.min"));
echo $this->fetch('script'); ?>

</body>
</html>
