<div class="portfolios form">
	<div class="page-header">
		<h1><?php echo __('Edit picture to background'); ?></h1>
	</div>
	<div class="col-md-7  col-md-offset-1">
		<div class="panel panel-info  box-home">
			<div class="panel-heading panel-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Wallpaper', array('role' => 'form','type'=>"file",'novalidate'=>"novalidate",)); ?>
				<?php echo $this->Form->input('id');?>
				<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group col-md-6">
					<?php  echo $this->Form->input('photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true' ));
					echo $this->Form->input('photo_dir', array('type' => 'hidden')); ?>
				</div>
				<div class="col-md-12 text-right " style="top:-10px;">
					<?php // echo $this->Form->input('online', array('class' => '', 'label' => 'Online'));?>
						<?php echo $this->Form->input('online',array(
						'label'=>__('Online'),
						'required'=>false,
						'type'=>'checkbox',
						//'hiddenField' => false,
						 'name'=>'data[Wallpaper][online]',
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
				<div class="form-group text-right col-md-12">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
				<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div><!-- end col md 7 -->
	<div class="col-md-3 ">
		<div class="panel panel-info box-home ">
			<div class="panel-heading ">
				<h3 class="panel-title text-left">
					Actions
				</h3>
				<i class="fa fa-check-circle fa-lg pull-right"></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link('<span class="fa fa-list fa-2x" style="color:#367fa9;"></span>&nbsp;&nbsp;'. __('List Wallpaper'), array('action' => 'index'), array('escape' => false)); ?>
					</li>
					<li><?php echo $this->Form->postLink('<span class="fa fa-trash fa-2x" style="color:#f00;"></span> &nbsp;&nbsp;'.__("Delete"), array('action' => 'delete', $this->Form->value('Wallpaper.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Wallpaper.id'))); ?>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- end col md 3 -->
</div>
