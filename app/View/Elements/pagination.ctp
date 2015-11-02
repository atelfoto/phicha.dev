<?php
$params = $this->Paginator->params();
if ($params['pageCount'] > 1) {
?>
<ul class="pagination pagination-sm">
	<?php echo $this->Paginator->prev('&larr;'.__(' Previous') , array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr;'.__(" Previous").'</a>',
		  array('class' => 'prev disabled','tag' => 'li','escape' => false));
		  echo $this->Paginator->numbers(array('modulus'=>'2','separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
		  echo $this->Paginator->next(__('Next').(' &nbsp;&rarr;&nbsp;'),
		  	array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">'.__("Next").' &rarr;</a>',
		  array('class' => 'next disabled','tag' => 'li','escape' => false));
	?>
</ul>
<?php } ?>
