<?php $this->set('title_for_layout', __('forgot'));  ?>
<?php $this->Html->addCrumb('forgot',array("controller"=>"users","action"=>"forgot"),array('class'=>"btn btn-default","disabled"=>"disabled")); ?>
<div class="container forgot" style="padding-bottom:50px;">
	<div class="col-md-6 col-md-offset-3 centered-form">
		<div class="panel panel-primary box-home">
			<div class="text-center panel-heading"> <?= __('forgot'); ?>
			</div>
			<div class="panel-body text-center">
				<fieldset>
					<legend> <?= __('Password Reminder'); ?></legend> <!-- Rappel du Mot de passe -->
					<p><?php echo __('To change your password please fill in the fields below your email address.');
					         echo "<br>";
					         echo __('An email will be sent with the information needed to create your new password'); ?>
					</p>
					<?=  $this->Form->create('User'); ?>
					<?=  $this->Form->input('mail',array('label'=>__('Your Mail'),'placeholder'=>__('Your Email'),'class'=>'form-control ')); ?>
				</fieldset>
			</div>
			<div class="panel-footer">
				<div class="button text-right" style='margin-top:10px;'>
					<button id='button' type="submit" class="btn btn-primary"> <?= __('Submit'); ?></button>
				</div>
			</div>
			<?=  $this->Form->end(); ?>
		</div>
	</div>
</div>

<!-- Pour changer votre mot de passe veuillez renseigner dans le champs ci-dessous votre adresse Email.
Un mail vous sera envoyé avec les informations nécessaires à la création de votre nouveau mot de passe -->
