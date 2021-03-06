<div class="page-header" >
	<h1><span class="fa fa-users"></span>&nbsp;<?= __('User Manager'); ?></h1>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info table-responsive box-home">
			<table class="table table-bordered table-striped ">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?= __('User'); ?></th>
						<th><?= __('firstname'); ?></th>
						<th><?= __('email'); ?></th>
						<th><?= __('Role') ?></th>
						<th><?= __('Registration Date'); ?></th>
						<th><?= __('Last Visit Date'); ?></th>
						<th><?= __('online'); ?></th>
						<th class="actions" colspan="2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
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
							<td class="actions">
								<?php echo $this->Html->link("<span class='fa fa-edit fa-2x' ></span>",
											array('action' => 'edit',$v['id']),
											array('class' => 'btn btn-default',
											'escape' =>false,
											"data-title"=>__("edit"),
											"data-toggle"=>"tooltip",
											"data-placement" =>"top"
								)); ?>
							</td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="<?= __('delete'); ?>" class="text-center">
									<?php echo $this->Html->link('<span class="fa fa-trash fa-2x" ></span>',$v['id'],
										array(
												'class' => 'btn btn-default btn-remove-modal',
												'escape' =>false,
												'data-toggle' => 'modal',
												"data-target"=>"#delete",
												"data-title"=> __('delete'),
												'role'  => 'button',
												'data-uid' => $v['id']
												));
									?>
								</p>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
				<?= $this->Paginator->numbers(); ?>
		</div>
	</div>
	<div class="col-md-3 ">
		<div class="panel panel-info box-home">
			<div class="panel-heading">Actions</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link('<span class="fa fa-plus"></span>&nbsp;&nbsp;'.__('New user'), array('action' => 'signup'), array('escape' => false)); ?>
					</li>
				</ul>
			</div><!-- end body -->
		</div><!-- end panel -->
	</div><!-- end col md 3 -->
</div>
<?php foreach ($users as $kk => $vv): $vv = current($vv);?>
<div class="modal fade" id="delete-<?= $vv['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header modal-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo _(' Press Esc to close'); ?>">&times;</button>
				<h4 id="myModalLabel"><?php echo __('Remove user') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete '); ?><b style="color:#f00;"><?php echo '&nbsp; '. $vv['username'].' &nbsp;'; ?></b><?php echo __(' permanently from your users'); ?>
					<span class="label-uname strong"></span> ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$vv['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?>



