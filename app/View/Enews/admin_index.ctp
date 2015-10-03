<div class="page-header" style="">
	<h1><span class="fa fa-newspaper-o"></span>&nbsp;<?= __('newsletter manager'); ?></h1>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info table-responsive box-home">
			<table class="table  table-striped ">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('mail'); ?></th>
						<th><?php echo $this->Paginator->sort('date'); ?></th>
						<th class="" colspan="2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($enews as $k => $v): $v = current($v);?>
					<tr>
						<td> <?= $v['id']; ?></td>
						<td><?= $v['mail']; ?></td>
						<td> <?= $this->Date->french($v['created']); ?></td>
						<td class=""><?php echo $this->Html->link("<span class='fa fa-edit fa-2x' ></span>", array('action' => 'edit',
				 			$v['id']),array('class' => 'btn btn-default','escape' =>false)); ?>
				 		</td>
				 		<td>
							<?php echo $this->Html->link(__('<span class="fa fa-trash fa-2x" ></span>'),'#UsersModal',
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
				</tbody>
			</table>
		</div>
			<?= $this->Paginator->numbers(); ?>
	</div> <!-- end col-md-12 -->
	<div class="col-md-3 ">
		<div class="panel panel-info box-home">
			<div class="panel-heading">Actions</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link(__('<span class="fa fa-plus"></span>&nbsp;&nbsp;New'), array('action' => 'add'), array('escape' => false)); ?>
					</li>
				</ul>
			</div><!-- end body -->
		</div><!-- end panel -->
	</div><!-- end col md 3 --></div>
<div class="modal fade" id="UsersModal"> <!-- boite modal pour supprime -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-danger" >
				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo __(' close'); ?>">&times;</button>
				<h4 id="myModalLabel"></h4> --><?php echo __('Remove user') ?>
			</div>
			<div class="modal-body">
				<p>&nbsp;</p>
				<p><?php echo __('Are you sure you want to delete '); ?><b style="color:#f00;"><?php echo __('&nbsp; '. $v['id'].' &nbsp;'); ?></b><?php echo __(' permanently from your users'); ?>
					<span class="label-uname strong"></span> ?</p>
					<p>&nbsp;</p>
			</div>
			<div class="modal-footer" style="background-color:#2b2b2b;color:#fff;">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



