<?php  $pages=$this->requestAction(array('controller'=>'homes','action'=>'index','admin'=>false)); ?>
<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {
	    $('#home').vegas({
        	slides: [
        	<?php foreach ($pages as$kvv=>$vv):$vv=current($vv); ?>
				{ src: 'files/home/photo/<?=$vv["phot_dir"];?>/xvga_<?=$vv["photo"];?>' },
				<?php endforeach ?>

        	]
    });
     });
<?php  $this->Html->scriptEnd(); ?>
