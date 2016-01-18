<?php
$cakeDescription = __d('cake_dev', 'studio chardon');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<meta property="og:locale" content="fr_FR" />
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "website" )); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => "Site officiel de philippe chardon photographe ".$this->fetch('title') )); ?>
<?= $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => env('HTTP_HOST') )); ?>
<?= $this->Html->meta(array('property' => 'og:image', 'type' => 'meta', 'content' =>  env('HTTP_HOST')."/img/screenshot.jpg" )); ?>
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo $cakeDescription ?>">
<meta name="twitter:creator" content="<?php echo $cakeDescription ?>">
<meta name="twitter:domain" content="<?php echo env('HTTP_HOST'); ?>">
<meta name="twitter:title" content="<?php echo $cakeDescription ?>" />
<meta name="twitter:image" content="<?php echo env('HTTP_HOST'); ?>/img/screenshot.jpg" />
<meta name="twitter:url" content="<?php echo env('HTTP_HOST'); ?>" />
<meta name="application-name" content="<?php echo $cakeDescription ?>"/>
<meta name="msapplication-TileColor" content="#EBEAE6"/>
<meta name="msapplication-square70x70logo" content="<?php echo env('HTTP_HOST'); ?>/img/tiny.png"/>
<meta name="msapplication-square150x150logo" content="<?php echo env('HTTP_HOST'); ?>/img/square.png"/>
<meta name="msapplication-wide310x150logo" content="<?php echo env('HTTP_HOST'); ?>/img/wide.jpg"/>
<meta name="msapplication-square310x310logo" content="<?php echo env('HTTP_HOST'); ?>/img/large.jpg"/>
