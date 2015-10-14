<?= $this->fetch('title'); ?><?php  echo $this->set('title_for_layout',__('Register'));  ?>
<div class="row centered-form">
	<div class=" col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?= __('Register'); ?></h1>
			</div>
			<div class="panel-body">
				<?= $this->Form->create('User',array('controller'=>'users','action'=>'signup')); ?>
					<fieldset>
	    			    <div class="form-group">
	    			    	<label for="ContactName"> <?= __('Username :'); ?> <i class="fa fa-asterisk"></i></label>
	    			    	<div class="input-group">
										<?= $this->Form->input('username', array('required'=>false,'label' => false,
	    			     		'placeholder'=>__('Username :'),'class'=>'form-control')); ?>
	    			     		<div class="input-group-addon"><i class="fa fa-user"></i>
	    			     		</div>
	    			    	</div>
	    			    </div>
			    			<div class="form-group">
	    			    	<label for="ContactName"> <?= __('Password :'); ?> <i class="fa fa-asterisk"></i></label>
	    			    	<div class="input-group">
			    				<?= $this->Form->input('password', array('required'=>false,'label' => false ,
			    					'placeholder'=>__('Password :'),'class'=>'form-control')); ?>
	    			     		<div class="input-group-addon"><i class="fa fa-lock"></i>
	    			     		</div>
			    			</div>
			    		</div>
			    		<div class="form-group">
	    			    	<label for="ContactName"> <?= __('Confirm Password :'); ?> <i class="fa fa-asterisk"></i></label>
	    			    	<div class="input-group">
			    				<?= $this->Form->input('password2', array('required'=>false,'type'=>'password', 'label' =>false,
			    				'placeholder'=>__('Confirm Password :'),'class'=>'form-control')); ?>
	    			     		<div class="input-group-addon"><i class="fa fa-lock"></i>
	    			     		</div>
	    			     	</div>
			    		</div>
			    		<div class="form-group">
	    			    	<label for="ContactName"> <?= __('Email :'); ?> <i class="fa fa-asterisk"></i></label>
	    			    	<div class="input-group">
			    				<?= $this->Form->input('mail', array('label' => "Email : ",'required'=>false,'label'=>false,
			    				 'placeholder'=>'Email :','class'=>'form-control')); ?>
	    			     		<div class="input-group-addon"><i class="fa fa-envelope"></i>
	    			     		</div>
	    			     	</div>
			    		</div>
			    	</fieldset>
					<div class="button text-right">
						<button id='button' type="submit" class="btn btn-default"> <?= __('Register'); ?></button>
						<button id='button' type="reset" class="btn btn-default"> <?= __('Reset'); ?></button>
					</div>
				<?= $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>


