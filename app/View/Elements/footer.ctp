<footer class="footer text-center">
	<nav class='text-center text-capitalize'>
		<ul class='list-inline'>
			<li><?php echo $this->Html->link(__('Legal Information'), array(
				'controller' => 'pages', 'action' => 'legalinformations',"admin"=>false,"member"=>false)); ?> |
			</li>
			<li><?php echo $this->Html->link( __('Contact Us'), array(
				'controller' => 'contacts', 'action' => 'index')); ?> |
			</li>
			<li><?php echo $this->Html->link("flux rss", array('controller' => 'posts', 'action' => 'feed',"ext"=>"rss")); ?> |
			</li>
			<li><?php echo $this->Html->link(__("sitemap"), array('controller' => 'pages', 'action' => 'sitemap')); ?>
			</li>
		</ul>
	</nav>
	<address id="hcard-studio" itemscope itemtype="http://shema.org/Person" class="vcard text-center">
		<small class="fn n text-center">
			<span itemprop="name" >Studio chardon</span>
			<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="text-center">
				<span itemprop="streetAddress" class="given-name street-address">1 rue Franche</span>
				<span class="postal-code" itemprop="postalCode">52200</span>
				<span itemprop="addressLocality" class="locality country-name">LANGRES</span>
			</span>
		</small> <br>
		<ul class="list-inline">
			<li>
				<i class='glyphicon  glyphicon-earphone'>&nbsp;</i>
				<abbr title="Phone">Tel : <a href="tel:0033607221786" class="tel" itemprop="telephone">06 07 22 17 86</a>
				</abbr>
			</li>
		</ul>
		<i class="copyright">&nbsp;Copyright &copy;&nbsp;<?php echo date('Y'); ?> by
			<span class="" itemprop="url"><?php echo env('HTTP_HOST'); ?></span> &nbsp; all rights reserved.
		</i>
	</address>
</footer>
