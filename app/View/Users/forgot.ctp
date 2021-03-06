<?php $this->set('title_for_layout', __('forgot'));  ?>
<?php $this->Html->addCrumb('forgot',array("controller"=>"users","action"=>"forgot"),array('class'=>"btn btn-default","disabled"=>"disabled")); ?>
<div id="Content" class="main">
	<?= $this->Form->create('User'); ?>
	<fieldset>
		<h2><?= __('Password Reminder'); ?></h2>
		<p style='font-family:"Lora";font-size:0.8em;font-style:italic;'><?php echo __('To change your password please fill in the fields below your email address.');
		         echo "<br>";
		         echo __('An email will be sent with the information needed to create your new password'); ?>
		</p>
		<?= $this->Form->input('mail', array('required'=>false,'label' => __('Your Mail'),
		'placeholder'=>__('Your Mail :'),"div"=>array('style'=>'margin-bottom:20px;'), 'class'=>'form-control')); ?>
		<div class="button text-right">
			<button  type="submit" class="btn btn-primary"> <?= __('Submit'); ?></button>
		</div>
	</fieldset>
	<?= $this->Form->end(); ?>
</div>
<?php  echo $this->element('sidebar'); ?>
<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
if (navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
if ( ((screen.width  >= 480) && (screen.height >= 800)) || ((screen.width  >= 800) && (screen.height >= 480)) || navigator.userAgent.match(/ipad/gi) ) {
//   alert('tablette');
$( function() {
$('#home').vegas({
slides: [
{ src: '/files/wallpaper/photo/1/tablet_01.jpg' },
{ src: '/files/wallpaper/photo/2/tablet_02.jpg' },
{ src: '/files/wallpaper/photo/3/tablet_03.jpg' },
{ src: '/files/wallpaper/photo/4/tablet_04.jpg' },
{ src: '/files/wallpaper/photo/5/tablet_05.jpg' },
]
});
});
} else {
//   alert('mobile');
$( function() {
$('#home').vegas({
slides: [
{ src: '../files/wallpaper/photo/1/mobile_01.jpg' },
{ src: '../files/wallpaper/photo/2/mobile_02.jpg' },
{ src: '../files/wallpaper/photo/3/mobile_03.jpg' },
{ src: '/files/wallpaper/photo/4/mobile_04.jpg' },
{ src: '../files/wallpaper/photo/5/mobile_05.jpg' },
]
});
});
}
} else {
//  alert('bureau');
$( function() {

$('#home').vegas({
overlay: !0,
transitionDuration: 4e3,
delay: 1e4,
slides:
[{
src: '../files/wallpaper/photo/1/desk_01.jpg',
color: "#DBC9B3",
transition: "fade2",
transitionDuration: 1e4
} , {
src: '../files/wallpaper/photo/2/desk_02.jpg',
color: "#F6B700",
transition: "zoomOut",
transitionDuration: 8e3
} , {
src: '../files/wallpaper/photo/3/desk_03.jpg',
transition: "swirlRight"
},{
src: '../files/wallpaper/photo/4/desk_04.jpg',
animation: "random"
},{
src: '../files/wallpaper/photo/5/desk_05.jpg',
animation: "kenburns",
transition: "swirlLeft2" },
]
});
});
}
<?php  $this->Html->scriptEnd(); ?>


<!-- Pour changer votre mot de passe veuillez renseigner dans le champs ci-dessous votre adresse Email.
Un mail vous sera envoyé avec les informations nécessaires à la création de votre nouveau mot de passe -->
