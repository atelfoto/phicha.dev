<?php  echo  $this->assign('title',__("Accueil")); ?>
<?php foreach ($homes as $home): ?>
<?php  echo $this->Html->meta(array('name' => 'keywords','type' => 'meta',  'content' => $home["Home"]['keywords']),NULL,array("inline"=>false));?>
<?php echo $this->Html->meta("description", $home["Home"]['description'], array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => $home["Home"]['description']),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'robots', 'content' => $home["Home"]['robots']),NULL,array("inline"=>false));
?>
<?php endforeach; ?>
<div id="Content" class="main">
	<?php foreach ($homes as $home): ?>
		<?= $home["Home"]['content']; ?>
	<?php endforeach; ?>
</div>
<?php  echo $this->element('sidebar'); ?>
<?php   echo $this->element('vegas'); ?>

