<?= $this->assign('title', __('Contactez nous')); ?>
<?php  $this->Html->meta('description', "Si vous avez des questions, n'hésitez pas à nous contacter." , array('inline'=> false)); ?>
<?php $this->Html->addCrumb("contact",array("controller"=>"contact","action"=>"index"),array('class'=>"btn btn-default disabled")); ?>
<div class="container page contact index">
	<div class="page-header" id="page-header">
		<h1><?php echo __('Contact'); ?></h1>
	</div>
	<div class=" page-content" id="ajax-contact">
		<div class="centered-form" >
			<div class="alert alert-info text-center" role="alert">
				<p><strong></strong>
					<?= __('Vous désirez nous joindre ? Merci d’utiliser ce formulaire de contact.'); ?>
				</p>
				<p><small>Pour nous rendre visite, 1 rue Franche à Langres Le Mercredi et Samedi de 10h à 12 h et de 14h à 18 h ou sur rendez-vous</small></p>
			</div>
			<div class="box-home">
				<div class="panel panel-default">
					<div class="panel-heading text-center header">
						<?= 'Contactez nous'; ?>
					</div>
					<?= $this->Form->create('Contact') ; ?>
					<div class="panel-body text-center">
						<p class='text-left'><i class="glyphicon glyphicon-asterisk"></i>&nbsp;
							<?= __('Required field:'); ?>
						</p>
							<div class="row">
								<div class="form-group required col-md-6">
									<label for="ContactName"> <?= __('Your Name :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
										</div>
										<?=  $this->Form->input('name', array('label' => false,'required'=>false,'class'=>"form-control","placeholder"=>__('Your Name :'))); ?>
									</div>
								</div> <!--/ col-md-6 -->
								<div class="form-group required col-md-6">
									<label for="ContactEmail"> <?= __('Your Email :'); ?> <i class="glyphicon glyphicon-asterisk"></i></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon  glyphicon-envelope"></i>
										</div>
										<?=  $this->Form->input('email', array('label' => false,'type'=>'email',
										'required'=>false,'class'=>"form-control",	"placeholder"=> __('Your Email :'))); ?>
									</div>
								</div> <!-- /col-md-6 -->
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
								</div> <!-- /col-md-6 -->
								<div class="form-group required col-md-6">
									<label for="ContactMobile"> <?= __('Your Mobile'); ?>:&nbsp;<i class="glyphicon glyphicon-asterisk"></i></label>
									<div class="input-group">
										<div class="input-group-addon"><i class="glyphicon  glyphicon-phone"></i>
										</div>
										<?=  $this->Form->input('mobile', array('label' => false,'type'=>'tel',
										'required'=>false,'class'=>"form-control",	"placeholder"=> __('Your Mobile'))); ?>
									</div>
								</div> <!-- /col-md-6 -->
							</div>
							<?=  $this->Form->input('subject', array('label'=>__('Subject').' :&nbsp;<i class="glyphicon glyphicon-asterisk"></i>',
							'required'=>false,'class'=>"form-control","placeholder"=>__("Subject of your message:"))); ?>
							<div class="form-group required">
								<label for="ContactMessage"> <?= __('Your Message '); ?>:&nbsp;<i class="glyphicon glyphicon-asterisk"></i></label>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa "></i>
									</div>
									<?=  $this->Form->input('message', array('label' => false,'type'=>'textarea :','required'=>false,
									'class'=>"form-control",	"placeholder"=> __('Enter Your message ...'),'style'=>"width: 100%;",'cols'=>"15")); ?>
								</div>
								<?= $this->Form->input('website', array('label'=>false,'type'=>'text','class'=>'toto')); ?>
							</div>
					</div>
					<div class="panel-footer">
						<div class="text-right">
							<button  type="submit" class="btn btn-primary "> <?= __('Submit'); ?></button>
							<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
						</div>
					</div>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="">
		<div class="centered-form box-home">
			<div class="panel panel-default">
				<div class="panel-body text-center">
					<div id="map1" class="map col-xs-12">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- </div> -->
<?=  $this->Html->script("https://maps.google.com/maps/api/js?sensor=false",array('inline'=>false));; ?>
<?= $this->Html->scriptStart(); ?>
jQuery(function ($) {
$(function () {
$('#myTab a:last').tab('show')
});
function init_map1() {
var myLocation = new google.maps.LatLng(47.863527,5.336689 );
var mapOptions = {
center: myLocation,
zoom: 15
};
var marker = new google.maps.Marker({
position: myLocation,
title: "Property Location"
});
var map = new google.maps.Map(document.getElementById("map1"),
mapOptions);
marker.setMap(map);
}
init_map1();
});
<?=  $this->Html->scriptEnd(); ?>






