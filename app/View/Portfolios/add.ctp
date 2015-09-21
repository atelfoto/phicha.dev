<div class="portfolios form">
<?php echo $this->Form->create('Portfolio'); ?>
	<fieldset>
		<legend><?php echo __('Add Portfolio'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('subtitle');
		echo $this->Form->input('slug');
		echo $this->Form->input('photographer');
		echo $this->Form->input('content');
		echo $this->Form->input('type');
		echo $this->Form->input('photo');
		echo $this->Form->input('photo_dir');
		echo $this->Form->input('online');
		echo $this->Form->input('user_id');
		echo $this->Form->input('remove');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
