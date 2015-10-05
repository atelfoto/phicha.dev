	<div class="page-header">
		<h1><?php echo __('edit home'); ?></h1>
	</div>
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-info  box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Home', array("novalidate"=>'novalidate')); ?>
				<?php echo $this->Form->input('id');?>
				<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="contenu">
						<div class="form-group col-md-6">
							<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
						</div>
						<div class="form-group text-right col-md-12">
							<?php echo $this->Form->input('content', array('label'=>'Contenu',"type"=>"textarea" ,"class"=>"textarea1")); ?>
						</div>
					</div> <!-- /tab-contenu -->
					<div role="tabpanel" class="tab-pane" id="publication">
						<?php echo $this->Form->input('keywords',array('label'=>__('keywords'),"class"=>"form-control","name"=>'data[Home][keywords]')); ?>
						<?php echo  $this->Form->input("robots", array("class"=>"form-control","type"=>"select","name"=>'data[Home][robots]',
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
				</div> <!-- tab-content -->
				<div class="form-group text-right col-md-12">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>
					<?php echo $this->Form->end() ?>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div><!-- end col md 7-->
	<div class="col-md-3">
		<div class="panel panel-info box-home">
			<div class="panel-heading pane-title text-right">
				<i class="fa fa-check-circle fa-lg "></i>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?php echo $this->Html->link(__('<span class="fa fa-list fa-2x"></span> &nbsp;&nbsp;home'),
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
