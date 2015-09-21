<div class="portfolios view">
<h2><?php echo __('Portfolio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtitle'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['subtitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photographer'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['photographer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo Dir'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['photo_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Online'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['online']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($portfolio['User']['id'], array('controller' => 'users', 'action' => 'view', $portfolio['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remove'); ?></dt>
		<dd>
			<?php echo h($portfolio['Portfolio']['remove']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Portfolio'), array('action' => 'edit', $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Portfolio'), array('action' => 'delete', $portfolio['Portfolio']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $portfolio['Portfolio']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Portfolios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portfolio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
