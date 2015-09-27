<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Phicha');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo $cakeDescription ?>&nbsp;:&nbsp;<?php echo $this->fetch('title'); ?></title>
<link rel="apple-touch-icon" href=""/>
<link rel="apple-touch-startup-image" href=""/>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('styles.min');
		echo $this->fetch('css');
		echo  $this->Html->script(array("jquery-1.11.3.min","bootstrap.min"));
	?>
<script>

//tooltype de bootstrap
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
	$('a.page-scroll').bind('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
});
// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
	if ($(".navbar").offset().top > 50) {
		$(".navbar-fixed-top").addClass("top-nav-collapse");
	} else {
		$(".navbar-fixed-top").removeClass("top-nav-collapse");
	}
});
// script hamburger
$(document).ready(function(){
	$('.menu-icon').click(function(e){
		e.preventDefault();
		$this = $(this);
		if($this.hasClass('is-opened')){
			$this.addClass('is-closed').removeClass('is-opened');
		}else{
			$this.removeClass('is-closed').addClass('is-opened');
		}
	})
});
$(document).ready(function(){
    $(window).resize(function() {

        ellipses1 = $("#bc1 :nth-child(2)")
        if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}

        ellipses2 = $("#bc2 :nth-child(2)")
        if ($("#bc2 a:hidden").length >0) {ellipses2.show()} else {ellipses2.hide()}

    })

});
</script>
<?php echo $this->fetch('script');	?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<meta property="og:locale" content="fr_FR" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="studio">
<meta name="twitter:creator" content="studio">
<meta name="twitter:domain" content="studio.com">
<meta name="twitter:title" content="studio" />
<meta name="twitter:description" content="studio " />
<meta name="twitter:image" content="http://www.studio/img/sceenshot.jpg" />
<meta name="twitter:url" content="http://www.studio.com" />
<meta name="application-name" content="studio"/>
<meta name="msapplication-TileColor" content="#EBEAE6"/>
<meta name="msapplication-square70x70logo" content="http://www.studio/img/tiny.png"/>
<meta name="msapplication-square150x150logo" content="http://www.studio/img/square.png"/>
<meta name="msapplication-wide310x150logo" content="http://www.studio/img/wide.jpg"/>
<meta name="msapplication-square310x310logo" content="http://www.studio/img/large.jpg"/>
</head>
<body id="home" data-target=".navbar-fixed-top">
<?php   echo $this->Element('navigation'); ?>
<!--/nocache-->
<?php  echo $this->element('carrousel'); ?>

			<?php // echo $this->Flash->render(); ?>
			<div class="container breadcrumb">
				<?php echo $this->Session->flash(); ?>
				<div id="bc1" class="btn-group btn-breadcrumb">
					<?php   echo $this->Html->getCrumbs('', array(
						'text' => __('<i class="glyphicon glyphicon-home"></i>'),
						"class"=>"btn btn-default",
						'url' => array('controller' => 'pages', 'action' => 'home'),
						'escape' => false
					)); ?>
				</div>
			</div>
			<?php echo $this->fetch('content'); ?>
	<?php  echo $this->element('footer'); ?>
</body>
</html>
