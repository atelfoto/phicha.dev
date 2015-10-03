<div class="page-header">
	<h1><?= __('Edit User') ?></h1>
</div>
<div class="well col-md-8 col-md-offset-2 box-home">
	<?=  $this->Form->create('User',array('action'=>'edit','role'=>'form')); ?>
	<div class="col-md-11 text-right">
		<button  type="submit" class="btn btn-success btn-xs"><i class="fa fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>
			<?= __('Save changes'); ?>
		</button>
			<?= $this->Html->link(__('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>Closed'),
				array('controller' => 'users', 'action' => 'index'),
				array('class'=>'btn btn-default btn-xs','type'=>'button','escape'=>false)); ?>
	</div>
	<div class="col-md-5 col-md-offset-1">
		<?php echo $this->Form->input('username',array('label'=>'Login',"class"=>"disabled form-control", "disabled"=>true)); ?>
	</div>
	<div class="col-md-5">
		<?= $this->Form->input('role',array('label'=>'Role',"class"=>"form-control")); ?>
		<?php echo $this->Form->input('active',array(
			'label'=>__('Online'),
			'required'=>false,
			'type'=>'checkbox',
			 'name'=>'data[User][active]',
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
		<?= $this->Form->input('id'); ?>
		<?=  $this->Form->end(); ?>
	</div>
</div>
<?php echo $this->Html->css(array('bootstrap-toggle'),array('inline'=>false)); ?>
<?php  echo  $this->Html->script(array('bootstrap-toggle'),array('inline'=>false)); ?>


