<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header ">
<button type="button" class="navbar-toggle collapsed menu-icon menu-icon-svg" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span></span>
<svg x="0" y="0" width="40px" height="40px" viewBox="0 0 40 40">
<path d="M16.500,27.000 C16.500,27.000 24.939,27.000 38.500,27.000 C52.061,27.000 49.945,15.648 46.510,11.367 C41.928,5.656 34.891,2.000 27.000,2.000 C13.193,2.000 2.000,13.193 2.000,27.000 C2.000,40.807 13.193,52.000 27.000,52.000 C40.807,52.000 52.000,40.807 52.000,27.000 C52.000,13.000 40.837,2.000 27.000,2.000 ">
</path>
</svg>
</button>
<a class="navbar-brand visible-xs" href="#"><?= __('phicha') ?></a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li <?php if ($this->request->controller =='pages' && $this->request->action =='home' ):?> class="active"<?php endif; ?> >
	<?= $this->Html->link(__("Accueil",true),array('controller'=>'pages','action'=>'home')); ?>
</li>
<li <?php if ($this->request->controller =='portfolios'):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("portfolios") ,array('controller'=>'portfolios','action'=>'index','admin'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='pages' && $this->request->action == "customers"):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("Acces clients") ,array('controller'=>'pages','action'=>'customers','admin'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='maps'):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("map") ,array('controller'=>'maps','action'=>'index','admin'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='contacts'):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("contact") ,array('controller'=>'contacts','action'=>'index','admin'=>false)); ?>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php if ($this->Session->read('Auth.User.id')): ?>
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="glyphicon glyphicon-user">&nbsp;</i>
<span><?php echo $this->Session->read('Auth.User.username'); ?>
<i class="caret"></i>
</span>
</a>
<ul class="dropdown-menu">
<li><?= $this->Html->link(__('index'), array('controller' => 'users', 'action' => 'index',"admin"=>true)); ?></li>
<li><?= $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'account',"admin"=>true)); ?></li>
<li><?= $this->Html->link("<i class='glyphicon glyphicon-share'></i> Se déconnecter",
array('controller'=>'users', 'action'=>'logout'),array('escape' =>false)); ?>
</li>
</ul>
</li>
<?php else: ?>
<?php endif ?>
</ul>
</div>
</div>
</nav>
