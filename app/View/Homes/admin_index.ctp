<div class="portfolios index">
			<div class="page-header">
				<h1><i class="fa fa-file-image-o">&nbsp;</i><?php echo __('Background'); ?></h1>
			</div>
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-info">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New picture'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn btn-xs"data-toggle="modal" data-target="#ModalAide"><i class="glyphicon glyphicon-question-sign">&nbsp;<?= __('Help') ?></i></button>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-plus'></i> Add Picture"),array('action'=>'add'),
			array('class'=>"btn btn-success btn-xs",'escape'=>false)); ?>
		</div>
		<div class="col-md-9 table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead style="">
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo '#'; ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($homes as $home): ?>
					<tr>
						<td><?php echo h($home['Home']['id']); ?>&nbsp;</td>
						<td class="admin-edit-thumb img-thumbnail"><?php echo  $this->Html->image('../files/home/photo/' . $home['Home']['photo_dir'] . '/' . 'thumb_' .$home['Home']['photo'],
						array("url"=> array("controller"=>'homes','action'=>'view',"slug"=>$home['Home']['slug'],"admin"=>false ))); ?></td>
						<td><?php echo h($home['Home']['name']); ?>&nbsp;</td>
						<td>
						<?php echo $this->Html->link($home['User']['name'], array(
						'controller' => 'users', 'action' => 'view', $home['User']['id'])); ?>
						</td>
						<td><?php echo $this->Date->french($home['Home']['created']); ?>&nbsp;</td>
						<td><?php echo $this->Date->french($home['Home']['modified']); ?>&nbsp;</td>
						<td><?php if($home['Home'][ 'online' ] == 0) {echo $this->Html->link(__('<span class="label label-danger">Offline</span>'),
						 	array('action'=>'enable', $home['Home']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom", "title"=>__('Enable this Home'),'escape'=>false));
							}else{
							echo $this->Html->link(__('<span class="label label-success">In line</span>'), array('action'=>'disable', $home['Home']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom", "title"=>__('Disable this Post'),'escape'=>false));
							}
							?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $home['Home']['id']), array('class' => 'btn btn-default btn-sm','escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit" style="color:#00f;"></span>', array('action' => 'edit', $home['Home']['id']), array('class' => 'btn btn-default btn-sm','escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-trash" style="color:#f00;"></span>','#Modal'.$home['Home']['id'],
              				array(
              				  'class' => 'btn btn-default btn-remove-modal btn-sm',
              				  'escape' =>false,
              				  'data-toggle' => 'modal',
              				  'role'  => 'button',
              				  'data-uid' => $home['Home']['id']
              				  )); ?>

						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- end col md 9 -->
		<div class="col-md-12 text-center">
			<?php echo $this->element('pagination-counter'); ?>
			<?php echo $this->element('pagination'); ?>
		</div>
</div><!-- end containing of content -->
<?php // echo $this->Js->writeBuffer(); ?>
<!-- modal supprimer -->
<?php foreach ($homes as $k => $v): $v = current($v);?>
<div class="modal fade" id="Modal<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo __(' Press Esc to close'); ?>">&times;</button>
				<h4><i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
				&nbsp;&nbsp;<?php echo __('Remove Post') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;">
					<?php echo  $v['name'] ?></b>&nbsp;
					<?php echo __('of your Articles') ?>
					<span class="label-uname strong"></span> ?
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
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign" style="color:#f00;"></i></button>
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
