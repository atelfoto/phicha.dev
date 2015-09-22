<?php echo $this->fetch('title')?> <?= $this->assign('title', 'Portfolio'); ?>
<?= $this->Html->meta("description", "Galerie photos", array('inline'=>false)); ?>
<?php $this->Html->addCrumb('Portfolio'); ?>
<div class="container page">
	<div class="page-header">
		<h1><?php echo __('Portfolio'); ?></h1>
	</div>
	<div class="row" >
		<?php  foreach ($portfolios as $portfolio): ?>
		  <div class="col-sm-6 col-md-4 text-capitalize " >
		  <div class="thumbnail box-home">
		  <?=   $this->Html->image("../files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'port_'. $portfolio['Portfolio']['photo'],
		  	array("class" => "img-responsive ",'style'=>'height:262px', 'url' =>
		  	array('controller'=>'portfolios', 'action' => 'view','slug'=>$portfolio['Portfolio']['slug'],'admin'=> false))); ?>
		  		<h3 class='text-center'><?php echo $this->Text->truncate($portfolio['Portfolio']['name'],28,array('exact' =>true,'html'=> true)); ?></h3>
		  		<p class="text-center small" style="min-height:40px;"><?php  echo h($portfolio['Portfolio']['subtitle']); ?> <br>
		  			<span class='date'>
		  				<small>
		  					<i class="glyphicon glyphicon-calendar">&nbsp;</i>&nbsp;
		  					<?php echo __('published') ?> :&nbsp;
		  					<?php echo $this->Date->french($portfolio['Portfolio']['created']); ?> <br>
		  					<span style="min-width:400px;">
		  						<i class="glyphicon glyphicon-user"></i>
		  						<?php echo __('photographer'); ?> :&nbsp;<?php  echo h($portfolio['Portfolio']['photographer']); ?>
		  					</span>
		  				</small>
		  			</span>
		  		</p>
		  	</div>
		  </div>
		 <?php  endforeach; ?>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<?php echo $this->element('pagination-counter'); ?>
			<?php echo $this->element('pagination'); ?>
		</div>
	</div>
</div>



