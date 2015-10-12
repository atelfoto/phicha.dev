<?php  $pages=$this->requestAction(array('controller'=>'carousels','action'=>'index','admin'=>false)); ?>
<div id="myCarousel" class="carousel slide"  data-ride="carousel">
	<figure class="logo"> <?php  echo  $this->Html->image("logo.png",array("class"=>"img-responsive","alt"=>"blason château de chazeron")); ?></figure>
	<h1 class="home hidden-xs"> <span><?= __('studio'); ?></span><br>Chardon</h1>
<!-- <a href="#page-header" class=" btn btn-circle page-scroll">
<i class="fa fa-angle-double-down animated"></i>
</a> -->
<ol class="carousel-indicators">
	<?php foreach ($pages as $kvv => $vv): $vv = current($vv); ?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $vv['photo_dir'] ?>" class="<?php echo $vv['class'] ?>"></li>
	<?php endforeach ?>
</ol>
<div class="carousel-inner" role="listbox">
<?php foreach ($pages as $k => $v): $v = current($v); ?>
  	<div class="item <?php echo $v['class']; ?>">
		<?=  $this->Html->image('/files/carousel/photo/'.$v["photo_dir"].'/xvga_'.$v["photo"], array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<h2><?php echo $v['name']; ?></h2>
				<p><?php echo $v['content']; ?></p>
			</div>
		</div>
	</div>
<?php endforeach ?>
</div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only" ><?= __('Previous'); ?></span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only" ><?= __('Next'); ?></span>
</a>
</div>


