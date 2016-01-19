	<div class="page-header">
		<h1><?php echo __('Add Picture to home page'); ?></h1>
	</div>
	<div class="col-md-7 col-md-offset-1">
		<div class="panel panel-info  box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Home', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
					<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				</div>
				<div class="form-group text-right col-md-12">
					<?php echo $this->Form->input('content', array('label'=>'Contenu',"type"=>"textarea" ,"class"=>"textarea1")); ?>
				</div>
				<div class="form-group text-right col-md-12">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
					<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div><!-- end col md 7-->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link('<span class="fa fa-list fa-2x"></span>&nbsp;&nbsp;'.__('List Carousels'),
						array('action' => 'index'), array('escape' => false)); ?>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- end col md 3 -->
	<?php  echo  $this->Html->script(array('tinymce/tinymce.min'),array('inline'=>false)); ?>
<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour le textarea
tinyMCE.init({
    selector: ".textarea1",
    mode:"exact",
    entity_encoding : "raw",
    encoding: "UTF-8",
    theme: "modern",
    language :"fr_FR",
    resize: "both",
    plugins: [
    "wordcount visualblocks visualchars  fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "template paste textcolor emmet visualblocks  code fullscreen "
    ],
});
<?= $this->Html->scriptEnd(); ?>
