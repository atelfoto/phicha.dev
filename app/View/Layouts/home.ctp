<?php
$cakeDescription = __d('cake_dev', 'Studio Chardon');
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
echo $this->fetch('css'); ?>
</head>
<body id="home">
<div  class="container">
<!--nocache-->
<?php echo $this->Flash->render(); ?>
<!--/nocache-->
</div>
<?php echo $this->fetch('content'); ?>
<footer class="text-center">
<p>
<strong><small><em>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a></em></small></strong> All rights reserved.
</p>
</footer>
<div id="overlay"></div>
<?php echo  $this->Html->script(array("jquery-1.11.3.min"));
echo $this->fetch('script'); ?>
</body>
</html>
