<?php echo $this->fetch('title');?> <?= $this->assign('title', "Livre d'or"); ?>
<?= $this->Html->meta("description", "Commentaires de nos clients", array('inline'=>false)); ?>
<?php $this->Html->addCrumb("livre d'or",array("controller"=>"comments","action"=>"index"),array('class'=>"btn btn-default disabled")); ?>
<div class="container">
<div class="page-header text-center">
<h1><?php echo __("livre d'or"); ?></h1>
</div>
<div class="row">
<!--nocache-->
<div class="">
<?php echo $this->Form->create('Comment', array(
'inputDefaults' => array(
'div' => 'form-group',
'label' => array(
'class' => 'col col-md-2 control-label'
),
'wrapInput' => 'col col-md-9',
'class' => 'form-control ',
'required'=>false,
),
'class' => 'well form-horizontal col-md-11 col-md-offset-1 box-home'
)); ?>
<h3 class="col-md-offset-2">
<strong><?php echo $this->Paginator->counter(array('format' => __('{:count} ')));?>Commentaires </strong>
</h3>
<?php echo $this->Form->input('name', array(
'placeholder' => 'nom'
)); ?>
<?php echo $this->Form->input('mail', array(
'placeholder' => 'Email'
)); ?>
<?php echo $this->Form->input('content', array(
'wrapInput' => 'col col-md-9 col-md-offset-2',
'label' => false,
'class' => "form-control",
'type'=>"textarea",
"placeholder"=>"votre commantaire..."
)); ?>
<?= $this->Form->input('website', array('label'=>false,'type'=>'text',
//'class'=>'toto'
)); ?>
<div class="form-group text-right">
<?php echo $this->Form->submit('envoyer', array(
'div' => 'col col-md-8 col-md-offset-3',
'class' => 'btn btn-primary'
)); ?>
</div>
<?php echo $this->Form->end(); ?>
</div>
<!--/nocache-->
<div class="comment-list">
<?php foreach ($comments as $comment):?>
<article class="row ">
<div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs ">
<div class="box-home">
<figure class="thumbnail ">
<?php echo  $this->Html->image('http://2.gravatar.com/avatar/bb635f3898368fa2aab6af5b91fb3c04?s=148&amp;d=mm&amp;r=g',array('alt'=>'avatar',"class"=>"img-responsive")); ?>
<figcaption class="text-center"> <?php echo  h($comment['Comment']['name']); ?></figcaption>
</figure>
</div>
</div>
<div class="col-md-9 col-sm-9 ">
<div class="panel panel-default arrow left box-home">
<div class="panel-body">
<header class="text-left">
<h3 class="comment-user text-capitalize"><i class="glyphicon glyphicon-user">&nbsp;</i>
<strong><?php echo  h($comment['Comment']['name']); ?></strong>
</h3>
<div class="comment-date" >
<i class="glyphicon glyphicon glyphicon-time">&nbsp;</i>
<small><?= $this->Time->i18nFormat($comment['Comment']['created'],'Le %A %d %B à %H:%M'); ?>
<?= $this->Time->timeAgoInWords($comment['Comment']['created'],
array('accuracy' => array('month' => 'month'),'end' => '2 years')); ?>
</small>
</div>
</header>
<div class="comment-post" style="margin-top:10px;">
<blockquote>
<p><?php echo $this->Text->truncate($comment['Comment']['content'],250,array('exact' =>true,'html'=> true)); ?>
</p>
</blockquote>
</div>
<p class="text-right"><a href="#" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-circle-arrow-right"></i> reply</a></p>
</div>
</div>
</div>
</article>
<?php endforeach; ?>
</div>
<div class="col-md-12 text-center">
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?>
</div>
</div>
</div>
