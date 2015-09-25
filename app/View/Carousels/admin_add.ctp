<div class="portfolios form">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Carousel'); ?></h1>
			</div>
		</div>
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Carousels'),
							 array('action' => 'index'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'),
							 array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'),
							 array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Carousel', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
			<div class="text-right " role="group" aria-label="...">
  				<button  type="submit" class="btn btn-success  btn-xs"><i class="fa fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>
					<?= __('Save changes'); ?>
				</button>
				<?= $this->Html->link(__('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>Closed'),
					array('controller' => 'carousels', 'action' => 'index'),
					array('class'=>'btn btn-default btn-xs ','type'=>'button','escape'=>false)); ?>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('slug', array('class' => 'form-control','label'=>'Url', 'placeholder' => 'url'));?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php echo $this->Form->input('Carousel.photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));  ?>
					<?php echo $this->Form->input('photographer', array('class' => 'form-control', "label"=> __('photographer'), 'placeholder' => __('photographe')));?>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo  $this->Form->input("subtitle", array("class"=>"form-control",'label'=> __('subtitle'),"placeholder"=>__('subtitle'))); ?>
					</div>
					<div class="form-group pull-left active" style="margin-bottom:0px;margin-top:25px;">
						<?php echo $this->Form->input('online',array(
						'label'=>__('Online'),
						'required'=>false,
						'type'=>'checkbox',
						//'hiddenField' => false,
						 'name'=>'data[Carousel][online]',
						 'data-toggle'=>"toggle",
						 "data-onstyle"=>"success",
						 "data-offstyle"=>"danger",
						 'data-style'=>"ios",
						 'data-size'=>"mini",
						 "data-on"=>__('En Ligne'),
						  "data-off"=>__('Hors Ligne'),
						  'div'=>array('class'=>'text-right '),
						 ));
						  ?>
					</div>

					<?php echo  $this->Form->hidden("Carousel.photo_dir"); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'Content'));?>
			</div>
			<div class="form-group text-right">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	<!-- end row -->
</div>
	<?php // echo $this->Html->css(array('fileinput.min'),array('inline'=>false)); ?>
	<?php  echo  $this->Html->script(array('bootstrap-toggle.min','fileinput.min','fileinput_locale_fr'
	),array('inline'=>false)); ?>

