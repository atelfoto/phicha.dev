<?php echo  $this->set('title_for_layout',__("sitemap"));
$this->Html->addCrumb(__('sitemap'),array('controller'=>"pages","action"=>"sitemap") ,array('class'=>"btn btn-default disabled"));
?>
<div class="page-header " id="page-header">
	<h1><?php echo __("sitemap"); ?></h1>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1 text-capitalize">
		<div class="row ">
			<div class="col-md-5 col-md-offset-1" class="text-center">
			<h3></h3>
				<ol>
					<li> <?php echo $this->Html->link(__("home"), array('controller' => 'homes', 'action' => 'index')); ?></li>
					<li> <?php echo $this->Html->link("galerie photos", array('controller' => 'portfolios', 'action' => 'index')); ?>
						<ol>
							<?php foreach ($portfolios as $k => $portfolio): ?>
							<li> <?php echo $this->Html->link($portfolio['Portfolio']['name'], array('controller' => 'portfolios',
								'action' => 'view',"slug"=>$portfolio['Portfolio']['slug'])); ?>
							</li>
							<?php endforeach ?>
						</ol>
					<li>
						<?php echo $this->Html->link("acces clients", array('controller' => 'pages', 'action' => 'customers')); ?>
					</li>
					<li>
						<?php echo $this->Html->link("contact", array('controller' => 'contacts', 'action' => 'index')); ?></li>
					</li>
					<li>
						<?php echo $this->Html->link("livre d'or", array('controller' => 'comments', 'action' => 'index')); ?></li>
					</li>
				</ol>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<figure>
					<?php  echo  $this->Html->image("/files/home/photo/1/xvga_01.jpg", array("class"=>"img-responsive thumbnail")); ?>
				</figure>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<figure>
					<?php echo  $this->Html->image("/files/home/photo/2/xvga_02.jpg", array("class"=>"img-responsive thumbnail")); ?>
				</figure>
			</div>
			<div class="col-md-5 col-md-offset-1">
				<h3></h3>
				<ol>
					<li> <?php echo $this->Html->link(__('Legal Information'), array('controller' => 'pages', 'action' => 'legalinformations')); ?></li>
					<li> <?php echo $this->Html->link("plan du site", array('controller' => 'pages', 'action' => 'sitemap')); ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>

