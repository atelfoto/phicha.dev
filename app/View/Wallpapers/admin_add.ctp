	<div class="page-header">
		<h1><?php echo __('Add Picture to home page'); ?></h1>
	</div>
	<div class="col-md-7 col-md-offset-1">
		<div class="panel panel-info  box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Wallpaper', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
					<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				</div>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('Wallpaper.photo', array(
						'type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false',
						 'data-show-caption' => 'true'));  ?>
				</div>
				<div class="form-group pull-left active col-md-12">
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
				<?php echo  $this->Form->hidden("Wallpaper.photo_dir"); ?>

				<div class="form-group text-right col-md-12">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
					<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div><!-- end col md 7-->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link('<span class="fa fa-list fa-2x"></span> &nbsp;&nbsp;'.__("List Wallpaper"),
						array('action' => 'index'), array('escape' => false)); ?>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- end col md 3 -->
