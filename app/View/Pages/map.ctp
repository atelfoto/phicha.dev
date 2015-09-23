<?= $this->assign('title', __('plan')); ?>
<?php  $this->Html->meta('description', "plan" , array('inline'=> false)); ?>
<?php   echo $this->Element('navigation'); ?>
 <?php
	  $map_options = array(
		"id"           => "map_canvas",
		"width"        => "800px",
		"height"       => "500px",
		"zoom"         => 15,
		"type"         => "ROADMAP",
		"localize"     => false,
		"latitude"     => 47.863527,
		"longitude"    => 5.336689,
		"marker"       => true,
		"markerIcon"   => "http://google-maps-icons.googlecode.com/files/home.png",
		"markerShadow" => "http://google-maps-icons.googlecode.com/files/shadow.png",
		"infoWindow"   => true,
		"windowText"   => "My Position custom text"
	  );
	?>
	<div style="float:left;">
		<?= $this->GoogleMap->map($map_options); ?>
	</div>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
