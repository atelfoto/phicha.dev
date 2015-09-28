<?php echo $this->fetch('title');?> <?= $this->assign('title', 'Acces clients'); ?>
<?= $this->Html->meta("description", "acces aux pages clients", array('inline'=>false)); ?>
<?php $this->Html->addCrumb("Acces Clients",array("controller"=>"contact","action"=>"index"),array('class'=>"btn btn-default disabled")); ?>
<?php //  echo $this->Element('navigation'); ?>
<div class="container page">
	<div class="page-header text-center">
		<h1><?php echo __('Acces clients'); ?></h1>
	</div>
	<div class="row" >
		<div class="col-sm-6 col-md-6 text-capitalize " >
			<div class="thumbnail box-home text-center">
				<h3 class='text-center'>accès aux albums publics</h3>
				<p class="text-center small" style="min-height:40px;">
					Cliquer sur le bouton ci-dessous pour accéder à la page de recherche d'albums publics.
				</p>
				<input class="btn btn-primary" type="button" value="albums publics" onclick="window.open('http://www.jingoo.com/album/public.php?id_photographe=165557','Albums','status=yes,scrollbars=yes,resizable=yes,width=1000,height=600,menubar=yes,toolbar=yes,location=yes');return false;;">
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 text-capitalize " >
			<div class="thumbnail box-home text-center ">
				<h3 class='text-center'>ma banque d'images</h3>
				<p class="text-center small" style="min-height:40px;">
					Découvrez, partagez, commandez mes plus belles réalisations : des images originales disponibles sur différents supports
				</p>
				<input class="btn btn-primary" type="button" value="banque d'images" onclick="window.open('http://www.jingoo.com/album/postershop/index.php?id_photographe=165557','Albums','status=yes,scrollbars=yes,resizable=yes,width=1000,height=600,menubar=yes,toolbar=yes,location=yes');return false;">
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="col-sm-3 col">

		</div>
		<div class="col-sm-6 col-md-6 text-capitalize " >
			<div class="box-home thumbnail text-center">
				<h3 class='text-center'>accès aux albums privés</h3>
				<p class="text-center small" style="min-height:40px;">
					Saisissez ci-dessous vos identifiants pour accéder à vos albums
				</p>
					<?php
					  	echo $this->Form->create(null, array(
					  		'url' => 'http://www.jingoo.com/index.php',
					  		'type' => 'post',
					  		'target'=>'_blank',
					  		"class"=>"form-inline ",
					  		'inputDefaults' => array(
					      		'class'=>"form-control",
					      		'label' => false,
					      		'div' => array(
					      			"class"=>"form-group")
					     	)
					 	));
						echo $this->Form->input('login', array("placeholder"=>"cd3"));
						echo $this->Form->input('password',array("placeholder"=>"mot de passe","type"=>"password"));
						echo $this->Form->button("ok", array("class"=>"btn btn-primary",'type'=>"submit"));
						echo  $this->Form->end();
					?>
					<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>


			<!-- 	<div class="row">
					<form class="form-inline" method="post" action="http://www.jingoo.com/index.php" target="_blank">
						<div class=" col-md-5" >
							<input name="login" id="identifiant" type="text" class="form-control"  placeholder="CD3-" >
						</div>
						<div class=" col-md-5"  >
							<input type="password" class="form-control " id="password" placeholder="password" >
						</div>
						<div class="col-md-2" >
							<button type="submit" class="btn btn-primary " >ok</button>
						</div>
					</form>
				</div> -->

<!-- 		<div class="col-sm-6 col-md-6 text-capitalize " >
			<div class="thumbnail box-home text-center ">
				<h3 class='text-center'>accès aux albums privés</h3>
				<p class="text-center small" style="min-height:40px;">
					Saisissez ci-dessous vos identifiants pour accéder à vos albums
				</p>
				<form class="form-inline">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail3">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword3">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
					</div>

					<button type="submit" class="btn btn-primary">Sign in</button>
				</form>
			</div>
		</div>	 -->

