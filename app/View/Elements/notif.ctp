<div style="max-height:60px;" class="alert alert-<?php echo isset($class) ? $class: 'success'; ?> flash-msg" role="alert" aria-hidden="true">
	<span class="glyphicon glyphicon-<?php echo isset($type) ? $type: 'ok'; ?>-sign " role="alert" aria-hidden="true" ></span>
		<!-- <span class="sr-only"><?php echo __('Error:'); ?>x</span> -->
	<a href="#" class="close text-right"  ></a>
	<span class="message" ><?= $message; ?></span>
</div>

<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
jQuery(function(){
$('.close').click(function(){
var e = $(this);
$.get(e.attr('href'));
e.parent().slideUp('slow');
return false;
});
$(document).ready(function(){
$('.flash-msg').delay(10000).fadeOut('slow');
});
	});
<?php echo  $this->Html->scriptEnd(); ?>
