<div class="container" style="margin-bottom:50px;padding-bottom:50px;">
	<div class="col-md-4 col-md-offset-5">
		<fieldset>
    		<legend><?= __('Change password') ; ?></legend>
			 <?= $this->Form->create('User'); ?>
		     <?= $this->Form->input('password', array('label' => __('Password') )); ?>
		     <?= $this->Form->input('password2', array('type'=>'password', 'label' => __('Confirm Password') )); ?>
		       <br>
		<?= $this->Form->end("modifier"); ?>
		</fieldset>
	</div>
	<div class="col-md-3">
	</div>
</div>
