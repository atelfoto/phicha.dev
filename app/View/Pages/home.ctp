<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php echo $this->Html->meta(array('name' => 'robots','type'=>"meta", 'content' => 'index,follow'),NULL,array('inline'=>false)); ?>
<?= $this->Html->css(array('home.min'),array('inline'=>false)); ?>
<?php echo $this->Html->meta("description", " ", array("inline"=>false)); ?>
	<div id="Header">
			<div class="wrapper">
				<h1><?php // echo $cakeDescription; ?>Phicha</h1>
				<ul>
					<li><a href="" title="Twitter" class="twitterIcon"></a></li>
					<li><a href="" title="facebook" class="facebookIcon"></a></li>
					<li><a href="" title="linkedIn" class="linkedInIcon"></a></li>
					<li><a href="" title="Pintrest" class="pintrestIcon"></a></li>
				</ul>
			</div>
		</div>
		<div id="Content" class="wrapper">
		<h2>We are under construction</h2>
		<br/><br/>
		<div class="countdown styled"></div>
		<div id="subscribe">
			<h3>Stay in touch</h3>
			<form action="" method="post" onsubmit="">
				<p><input name="" value="Enter your e-mail" type="text" id=""/>
					<input type="button" value="Submit"/>
				</p>
			</form>
		</div>
	</div>
<?php echo $this->Html->script(array("jquery.vegas.min","jquery.countdown","global"),array('inline'=>false)); ?>
