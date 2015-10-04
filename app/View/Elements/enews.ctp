<?php
echo $this->Form->create("Enews", array(
	'action'=> 'add',
	//'type' => 'post',
	"wrapInput"=>false,
	'inputDefaults' => array(
		'label' => false,
		'div' => array(
			"class"=>"col-md-6 col-md-offset-2 form-group"
			) ,
		)
	));
echo $this->Form->input('mail', array("placeholder"=>"Entrez votre Email","class"=>"form-control"));
echo $this->Form->button("Envoyer", array('type'=>"submit","class"=>"btn btn-primary col-md-2"));
echo $this->Form->end();
echo $this->element('vegas');
?>
