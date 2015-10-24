<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php foreach ($homes as $home): ?>
<?php  echo $this->Html->meta(array('name' => 'keywords','type' => 'meta',  'content' => $home["Home"]['keywords']),NULL,array("inline"=>false));?>
<?php echo $this->Html->meta("description", $home["Home"]['description'], array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => $home["Home"]['description']),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'robots', 'content' => $home["Home"]['robots']),NULL,array("inline"=>false));
?>
<?php endforeach; ?>
<?= $this->Html->css(array('home.min'),array('inline'=>false)); ?>
<div id="container"  class="site-container">
  <header class="header">
    <a href="#" class="header__icon" id="header__icon"></a>
    <?php  echo $this->element('social'); ?>
  </header>
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
	<div class="site-cache" id="site-cache"></div>
	 <div id='layout_footer'></div>
</div>
<?php  echo $this->element('vegas'); ?>
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


