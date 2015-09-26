<?php
echo $this->Form->create("Enews", array(
	'action'=> 'add',
	'type' => 'post',
	"wrapInput"=>false,
	'inputDefaults' => array(
		'label' => false,
		'div' => array(
			"class"=>"col-md-6 col-md-offset-2 form-group"
			) ,
		)
	));
	?>
<?php
echo $this->Form->input('mail', array("placeholder"=>"Entrez votre Email","class"=>"form-control"));
echo $this->Form->button("Envoyer", array('type'=>"submit"
	,"class"=>"btn btn-primary col-md-2"
	));
	?>
<?php
echo  $this->Form->end();
?>
<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {
	    $('#home').vegas({
        	slides: [
				{ src: 'img/images/background1.jpg' },
				{ src: 'img/images/background3.jpg' },
				{ src: 'img/images/background2.jpg' },
				{ src: 'img/images/background1.jpg' },
				{ src: 'img/images/background4.jpg' },
				{ src: 'files/home/photo/2/xvga_20150706_194107.jpg' },
				{ src: 'files/home/photo/3/xvga_20150712_095114.jpg' }
        	]
    });
     });

<?php  $this->Html->scriptEnd(); ?>
