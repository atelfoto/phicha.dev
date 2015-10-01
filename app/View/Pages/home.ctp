<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php echo $this->Html->meta(array('name' => 'robots','type'=>"meta", 'content' => 'index,follow'),NULL,array('inline'=>false)); ?>
<?= $this->Html->css(array('home.min',"https://fonts.googleapis.com/css?family=Raleway:700 "),array('inline'=>false)); ?>
<?php echo $this->Html->meta("description", " ", array("inline"=>false)); ?>
<div id="Header">
	<div class="wrapper">
		<h1><?php  echo "studio"; ?></h1>
		<!-- <h1><?php // echo $this->fetch('title'); ?></h1> -->
		<?php // echo $this->assign('title', 'Acces clients'); ?>
		<ul>
			<li><a href="#" title="Twitter" class="twitterIcon"></a></li>
			<li><a href="#" title="facebook" class="facebookIcon"></a></li>
			<li><a href="#" title="linkedIn" class="linkedInIcon"></a></li>
			<li><a href="#" title="Pintrest" class="pintrestIcon"></a></li>
		</ul>
	</div>
</div>
<!-- <div id="Content" class="wrapper"> -->

<?php  echo $this->element('bulidingpage'); ?>
