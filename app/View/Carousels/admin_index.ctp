<div class="page-header">
	<h1><i class="fa fa-file-image-o">&nbsp;</i><?php echo __('Carousel'); ?></h1>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info table-responsive box-home">
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
						<th class="actions" colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($carousels as $carousel): ?>
						<tr>
							<td><?php echo h($carousel['Carousel']['id']); ?>&nbsp;</td>
							<td class="admin-edit-thumb img-thumbnail">
								<?php echo  $this->Html->image('../files/carousel/photo/' . $carousel['Carousel']['photo_dir'] . '/' . 'thumb_' .$carousel['Carousel']['photo'],
								array("url"=> array("controller"=>'carousels','action'=>'view',"slug"=>$carousel['Carousel']['slug'],"admin"=>false ))); ?>
							</td>
							<td><?php echo h($carousel['Carousel']['name']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($carousel['User']['name'], array(
								'controller' => 'users', 'action' => 'view', $carousel['User']['id'])); ?>
							</td>
							<td><?php echo $this->Date->french($carousel['Carousel']['created']); ?>&nbsp;</td>
							<td><?php echo $this->Date->french($carousel['Carousel']['modified']); ?>&nbsp;</td>
							<td><?php if($carousel['Carousel'][ 'online' ] == 0) {echo $this->Html->link('<span class="label label-danger">'.__("Offline").'</span>',
								array('action'=>'enable', $carousel['Carousel']['id']),
								array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
									"data-placement"=>"top", "title"=>__('Enable this picture'),'escape'=>false));
						}else{
							echo $this->Html->link('<span class="label label-success">'.__("In line").'</span>',
								array('action'=>'disable', $carousel['Carousel']['id']),
								array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
									"data-placement"=>"top", "title"=>__('Disable this picture'),'escape'=>false));
						}
						?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link('<span class="fa fa-edit fa-2x"></span>',
								array('action' => 'edit', $carousel['Carousel']['id']),
								array('class' => 'btn btn-default btn-sm',
											'escape' => false,
											"data-title"=>__("edit"),
											"data-toggle"=>"tooltip",
											"data-placement" =>"top"
						)); ?>
					</td>
					<td>
						<p data-placement="top" data-toggle="tooltip" title="<?= __('delete'); ?>" class="text-center">
							<?php echo $this->Html->link('<span class="fa fa-trash	fa-2x"></span>',$carousel['Carousel']['id'],
								array('class' => 'btn btn-default btn-remove-modal btn-sm',
									'escape' =>false,
									'data-toggle' => 'modal',
									"data-target"=>"#delete-".$carousel['Carousel']['id'],
									"data-title"=> __('delete'),
									'role'  => 'button',
									'data-uid' => $carousel['Carousel']['id']
									));
									?>
						</p>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div><!-- end col md 9 -->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading">Actions</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link('<span class="fa fa-plus"></span>&nbsp;&nbsp;'.__("New picture"), array('action' => 'add'), array('escape' => false)); ?>
					</li>
				</ul>
			</div><!-- end body -->
		</div><!-- end panel -->
	</div><!-- end col md 3 -->
	<div class="col-md-12 text-center">
		<?php echo $this->element('pagination-counter'); ?>
		<?php echo $this->element('pagination'); ?>
	</div> <!-- end col-md-12 -->
</div><!-- row end containing of content -->
<?php foreach ($carousels as $k => $v): $v = current($v); ?>
<div class="modal fade" id="delete-<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="<?php echo __('close'); ?>">&times;
				</button>
				<h4>
					<i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
					&nbsp;&nbsp;<?php echo __('Remove Picture'); ?>
				</h4>
			</div>
			<div class="modal-body">
				<p>
					<?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;"><?php echo  $v['name'] ?></b>&nbsp;
					<?php echo __('of your Carousel') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?>
				</button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
				array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?>
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button>
				<h4 id="myModalLabel"><?= __('Help') ?></h4>
			</div>
			<div class="modal-body">
				<p>&nbsp;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Closed') ?></button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
