<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php foreach ($homes as $home): ?>
<?php  echo $this->Html->meta(array('name' => 'keywords','type' => 'meta',  'content' => $home["Home"]['keywords']),NULL,array("inline"=>false));?>
<?php echo $this->Html->meta("description", $home["Home"]['description'], array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => $home["Home"]['description']),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'robots', 'content' => $home["Home"]['robots']),NULL,array("inline"=>false));
?>
<?php endforeach; ?>
<?= $this->Html->css(array('home.min'),array('inline'=>false)); ?>
<div id="Header">
<div class="col-sm-5 col-md-offset-1 col-xs-12 ">
<?php foreach ($homes as $home): ?>
<h1><?php echo h($home['Home']['name']); ?></h1>
<?php endforeach; ?>
</div>
<div class="col-sm-4 col-xs-12">
<ul>
<li><a href="#" title="Twitter" class="twitterIcon"></a></li>
<li><a href="#" title="facebook" class="facebookIcon"></a></li>
<li><a href="#" title="linkedIn" class="linkedInIcon"></a></li>
<li><a href="#" title="Pintrest" class="pintrestIcon"></a></li>
</ul>
</div>
</div>
<div class="col-lg-5 col-lg-offset-2 col-md-offset-1 col-md-7 col-sm-7"  >
<div id="Content" class="wrapper">
<?php foreach ($homes as $home): ?>
<?= $home["Home"]['content']; ?>
<?php endforeach; ?>
</div>
</div>
<?php  echo $this->element('sidebar'); ?>
<?php // echo $this->Html->script(array("home.min"),array('inline'=>false)); ?>
<?php  echo $this->element('vegas'); ?>
