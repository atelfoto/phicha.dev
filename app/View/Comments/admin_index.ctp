<div class="page-header">
	<h1>
		<i class="fa fa-book">&nbsp;</i><?php echo __('comments manager'); ?></h1>
</div>
<div class="row">
	<div class="col-md-9 ">
		<div class="panel panel-info box-home table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead style="">
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('mail'); ?></th>
						<th><?php echo $this->Paginator->sort('content'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('online'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($comments as $comment): ?>
					<tr>
						<td><?php echo h($comment['Comment']['id']); ?>&nbsp;</td>
						<td><?php echo h($comment['Comment']['name']); ?>&nbsp;</td>
						<td><?php echo h($comment['Comment']['mail']); ?>&nbsp;</td>
						<td><?php echo h($comment['Comment']['content']); ?>&nbsp;</td>
						<td><?php echo $this->Date->french($comment['Comment']['created']); ?>&nbsp;</td>
						<td><?php if($comment['Comment'][ 'online' ] == 0) {echo $this->Html->link(__('<span class="label label-danger">Offline</span>'),
						 	array('action'=>'enable', $comment['Comment']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top", "title"=>__('Enable this post'),'escape'=>false));
							}else{
							echo $this->Html->link(__('<span class="label label-success">In line</span>'), array('action'=>'disable', $comment['Comment']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top", "title"=>__('Disable this Post'),'escape'=>false));
							}
							?>
						</td>
						<td class="actions">
							<p data-placement="top" data-toggle="tooltip" title="Delete" class="text-center">
							<?php echo $this->Html->link('<span class="fa fa-trash fa-2x" ></span>',$comment['Comment']['id'],
              				array(
              				  'class' => 'btn btn-default btn-remove-modal btn-sm',
              				  'escape' =>false,
              				  'data-toggle' => 'modal',
												"data-target"=>"#delete",
												"data-title"=> __('delete'),
              				  'role'  => 'button',
              				  'data-uid' => $comment['Comment']['id']
              				  ));
              ?>
              </p>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> <!-- end col md 9 -->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading">Actions</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li>
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
</div>
<div class="modal fade" id="delete">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
			<p>&nbsp;</p>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;">
					<?php echo  $comment['Comment']['name'] ?></b>&nbsp;
					<?php echo __('of your Articles') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$comment['Comment']['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal delete-->
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
