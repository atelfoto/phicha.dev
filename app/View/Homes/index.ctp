<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php foreach ($homes as $home): ?>
<?php  echo $this->Html->meta(array('name' => 'keywords','type' => 'meta',  'content' => $home["Home"]['keywords']),NULL,array("inline"=>false));?>
<?php echo $this->Html->meta("description", $home["Home"]['description'], array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => $home["Home"]['description']),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'robots', 'content' => $home["Home"]['robots']),NULL,array("inline"=>false));
?>
<?php endforeach; ?>
<?= $this->Html->css(array('home.min'),array('inline'=>false)); ?>
<div  class="site-container">
<!-- 	<nav>
		<ul>
			<li><a href="#" title="Twitter" class="twitterIcon"></a></li>
			<li><a href="#" title="facebook" class="facebookIcon"></a></li>
			<li><a href="#" title="linkedIn" class="linkedInIcon"></a></li>
			<li><a href="#" title="Pintrest" class="pintrestIcon"></a></li>
		</ul>
	</nav> -->
	<!--nocache-->
	<?php echo $this->Flash->render(); ?>
	<!--/nocache-->
<?php foreach ($homes as $home): ?>
	<h1><?php echo h($home['Home']['name']); ?></h1>
<?php endforeach; ?>
	<div id="Content" class="main">
		<?php foreach ($homes as $home): ?>
			<?= $home["Home"]['content']; ?>
		<?php endforeach; ?>
	</div>

<?php  echo $this->element('sidebar'); ?>
</div>
<?php  echo $this->element('vegas'); ?>
