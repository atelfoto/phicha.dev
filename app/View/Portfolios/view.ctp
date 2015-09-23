<?php // echo $this->fetch('title')?> <?= $this->assign('title',"Portfolio " .$portfolio['Portfolio']['name']); ?>
<?php  echo $this->Html->css(array('portfolio'),array('inline'=>false)); ?>
<?php  $this->Html->meta('description', $this->Text->truncate(strip_tags($portfolio['Portfolio']['content'], 200)), array(
'exact' => false,'inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "website" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $portfolio['Portfolio']['name']),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => "http://www.chateau-chazeron.com/portfolio/".$portfolio['Portfolio']['slug'] ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:image', 'type' => 'meta',
'content' => "http://www.chateau-chazeron.com/files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'port_'.$portfolio['Portfolio']['photo'] ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta',
 'content' => $this->Text->truncate(strip_tags($portfolio['Portfolio']['content']), 200)),NULL,array("inline"=>false)); ?>
<?php    $this->Html->script("../files/portfolio/".$portfolio['Portfolio']['slug']."/jbcore/juicebox", array("inline"=>false)); ?>
<?php  $this->Html->scriptStart(array("inline"=>false)); ?>
			new juicebox({
				baseUrl : '../files/portfolio/<?php echo $portfolio['Portfolio']['slug']; ?>/',
				useFullscreenExpand: true,
				//showOpenButton: false,
				debugMode: true,
				galleryTitle: '<?php echo $portfolio['Portfolio']['name']; ?>',
				languagelist:"Montrez les vignettes|Cachez les Vignettes|Plein Ecran|reduire plein Ecran|Ouvrez cette image une nouvelle fenêtre|Images",
				backgroundColor: "rgba(34,34,34,1)",
				containerId: "juicebox-container",
				galleryHeight: "100%",
				galleryWidth: "100%",
				top:"150px"
			});
<?php  $this->Html->scriptEnd(); ?>

<div id="juicebox-container" ></div>
</div>
