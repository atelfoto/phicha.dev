<div class="page-header">
	<h1>
		<i class="fa fa-file-image-o">&nbsp;</i><?php echo __('portfolios manager'); ?>
	</h1>
</div>
<div class="row">
<div class="col-md-9 ">
	<div class="panel panel-info  box-home">
		<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
		</div>
		<div class="panel-body tab-content">
			<div role="tabpanel" class="tab-pane active " id="contenu">
				<div class="  table-responsive">
					<table cellpadding="0" cellspacing="0" class="table table-striped">
						<thead style="">
							<tr class="">
								<th><?php echo $this->Paginator->sort('id'); ?></th>
								<th><?php echo '#'; ?></th>
								<th><?php echo $this->Paginator->sort('name'); ?></th>
								<th><?php echo $this->Paginator->sort('user_id'); ?></th>
								<th><?php echo $this->Paginator->sort('created'); ?></th>
								<th><?php echo $this->Paginator->sort('modified'); ?></th>
								<th class="actions" colspan="3"><?php echo $this->Paginator->sort('online'); ?></th>
								<!-- <th class="actions" colspan="2"></th> -->
							</tr>
						</thead>
						<tbody>
							<?php foreach ($portfolios as $portfolio): ?>
							<tr>
								<td><?php echo h($portfolio['Portfolio']['id']); ?>&nbsp;</td>
								<td class="admin-edit-thumb img-thumbnail">
									<?php echo  $this->Html->image('../files/portfolio/photo/' . $portfolio['Portfolio']['photo_dir'] . '/' . 'thumb_' .$portfolio['Portfolio']['photo'],
									array("url"=> array("controller"=>'portfolios','action'=>'view',"slug"=>$portfolio['Portfolio']['slug'],"admin"=>false ))); ?>
								</td>
								<td><?php echo h($portfolio['Portfolio']['name']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($portfolio['User']['username'], array(
									'controller' => 'users', 'action' => 'view', $portfolio['User']['id'])); ?>
								</td>
								<td><?php echo $this->Date->french($portfolio['Portfolio']['created']); ?>&nbsp;</td>
								<td><?php echo $this->Date->french($portfolio['Portfolio']['modified']); ?>&nbsp;</td>
								<td><?php if($portfolio['Portfolio'][ 'online' ] == 0) {
													echo $this->Html->link('<span class="label label-danger">'.__('Offline').'</span>',
														array('action'=>'enable', $portfolio['Portfolio']['id']),
														array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top",
															"title"=>__('Enable this portfolio'),'escape'=>false));
												}else{
													echo $this->Html->link(__('<span class="label label-success">In line</span>'),
														array('action'=>'disable', $portfolio['Portfolio']['id']),
														array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"top","title"=>__('Disable this Post'),'escape'=>false));
														}
											?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link('<span class="fa fa-edit fa-2x" ></span>',
												array('action' => 'edit', $portfolio['Portfolio']['id']),
												array('class' => 'btn btn-default btn-sm',
													'escape' => false,
													"data-title"=>__("edit"),
													"data-toggle"=>"tooltip",
													"data-placement" =>"top"
													));
									?>
								</td>
								<td>
									<p data-placement="top" data-toggle="tooltip" title="<?= __('delete'); ?>" class="text-center">
										<?php echo $this->Html->link('<span class="fa fa-trash fa-2x" ></span>',$portfolio['Portfolio']['id'],
											array(
												'class' => 'btn btn-default btn-remove-modal btn-sm',
												'escape' =>false,
												'data-toggle' => 'modal',
												"data-target"=>"#delete-".$portfolio['Portfolio']['id'],
												"data-title"=> __('delete'),
												'role'  => 'button',
												'data-uid' => $portfolio['Portfolio']['id'])
												);
										?>
									</p>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class=" text-center">
					<?php  echo $this->element('pagination-counter'); ?>
					<?php  echo $this->element('pagination'); ?>
				</div>
			</div> <!--/ tabpanel#contenu -->
			<div role="tabpanel" class="tab-pane" id="meta">
				<?php echo $this->Form->create("Meta", array("controller"=>"meta","action"=>"index", "novalidate"=>"novalidate","admin"=>true)); ?>
				<?php echo $this->Form->input('Meta.keywords',array('label'=>__('keywords'),"class"=>"form-control","name"=>'data[Meta][keywords]')); ?>
				<?php echo  $this->Form->input("Meta.robots", array("class"=>"form-control","type"=>"select","name"=>'data[Meta][robots]',
						"options"=>array(
							"Paramètres globaux"=>"Paramètres globaux",
							"Index, Follow"=>"Index, Follow",
							"No index, follow"=>"No index, follow",
							"Index, Nofollow"=>"Index, Nofollow",
							"No index, no follow"=>"No index, no follow",
							))); ?>
				<div class="form-group ">
					<?php  echo $this->Form->input('Meta.description',array('label'=>__('description'),'type'=>'textarea',"id"=>"metadescription", "class"=>"form-control" ,"focus")); ?>
					<p id="compteur" class="text-right"><i>0 mots - 0 Caractere / 250</i></p>
				</div>
				<?php echo  $this->Form->end("submit",NULL,array('class'=>"btn btn-default")); ?>

			</div> <!-- /meta -->
		</div> <!-- /tabcontent -->
	</div> <!-- panel-info -->
</div> <!-- end col md 9 -->
<div class="col-md-3">
	<div class="panel panel-info box-home">
		<div class="panel-heading text-right">
			<i class="fa fa-check-circle fa-lg "></i>
		</div>
		<div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation">
					<?php echo $this->Html->link("<span class='fa fa-plus'> ".__("Add portfolio"), array('action' => 'add'),
					 array('escape' => false,)); ?>
				</li>
				<li role="presentation" class="active">
					<a href="#contenu" aria-controls="publications" role="tab" data-toggle="tab">
    				<span class="fa fa-file-archive-o fa-2x"></span>&nbsp;&nbsp; <?php echo __('List Portfolio'); ?>
    			</a>
				</li>
				<li role="presentation">
					<a href="#meta" aria-controls="publications" role="tab" data-toggle="tab">
    				<span class="fa fa-file-archive-o fa-2x"></span>&nbsp;&nbsp; Publication
    			</a>
				</li>
			</ul>
		</div><!-- end body -->
	</div><!-- end panel -->
</div><!-- end col md 3 -->
</div>
<?php foreach ($portfolios as $k => $v): $v = current($v);?>
<div class="modal fade" id="delete-<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="<?php echo __(' close'); ?>">
					&times;
				</button>
				<h4>
					<i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
					&nbsp;&nbsp;<?php echo __('Remove Post') ?>
				</h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;">
						<?php echo  $v['name'] ?>
					</b>&nbsp;
					<?php echo __('of your Portfolio') ?>
					<span class="label-uname strong"></span>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
				array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php endforeach ?><!-- /.modal -->

<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button
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
