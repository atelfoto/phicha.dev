<li <?php if ($this->request->controller =='homes' && $this->request->action =='index' ):?> class="active"<?php endif; ?> >
	<?= $this->Html->link(__('<span class="visible-xs-inline-block glyphicon glyphicon-home ">&nbsp;</span>Accueil',true),array('controller'=>'homes','action'=>'index'),array('escape'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='portfolios' && $this->request->action=='index'):?> class="active"<?php endif; ?>>
	<?= $this->Html->link(__("<span class='visible-xs-inline-block glyphicon glyphicon-picture'>&nbsp;</span>portfolio") ,array('controller'=>'portfolios','action'=>'index','admin'=>false),array('escape'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='pages' && $this->request->action == "customers"):?> class="active"<?php endif; ?>>
	<?= $this->Html->link(__("<span class='visible-xs-inline-block glyphicon glyphicon-shopping-cart'>&nbsp;</span>Acces clients") ,array('controller'=>'pages','action'=>'customers','admin'=>false),array('escape'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='contacts'):?> class="active"<?php endif; ?>>
	<?= $this->Html->link(__("<span class='visible-xs-inline-block glyphicon glyphicon-envelope'>&nbsp;</span>contact") ,array('controller'=>'contacts','action'=>'index','admin'=>false),array('escape'=>false)); ?>
</li>
<li <?php if ($this->request->controller =='comments'):?> class="active"<?php endif; ?>>
	<?= $this->Html->link(__("<span class='visible-xs-inline-block glyphicon glyphicon-book'>&nbsp;</span>Livre d'or") ,array('controller'=>'comments','action'=>'index','admin'=>false),array('escape'=>false)); ?>
</li>
