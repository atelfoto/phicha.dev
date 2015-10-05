<div class="page-header ">
	<div class="panel  box-home">
		<div class="panel-heading">
			<h1 class=""><i class="fa fa-file-image-o">&nbsp;</i><?php echo __('home manager'); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info table-responsive box-home">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead style="">
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($homes as $home): ?>
						<tr>
							<td><?php echo h($home['Home']['id']); ?>&nbsp;</td>
							<td><?php echo h($home['Home']['name']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($home['User']['name'], array(
								'controller' => 'users', 'action' => 'view', $home['User']['id'])); ?>
							</td>
							<td><?php echo $this->Date->french($home['Home']['created']); ?>&nbsp;</td>
							<td><?php echo $this->Date->french($home['Home']['modified']); ?>&nbsp;</td>
							<td>
								<?php if($home['Home'][ 'online' ] == 0) {echo $this->Html->link(__('<span class="label label-danger">Offline</span>'),
									array('action'=>'enable', $home['Home']['id']),
									array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
										"title"=>__('Enable this page'),'escape'=>false));
									}else{
									echo $this->Html->link(__('<span class="label label-success">In line</span>'),
									array('action'=>'disable', $home['Home']['id']),
									array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
										"title"=>__('Disable this page'),'escape'=>false));
									}
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- end col md 9 -->
	<div class="col-md-3 ">
		<div class="panel panel-info box-home">
			<div class="panel-heading">Actions</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li>
						<?php echo $this->Html->link('<span class="fa fa-edit fa-2x"></span>'.__("edit this homepage"),
									array('action' => 'edit', $home['Home']['id']),
									array("data-toggle"=>"tooltip","data-placement"=>"bottom",
									"title"=>__('edit the homepage'),'escape' => false));
						?>
					</li>
					<li>
						<?php echo $this->Html->link('<span class="fa fa-trash fa-2x" ></span>'. __("delete"),'#Modal'.$home['Home']['id'],
									array(
										'class' => 'btn-remove-modal btn-sm',
										"title"=>__('delete this picture'),
										'escape' =>false,
										'data-toggle' => 'modal',
										'data-toggle-2'=>'tooltip',
										"data-placement"=>"bottom",
										"title"=>__('edit this picture'),
										'role'  => 'button',
										'data-uid' => $home['Home']['id']
						)); ?>
					</li>
				</ul>
			</div><!-- end body -->
		</div><!-- end panel -->
	</div><!-- end col md 3 -->
	<div class="col-md-12 text-center">
		<p>
			<?php echo $this->element('pagination-counter'); ?>
			<?php echo $this->element('pagination'); ?>
		</p>
	</div>
</div><!-- end containing of content -->
<?php foreach ($homes as $k => $v): $v = current($v);?><!-- modal supprimer -->
<div class="modal fade" id="Modal<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo __(' close'); ?>">&times;</button>
				<h4><i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
				&nbsp;&nbsp;<?php echo __('Remove this picture') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;">
					<?php echo  $v['name'] ?></b>
					<span class="label-uname strong"></span><?php echo __('to your background') ?> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?>  <!-- fin modal supprimer -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button>
				<h4 id="myModalLabel"><?= __('Help') ?></h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Closed') ?></button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
