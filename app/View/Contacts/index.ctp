<?= $this->assign('title', __('Contactez nous')); ?>
<?php  $this->Html->meta('description', "Si vous avez des questions, n'hésitez pas à nous contacter." , array('inline'=> false)); ?>
<?php   echo $this->Element('navigation'); ?>
<?php $this->Html->addCrumb("contact"); ?>
<div class="container page container-contact">
<div class="page contact index">
<div class="page-header" id="page-header">
<h1><?php echo __('Contact'); ?></h1>
</div>
<div class="col-xs-12 col-md-12 page-content" id="ajax-contact">
<div class="centered-form" >
<div class="alert alert-info" role="alert">
<p><?= __('Feel free to contact us for any questions or comments you have:'); ?></p>
</div>
<div>
<div class="panel panel-default">
<div class="text-center header"> <?= __('Contact Us'); ?></div>
<div class="panel-body text-center">
<?= $this->Form->create('Contact') ; ?>
<p class='text-left'><i class="glyphicon glyphicon-asterisk"></i>&nbsp;<?= __('Required field:'); ?></p>
<fieldset>
<div class="row">
<div class="form-group required col-md-6">
<label for="ContactName"> <?= __('Your Name :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
<div class="input-group">
<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i>
</div>
<?=  $this->Form->input('name', array('label' => false,'required'=>false,'class'=>"form-control","placeholder"=>__('Your Name :'))); ?>
</div>
</div>
<div class="form-group required col-md-6">
<label for="Contactemail"> <?= __('Your Email :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
<div class="input-group">
<div class="input-group-addon"><i class="glyphicon  glyphicon-envelope"></i>
</div>
<?=  $this->Form->input('email', array('label' => false,'type'=>'email',
'required'=>false,'class'=>"form-control",	"placeholder"=> __('Your Email :'))); ?>
</div>
</div>
</div>
<div class="row">
<div class="form-group required col-md-6">
<label for="ContactPhone"> <?= __('your Phone :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
<div class="input-group">
<div class="input-group-addon"><i class="glyphicon  glyphicon-earphone"></i>
</div>
<?=  $this->Form->input('phone', array('label' => false,
'required'=>false,'class'=>"form-control","placeholder"=> __('your Phone :'))); ?>
</div>
</div>
<div class="form-group required col-md-6">
<label for="ContactMobile"> <?= __('Your Mobile'); ?>:&nbsp;<i class="glyphicon glyphicon-asterisk"></i></label>
<div class="input-group">
<div class="input-group-addon"><i class="glyphicon  glyphicon-phone"></i>
</div>
<?=  $this->Form->input('mobile', array('label' => false,'type'=>'tel',
'required'=>false,'class'=>"form-control",	"placeholder"=> __('Your Mobile'))); ?>
</div>
</div>
</div>
<?=  $this->Form->input('subject', array('label'=>__('Subject :&nbsp;<i class="glyphicon glyphicon-asterisk"></i>'),
'required'=>false,'class'=>"form-control","placeholder"=>__("Subject of your message:"))); ?>
<div class="form-group required">
<label for="ContactMessage"> <?= __('Your Message '); ?>:&nbsp;<i class="glyphicon glyphicon-asterisk"></i></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa "></i>
</div>
<?=  $this->Form->input('message', array('label' => false,'type'=>'textarea :','required'=>false,
'class'=>"form-control",	"placeholder"=> __('Enter Your message ...'),'style'=>"width: 100%;",'cols'=>"15")); ?>
</div>
</div>
<?= $this->Form->input('website', array('label'=>false,'type'=>'text','class'=>'toto ')); ?>
</fieldset>
</div>
<div class="panel-footer">
<div class="text-right">
<button  type="submit" class="btn btn-primary "> <?= __('Submit'); ?></button>
<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
</div>
<?= $this->Form->end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
