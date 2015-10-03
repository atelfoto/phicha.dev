<meta property="og:locale" content="fr_FR" />
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "website" )); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => "Site officiel de philippe chardon photographe" )); ?>
<?= $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => env('HTTP_HOST') )); ?>
<?= $this->Html->meta(array('property' => 'og:image', 'type' => 'meta', 'content' =>  env('HTTP_HOST')."/img/sceenshot.jpg" )); ?>
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="studio">
<meta name="twitter:creator" content="studio">
<meta name="twitter:domain" content="<?php echo env('HTTP_HOST'); ?>">
<meta name="twitter:title" content="studio" />
<meta name="twitter:description" content="studio " />
<meta name="twitter:image" content="<?php echo env('HTTP_HOST'); ?>/img/sceenshot.jpg" />
<meta name="twitter:url" content="<?php echo env('HTTP_HOST'); ?>" />
<meta name="application-name" content="studio"/>
<meta name="msapplication-TileColor" content="#EBEAE6"/>
<meta name="msapplication-square70x70logo" content="<?php echo env('HTTP_HOST'); ?>/img/tiny.png"/>
<meta name="msapplication-square150x150logo" content="<?php echo env('HTTP_HOST'); ?>/img/square.png"/>
<meta name="msapplication-wide310x150logo" content="<?php echo env('HTTP_HOST'); ?>/img/wide.jpg"/>
<meta name="msapplication-square310x310logo" content="<?php echo env('HTTP_HOST'); ?>/img/large.jpg"/>
