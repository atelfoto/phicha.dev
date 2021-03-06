<?php App::uses('CakeTime', 'Utility'); ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo $this->Html->url('/',true); ?></loc>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>
	<?php foreach ($listPortfolios as $list): ?>
	<url>
		<loc><?php echo $this->Html->url(array('controller' => 'portfolios', 'action' => $list['Portfolio']['slug']),true); ?></loc>
		<lastmod><?php echo $this->Time->toAtom($list['Portfolio']['modified']); ?></lastmod>
		<changefreq>weekly</changefreq>
	</url>
	<?php endforeach; ?>
	<url>
		<loc><?php echo $this->Html->url(array("controller"=>'pages',"action"=>'customers'),true); ?></loc>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo $this->Html->url(array("controller"=>'contacts',"action"=>'index'),true); ?></loc>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo $this->Html->url(array("controller"=>'comments',"action"=>'index'),true); ?></loc>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo $this->Html->url(array("controller"=>'pages',"action"=>'legalinformations'),true); ?></loc>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo $this->Html->url(array("controller"=>'pages',"action"=>'sitemap'),true); ?></loc>
		<changefreq>weekly</changefreq>
	</url>

</urlset>
