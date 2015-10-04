<div id="myCarousel" class="carousel slide"  data-ride="carousel">
	<figure class="logo"> <?php  echo  $this->Html->image("logo.png",array("class"=>"img-responsive","alt"=>"blason château de chazeron")); ?></figure>
	<h1 class="home hidden-xs"> <span><?= __('studio'); ?></span><br>Chardon</h1>
<!-- <a href="#page-header" class=" btn btn-circle page-scroll">
<i class="fa fa-angle-double-down animated"></i>
</a> -->
<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
	<li data-target="#myCarousel" data-slide-to="4"></li>
	<li data-target="#myCarousel" data-slide-to="5"></li>
	<li data-target="#myCarousel" data-slide-to="6"></li>
</ol>
<div class="carousel-inner" role="listbox">
<div class="item active"> <!-- image 1 -->
		<?=  $this->Html->image('../files/carousel/photo/1/xvga_01.jpg', array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /image1 -->
	<div class="item "> <!-- img2 -->
		<?=  $this->Html->image('../files/carousel/photo/2/xvga_02.jpg', array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /img2 -->
	<div class="item "> <!-- img3 -->
		<?=  $this->Html->image('../files/carousel/photo/3/xvga_03.jpg', array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /img3 -->
	<div class="item "> <!-- img4 -->
		<?=  $this->Html->image('../files/carousel/photo/4/xvga_04.jpg', array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /img4 -->
	<div class="item "> <!-- img5 -->
		<?=  $this->Html->image('../files/carousel/photo/5/xvga_05.jpg', array('alt'=>__('Studio chardon'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /img6 -->
	<div class="item "> <!-- img6 -->
		<?=  $this->Html->image('../files/carousel/photo/6/xvga_06.jpg', array('alt'=>__('studio'))); ?>
		<div class="">
			<div class="carousel-caption">
				<p><?= __(''); ?></p>
			</div>
		</div>
	</div> <!-- /img6 -->
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
