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
<div class="item active">
<?=  $this->Html->image('/img/slides/slider-1.jpg', array('alt'=>__('Castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
<div class="item ">
<?=  $this->Html->image('/img/slides/slider-2.jpg', array('alt'=>__('castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
<div class="item ">
<?=  $this->Html->image('/img/slides/slider-3.jpg', array('alt'=>__('castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
<div class="item ">
<?=  $this->Html->image('/img/slides/slider-4.jpg', array('alt'=>__('castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
<div class="item ">
<?=  $this->Html->image('/img/slides/slider-5.jpg', array('alt'=>__('castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
<div class="item ">
<?=  $this->Html->image('/img/slides/slider-6.jpg', array('alt'=>__('castle of Chazeron'))); ?>
<div class="">
<div class="carousel-caption">
<p><?= __(''); ?></p>
</div>
</div>
</div>
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
