<?php
	echo $this->Form->create("news", array(
		'action'=> 'send',
		'type' => 'post',
		"class"=>"form-inline ",
		'inputDefaults' => array(
			'class'=>"form-control",
			'label' => false,
			'div' => array(
				"class"=>"form-group")
			)
		));
	echo $this->Form->input('mail', array("placeholder"=>"cd3"));
	echo $this->Form->button("Envoyer", array("class"=>"btn btn-primary",'type'=>"submit"));
	echo  $this->Form->end();
?>

<!-- <form action="/news/send" class="form-inline " id="newsSendForm" method="post" accept-charset="utf-8">
	<div style="display:none;">
		<input type="hidden" name="_method" value="POST"/>
	</div>
	<div class="form-group">
		<input name="data[news][mail]" class="form-control" placeholder="Entrez votre Email" type="text" id="newsMail"/>
	</div>
	<button class="btn btn-primary" type="submit">Envoyer</button>
</form> -->

<!--
<form action="/enews/add" id="EnewsAddForm" method="post" accept-charset="utf-8">
	<div style="display:none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<p>
		<input name="data[Enews][mail]" placeholder="Entrez votre Email" maxlength="255" type="text" id="EnewsMail" required="required">
		<button type="submit">Envoyer</button>
	</p>
</form>

<form action="/enews/add" id="EnewsAddForm" method="post" accept-charset="utf-8">
	<div style="display:none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<p>
		</p>
		<div class="input text required">
			<input name="data[Enews][mail]" placeholder="Entrez votre Email" maxlength="255" type="text" id="EnewsMail" required="required">
		</div>
		<button type="submit">Envoyer</button>
<p></p>
</form> -->
<!-- <form action="/enews/add" id="EnewsAddForm" method="post" accept-charset="utf-8">
	<div style="display:none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<div class="input text required">
		<input name="data[Enews][mail]" placeholder="Entrez votre Email" maxlength="255" type="text" id="EnewsMail" required="required">
	</div>
	<button type="submit">Envoyer</button>

</form>
 -->
