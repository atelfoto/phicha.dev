<?php  echo $this->set('title_for_layout',__('Account'));  ?>
 		<div class="page-header">
		 	<h1><?php  echo __('Account'); ?></h1>
		</div>
		<div class="row">
		<div class="col-md-8 col-md-offset-2">
 		<div class="panel panel-primary box-home">
 			<div class="panel-heading">
 				<h1 class="panel-title">&nbsp;</h1>
 			</div>
 			<div class="panel-body ">
 				<div class="col-md-4 text-center">
 					<?php  if ($this->Session->read('Auth.User.avatar')):?>
 						<?=  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),array('class'=>'img-thumbnail')); ?>
 					<?php  endif ?>
 					<?=  $this->Form->create('User',array('type'=>'file','class'=>'form-horizontal')); ?>
 					<div class="form-group form-inline" style="margin-top:10px;">
 						<?php  echo  $this->Form->input('avatarf',array('label'=>false,'type'=>"file",'id'=>'file-0',
 						"required"=>false)); ?>
 						<p class="help-block"><?php echo __("Select a file from your computer") ?></p>
 					</div>
 				</div>
 				<fieldset class="col-md-8 ">
 					<div class="form-group">
 						<?=  $this->Form->input('username', array('label'=>__('Username'),'id'=>'disabledTextInput','class'=>'disabled form-control',
 						'disabled'=>true, 'readonly'=> true,'value'=>$this->Session->read('Auth.User.username'))); ?>
 					</div>
 					<div class="form-group"><?=  $this->Form->input('name', array('label'=> __('Name') ,'class'=>'form-control')); ?></div>
 					<div class="form-group"><?=  $this->Form->input('firstname', array('label'=>__('firstname') ,"class"=>'form-control')); ?></div>
 					<div class="form-group"><?=  $this->Form->input('mail', array('label'=>__('email') ,"class"=>'form-control')); ?></div>
 					<div class="button text-right">
 						<button  type="submit" class="btn btn-primary"><?= __('Change'); ?> </button>
 						<!-- <button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button> -->
 					</div>
 					<?=  $this->Form->end(); ?>
 				</fieldset>
 			</div>
 		</div>
 	</div>
</div>

<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$("#file-0").fileinput({
	allowedFileExtensions : ['jpg'],
	showUpload: false,
	showCaption: false,
	browseClass: "btn btn-primary ",
});
<?= $this->Html->scriptEnd(); ?>
