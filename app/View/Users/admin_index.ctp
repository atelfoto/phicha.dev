<div class="page-header" style="">
	<h1><span class="fa fa-users"></span>&nbsp;<?= __('User Manager'); ?></h1>
</div>
<div class="row">
	<div class="col-md-12">
		<p class='text-right'>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-plus'></i> Add user"),array('action'=>'signup'),array(
			'class'=>"btn btn-success btn-xs","escape"=>false)); ?>
		</p>
	</div>
	<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-bordered table-striped ">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?= __('User'); ?></th>
				<th><?= __('firstname'); ?></th>
				<th><?= __('email'); ?></th>
				<th><?= __('Role') ?></th>
				<th><?= __('Registration Date'); ?></th>
				<th><?= __('Last Visit Date'); ?></th>
				<th><?= __('online'); ?></th>
				<th>&nbsp;</th>
			</tr>
			<?php foreach ($users as $k => $v): $v = current($v);?>
				<tr>
					<td> <?= $v['id']; ?></td>
					<td> <?= $v['username']; ?></td>
					<td><?= $v['firstname']; ?></td>
					<td><?= $v['mail']; ?></td>
					<td> <?= $v['role']; ?></td>
					<td> <?= $this->Date->french($v['created']); ?></td>
					<td> <?= $this->Date->french($v['lastlogin']); ?></td>
					<td><?php if($v[ 'active' ] == 0) {
						echo $this->Html->link('<span class="label label-danger">Hors ligne</span>', array('action'=>'enable', $v['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top", "title"=>__('Enable  '). $v["username"],'escape'=>false));
					}else{
						echo $this->Html->link('<span class="label label-success">En ligne</span>', array('action'=>'disable', $v['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top", "title"=>__('Disable  ') . $v["username"],'escape'=>false));
					}
					?>
					</td>
					<td>	<?php echo $this->Html->link("<i class='glyphicon glyphicon-pencil' style='color:#00f;'></i> Editer", array('action' => 'edit',
			 			$v['id']),array('class' => 'btn btn-default','escape' =>false)); ?>
					&nbsp;&nbsp;
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash" style="color:#f00;""></i> Delete'),'#UsersModal',
              				array(
              				  'class' => 'btn btn-default btn-remove-modal',
              				  'escape' =>false,
              				  'data-toggle' => 'modal',
              				  'role'  => 'button',
              				  'data-uid' => $v['id']
               				));
              		?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<?= $this->Paginator->numbers(); ?>
	</div>
	</div>
</div>

<div class="modal fade" id="UsersModal">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header modal-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo _(' Press Esc to close'); ?>">&times;</button>
				<h4 id="myModalLabel"><?php echo __('Remove user') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete '); ?><b style="color:#f00;"><?php echo __('&nbsp; '. $v['username'].' &nbsp;'); ?></b><?php echo __(' permanently from your users'); ?>
					<span class="label-uname strong"></span> ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



