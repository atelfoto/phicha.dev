<div class="page-header">
<h1><?php echo $wallpaper['Wallpaper']['name'] ?></h1>
</div>
<?php echo  $this->Html->image("/files/wallpaper/photo/".$wallpaper['Wallpaper']['photo_dir'].'/'.'xvga_'.$wallpaper['Wallpaper']['photo'],
	array("class"=>"")); ?>



