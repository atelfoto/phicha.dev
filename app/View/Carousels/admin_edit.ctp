<div class="page-header">
	<h1><?php echo __('Edit Carousel'); ?></h1>
</div>
<div class="row">
<div class="col-md-9 ">
	<div class="panel panel-info  box-home">
		<div class="panel-heading pane-title text-right">
			 <i class="fa fa-check-circle fa-lg "></i>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Carousel', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
			<?php echo $this->Form->input('id');?>
			<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
			<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
			</div>
			<div class="col-md-6">
					<?php echo $this->Form->input('photo', array(
					'type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));
							//	echo  $this->Form->hidden("photo_dir");
								//echo $this->Form->input('photo_dir', array('type' => 'hidden'));
					  ?>
			</div>
			<div class="col-sm-9 form-group">
				<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'contenu',"type"=>"textarea","id"=>"content"));?>
				<p id="compteur" class="text-right"><i>0 mots - 0 Caractere / 250</i></p>
			</div>
			<div class="form-group pull-left active col-sm-3" style="margin-bottom:0px;margin-top:25px;">
						<?php echo $this->Form->input('online',array(
						'label'=>__('Online'),
						'required'=>false,
						'type'=>'checkbox',
						 'name'=>'data[Carousel][online]',
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
				<?php // echo  $this->Form->hidden("Carousel.photo_dir"); ?>
			</div>
			<div class="form-group text-right col-md-12">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div>
</div><!-- end col md 9-->
<div class="col-md-3">
	<div class="panel panel-info box-home">
		<div class="panel-heading pane-title text-right">
			<i class="fa fa-check-circle fa-lg "></i>
		</div>
		<div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
				<li><?php echo $this->Html->link('<span class="fa fa-list"></span>&nbsp;&nbsp;'.__('List Carousel'),
					 		array('action' => 'index'), array('escape' => false)); ?>
				 </li>
			</ul>
		</div>
	</div>
</div><!-- end col md 3 -->
</div>
<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$(document).ready(function(e) {
  $('#content').keyup(function() {
    var nombreCaractere = $(this).val().length;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 160';
    $('#compteur').text(msg);
    if (nombreCaractere > 160) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }
  })
});
<?= $this->Html->scriptEnd(); ?>
