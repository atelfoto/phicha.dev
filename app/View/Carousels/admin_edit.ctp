<div class="portfolios form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Portfolio'); ?></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Portfolio.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Carousel.id'))); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Carousel'), array('action' => 'index'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Carousel', array('role' => 'form','type'=>"file",'novalidate'=>"novalidate",)); ?>
			<div class="text-right " role="group" aria-label="...">
  				<button  type="submit" class="btn btn-success  btn-xs"><i class="fa fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>
					<?= __('Save changes'); ?>
				</button>
				<?= $this->Html->link(__('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>Closed'),
					array('controller' => 'carousels', 'action' => 'index'),
					array('class'=>'btn btn-default btn-xs ','type'=>'button','escape'=>false)); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('id');?>
			</div>
		<div class="row">
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				<?php  echo $this->Form->input('photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true' ));
				echo $this->Form->input('photo_dir', array('type' => 'hidden')); ?>
			</div>
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Slug'));?>
				<?php echo  $this->Form->input("subtitle", array("class"=>"form-control","label"=>__("subtitle"))); ?>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
			<?php echo $this->Form->input('photographer', array('label'=> __('photographer') ,'class' => 'form-control', 'placeholder' => __('photographer')));?>
			</div>
			<!-- <div class="col-md-6 form-group">
			<?php // echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
			</div> -->

			<div class="col-md-6" style="top:20px;">
				<?php echo $this->Form->input('online', array('class' => '', 'label' => 'Online'));?>
					 <?php //	echo $this->Form->input('online',array(
					// 		'label'=>  array('name'=>__(' In line ? '),'class'=>'labelOnline'),
					// 		//'style'=>'margin-left:10px;',
					// 		'required'=>false,
					// 		'type'=>'checkbox',
					// 		//'hiddenField' => false,
					// 		'name'=>'data[portfolio][online]',
					// 		'data-toggle'=>"toggle",
					// 		"data-onstyle"=>"success",
					// 		"data-offstyle"=>"danger",
					// 		'data-style'=>"ios",
					// 		'data-size'=>"mini",
					// 		"data-on"=>__('En Ligne'),
					// 		"data-off"=>__('Hors Ligne'),
					// 		'div'=>array('class'=>'text-right inputOnline'),
					// 		)
					// 		);
					?>
			</div>
		</div>
			<div class="form-group">
				<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'Content'));?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('Carousel.file.remove', array('type' => 'checkbox', 'label' => 'Remove existing file'));
					?>
			</div>
			<div class="form-group text-right">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
	<?php // echo $this->Html->css(array('fileinput.min'),array('inline'=>false)); ?>
	<?php  echo  $this->Html->script(array('bootstrap-toggle.min','fileinput.min','fileinput_locale_fr',
	),array('inline'=>false)); ?>

