<div class="page-header">
	<h1><?php echo __('Edit')." ". __('Portfolio'); ?></h1>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Portfolio', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
				<?php echo $this->Form->input('id');?>
				<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="contenu">
						<div class="row">
							<div class="form-group col-md-6">
								<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
							</div>
							<div class="form-group col-md-6">
								<?php echo $this->Form->input('slug', array('class' => 'form-control','label'=>'Url', 'placeholder' => 'url'));?>
								<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
							</div>
						</div> <!-- /row -->
						<div class="row">
							<div class="col-md-6">
								<?php echo $this->Form->input('Portfolio.photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));  ?>
								<?php echo $this->Form->input('photographer', array('class' => 'form-control', "label"=> __('photographer'), 'placeholder' => __('photographe')));?>
							</div> <!-- /col-md-6 -->
							<div class="col-md-6">
								<div class="form-group">
									<?php echo  $this->Form->input("subtitle", array("class"=>"form-control",'label'=> __('subtitle'),"placeholder"=>__('subtitle'))); ?>
								</div>
								<div class="form-group pull-left active " style="margin-bottom:0px;margin-top:25px;">
									<?php echo $this->Form->input('online',array(
										'label'=>__('Online'),
										'required'=>false,
										'type'=>'checkbox',
										'name'=>'data[Portfolio][online]',
										'data-toggle'=>"toggle",
										"data-onstyle"=>"success",
										"data-offstyle"=>"danger",
										'data-style'=>"ios",
										'data-size'=>"mini",
										"data-on"=>__('En Ligne'),
										"data-off"=>__('Hors Ligne'),
										'div'=>array('class'=>'text-right '),
										));
										?>
								</div>
								<?php echo  $this->Form->hidden("Portfolio.photo_dir"); ?>
							</div> <!-- /col-md-6 -->
						</div> <!-- /row -->
						<div class="form-group ">
							<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'Content'));?>
						</div>
					</div><!-- end tab-panel contenu-->
					<div role="tabpanel" class="tab-pane" id="publication">
						<?php echo $this->Form->input('keywords',array('label'=>__('keywords'),"class"=>"form-control","name"=>'data[Portfolio][keywords]')); ?>
						<?php echo  $this->Form->input("robots", array("class"=>"form-control","type"=>"select","name"=>'data[Portfolio][robots]',
								"options"=>array(
									"Paramètres globaux"=>"Paramètres globaux",
									"Index, Follow"=>"Index, Follow",
									"No index, follow"=>"No index, follow",
									"Index, Nofollow"=>"Index, Nofollow",
									"No index, no follow"=>"No index, no follow",
									))); ?>
						<div class="form-group ">
							<?php  echo $this->Form->input('description',array('label'=>__('description'),'type'=>'textarea', "class"=>"form-control")); ?>
						</div>
					</div> <!-- /publication -->
				</div> <!-- end tab-content -->
				<div class="form-group pull-right">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
				<?php echo $this->Form->end() ?>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div><!-- end col md 9 -->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link(__('<span class="fa fa-list fa-2x"></span> &nbsp;&nbsp;List Portfolio'),
						array('action' => 'index'), array('escape' => false)); ?>
					</li>
	    		<li role="presentation" class="active">
	    			<a href="#contenu" aria-controls="contenu" role="tab" data-toggle="tab">
	    				<span class="fa fa-file-text-o fa-2x"></span>&nbsp;&nbsp; Contenu
	    			</a>
	    		</li>
	    		<li role="presentation">
	    			<a href="#publication" aria-controls="publications" role="tab" data-toggle="tab">
	    				<span class="fa fa-file-archive-o fa-2x"></span>&nbsp;&nbsp; Publication
	    			</a>
	    		</li>
	  		</ul>
			</div>
		</div>
	</div><!-- end col md 3 -->
</div>
<?php  echo  $this->Html->script(array('bootstrap-toggle.min','fileinput.min','fileinput_locale_fr'
		),array('inline'=>false)); ?>
<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$('#publication a[href="#publications"]').tab('show')
<?= $this->Html->scriptEnd(); ?>


