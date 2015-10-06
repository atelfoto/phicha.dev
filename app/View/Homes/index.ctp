<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php foreach ($homes as $home): ?>
<?php  echo $this->Html->meta(array('name' => 'keywords','type' => 'meta',  'content' => $home["Home"]['keywords']),NULL,array("inline"=>false));?>
<?php echo $this->Html->meta("description", $home["Home"]['description'], array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => $home["Home"]['description']),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'robots', 'content' => $home["Home"]['robots']),NULL,array("inline"=>false));
?>
<?php endforeach; ?>
<?= $this->Html->css(array('home.min'),array('inline'=>false)); ?>
<div id="Header">
	<div class="col-sm-5 col-md-offset-1 col-xs-12 ">
	<?php foreach ($homes as $home): ?>
	<h1><?php echo h($home['Home']['name']); ?></h1>
	<?php endforeach; ?>
</div>
	<div class="col-sm-4 col-xs-12">
		<ul>
			<li><a href="#" title="Twitter" class="twitterIcon"></a></li>
			<li><a href="#" title="facebook" class="facebookIcon"></a></li>
			<li><a href="#" title="linkedIn" class="linkedInIcon"></a></li>
			<li><a href="#" title="Pintrest" class="pintrestIcon"></a></li>
		</ul>
	</div>
</div>
<div class="col-lg-5 col-lg-offset-2 col-md-offset-1 col-md-7 col-sm-7"  >
	<div id="Content" class="wrapper">
	<?php foreach ($homes as $home): ?>
	<?= $home["Home"]['content']; ?>
	<?php endforeach; ?>
		<!-- <h2>Site en construction</h2>
		<h3>Restez en contact</h3> -->
<!-- 		<p class="first">Passionné par la photographie dès l’age de 15 ans, Je me suis installé à Paris comme photographe indépendant en 1987, J’ai acquis mon savoir faire dans les grands studios de portraits et de nature-morte par un sens de la lumière et du détail.</p>
		<p>Passionné par la composition et la mise en scène, je crée en 1996 le Studio Chardon sur la  place Diderot de Langres pour un contact facilité avec le public et un laboratoire argentique performant.</p>
		<p>En l’an 2000 la &ldquo; Teinturerie Albert ” est rénové pour devenir le studio photographique actuel</p>
		<p>Il dispose de 2 plateaux, l’un de 100 m2 avec cyclo et lumière naturel, l’autre de 70 m2 avec cuisine et cabine de maquillage. Je travaille la lumière du jour combiné au flash Broncolor ou tungstène.</p>
		<p>Aujourd’hui un labo numérique high-tech sert à la post-production des images et permet de contrôler la qualité à toutes les étapes de fabrication .</p>
		<p>Le 6 Fevrier 2011 le titre de &ldquo; Portraitiste de France ” lui est remis au congrès de Lyon pour l’ excellente qualité de son travail en portraits et mariages
		</p> -->
	<!-- 	<h3>Nos références :</h3>
		<ul>
			<li><strong>Arts picturaux :</strong>  reproduction d’œuvres d’art : César, Villeglé, Arthur, centres d’art  et catalogues de collections.</li>
			<li><strong>Arts de la table et gastronomie :</strong>   Chateau de Challange, Caveau des Arches,Le Cheval Blanc,  Jum’hotel , A-F Gros</li>
			<li><strong>Architecture :</strong> cabinets d’architectes, Bouygues, Kauffmann &amp; Broad,</li>
			<li><strong>Industrie :</strong>Bouygues, CDE, Carrefour, Café Caron, Dunhill, Dedôme side-car, Eiffage, Freudenberg, Gascard-Martin-Prost, Plastic Omnium, Vingeanne Transports,Siplast, 3P</li>
			<li><strong>Institutionnel :</strong> conseils généraux.Musée de Langres, ELeclerc …</li>
		</ul> -->
	</div>
</div>
	<?php  echo $this->element('sidebar'); ?>
<?php echo $this->Html->script(array("vegas.min"),array('inline'=>false)); ?>
<?php  echo $this->element('vegas'); ?>

