<?php echo $this->fetch('title');?> <?= $this->assign('title', "Livre d'or"); ?>
<?= $this->Html->meta("description", "Commentaires de nos clients", array('inline'=>false)); ?>
<?php $this->Html->addCrumb("livre d'or",array("controller"=>"comments","action"=>"index"),array('class'=>"btn btn-default disabled")); ?>
<div class="container">
	<div class="page-header text-center">
		<h1><?php echo __("livre d'or"); ?></h1>
	</div>
	<div class="row">
		<section>
			<?php echo $this->Form->create('Comment', array(
				'action'=>'add',
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col col-md-3 control-label'
						),
					'wrapInput' => 'col col-md-9',
					'class' => 'form-control',
					'required'=>false,
					),
				'class' => 'well form-horizontal col-md-11 col-md-offset-1'
				)); ?>
			<?php echo $this->Form->input('name', array(
				'placeholder' => 'nom'
				)); ?>
			<?php echo $this->Form->input('mail', array(
				'placeholder' => 'Email'
				)); ?>

			<?php echo $this->Form->input('content', array(
				'wrapInput' => 'col col-md-9 col-md-offset-3',
				'label' => false,
				'class' => "form-control",
				'type'=>"textarea"
				)); ?>
				<?= $this->Form->input('website', array('label'=>false,'type'=>'text','class'=>'toto ')); ?>
				<div class="form-group text-right">
						<?php echo $this->Form->submit('envoyer', array(
						'div' => 'col col-md-9 col-md-offset-3',
						'class' => 'btn btn-primary'
						)); ?>
				</div>
					<?php echo $this->Form->end(); ?>
		</section>
		<section class="comment-list">
		<?php foreach ($comments as $comment):?>
			<article class="row">
				<div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
					<figure class="thumbnail">
					<?php echo  $this->Html->image('default-avatar.jpg',array('alt'=>'avatar',"class"=>"img-responsive")); ?>
						<figcaption class="text-center"> <?php echo  h($comment['Comment']['name']); ?></figcaption>
					</figure>
				</div>
				<div class="col-md-9 col-sm-9">
					<div class="panel panel-default arrow left">
						<!-- <div class="panel-heading right">Reply</div> -->
						<div class="panel-body">
							<header class="text-left">
								<div class="comment-user text-capitalize"><i class="glyphicon glyphicon-user">&nbsp;</i>
									<strong>
										<?php echo  h($comment['Comment']['name']); ?>
									</strong>
								</div>
								<time class="comment-date" datetime="<?php echo $this->Date->french($comment['Comment']['created']); ?>"><i class="glyphicon glyphicon glyphicon-time">&nbsp;</i><?php echo $this->Date->french($comment['Comment']['created']); ?></time>
							</header>
							<div class="comment-post">
								<p>
									<?php echo $this->Text->truncate($comment['Comment']['content'],128,array('exact' =>true,'html'=> true)); ?>
								</p>
							</div>
							<p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-circle-arrow-right"></i> reply</a></p>
						</div>
					</div>
				</div>
			</article>
		</section>
	<?php endforeach; ?>
			<div class="col-md-12 text-center">
			<?php echo $this->element('pagination-counter'); ?>
			<?php echo $this->element('pagination'); ?>
		</div>
	</div>
</div>


