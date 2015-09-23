<!--nocache-->
<div class="col-md-3 side-bar pull-right">
	<ul class='sidebar-menu'>
		<li <?php if ($this->request->controller == 'pages' && $this->request->action=='display'): ?> class="active" <?php endif; ?>>
			<?php echo $this->Html->link("accueil", array('controller' => 'pages', 'action' => 'home')); ?>
		</li>
		<li>
			<?php echo $this->Html->link("portfolio", array('controller' => 'portfolios', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link("espace client", array('controller' => 'pages', 'action' => 'customers')); ?>
		</li>
		<li><a href="">liens</a></li>
		<li><?php echo $this->Html->link("contact", array('controller' => 'contacts', 'action' => 'index')); ?></li>
		<li><a href="">livre d'or</a></li>
	</ul>
</div>
<!--nocache-->

