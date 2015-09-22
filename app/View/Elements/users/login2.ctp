<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title"><?= __('Login'); ?></h1>
	</div>
	<div class="panel-body">
		<?= $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
		<fieldset>
			<div class="form-group">
				<label for="username"> <?= __('Username :'); ?> <i class="fa fa-asterisk"></i></label>
				<div class="input-group">
					<?= $this->Form->input('username', array('required'=>false,'label' => false,
					'placeholder'=>__('Username :'),'class'=>'form-control')); ?>
					<div class="input-group-addon"><i class="fa fa-user"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="password"> <?= __('Password :'); ?> <i class="fa fa-asterisk"></i></label>
				<div class="input-group">
					<?= $this->Form->input('password', array('required'=>false,'label' => false ,
					'placeholder'=>__('Password :'),'class'=>'form-control')); ?>
					<div class="input-group-addon"><i class="fa fa-lock"></i>
					</div>
				</div>
			</div>
			<div class="input checkbox">
				<?php echo  $this->Form->input('remember', array('type'=>'checkbox',
				'label'=>__('Remember me') , 'required'=>false,'class'=>'input')); ?>
				<!-- <label for="UserRemember">Se souvenir de moi ?</label> -->
			</div>
			<ul style="margin-left:-40px; margin-top: 10px;">
				<li>
					<em style=""><?=  $this->Html->link(__('Forgot password?'), array('action' => 'forgot')); ?></em>
				</li>
			</ul>
		</fieldset>
		<div class="text-left">
		<b><i class="fa fa-asterisk"></i></b> <?= __('Required Field'); ?>
		</div>
		<div class="button text-right">
			<button  type="submit" class="btn btn-default"> <?= __('Login'); ?></button>
			<button  type="reset" class="btn btn-default"> <?= __('Reset'); ?></button>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>
