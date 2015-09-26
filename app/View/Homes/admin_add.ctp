<div class="portfolios form">
	<div class="page-header">
		<h1><?php echo __('Add Picture to background'); ?></h1>
	</div>
	<div class="col-md-7 col-md-offset-1">
		<div class="panel panel-info  box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Home', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('slug', array('class' => 'form-control','label'=>'Url', 'placeholder' => 'url'));?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input('Home.photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));  ?>
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
							'name'=>'data[Home][online]',
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
						<?php echo  $this->Form->hidden("Home.photo_dir"); ?>
				</div>
				<div class="form-group col-md-12">
					<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'Content'));?>
				</div>
				<div class="form-group text-right">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
					<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div><!-- end col md 7-->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading">
				<h3 class="panel-title text-left">
					Actions
				</h3>
				<i class="fa fa-check-circle fa-lg pull-right"></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link(__('<span class="fa fa-list fa-2x"></span>&nbsp;&nbsp;List Carousels'),
						array('action' => 'index'), array('escape' => false)); ?>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- end col md 3 -->
</div>
	<?php  echo  $this->Html->script(array('bootstrap-toggle.min','fileinput.min','fileinput_locale_fr'
	),array('inline'=>false)); ?>

