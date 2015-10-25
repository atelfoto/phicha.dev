<?php $this->Html->addCrumb('login',array("controller"=>"users","action"=>"login"),array('class'=>"btn btn-default")); ?>
<div class="panel panel-primary box-home">
	<div class="panel-heading">
		<h1 class="panel-title"><?= __('Login'); ?></h1>
	</div>
	<div class="panel-body ">
		<?= $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
		<fieldset>
			<div class="form-group required">
				<label for="username"> <?= __('Username :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
				<div class="input-group">
					<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i>
					</div>
					<?= $this->Form->input('username', array('required'=>false,'label' => false,
					'placeholder'=>__('Username :'),'class'=>'form-control','autofocus'=>true)); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password"> <?= __('Password :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
				<div class="input-group">
					<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i>
					</div>
					<?= $this->Form->input('password', array('required'=>false,'label' => false ,
					'placeholder'=>__('Password :'),'class'=>'form-control')); ?>
				</div>
			</div>
			<div class="input checkbox">
				<?php echo  $this->Form->input('remember', array('type'=>'checkbox', "checked"=>true,
				'label'=>__('Remember me') ,'div'=>false, 'required'=>false,'class'=>'input')); ?>
				<!-- <label for="UserRemember">Se souvenir de moi ?</label> -->
			</div>
			<ul style="margin-left:-40px; margin-top: 10px;">
				<li>
					<em style=""><?=  $this->Html->link(__('Forgot password?'), array('action' => 'forgot')); ?></em>
				</li>
			</ul>
		</fieldset>
		<div class="text-left">
		<b><i class="glyphicon glyphicon-asterisk"></i></b> <?= __('Required Field'); ?>
		</div>
		<div class="button text-right">
			<button  type="submit" class="btn btn-primary"> <?= __('Login'); ?></button>
			<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>
