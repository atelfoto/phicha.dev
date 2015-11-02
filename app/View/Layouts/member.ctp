<?php
$cakeDescription = __d('cake_dev', 'Mon site');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $cakeDescription ?> : <?php  echo $this->fetch('title'); ?></title>
	<?php echo $this->Html->meta('icon') ;
		  echo $this->Html->meta(array('name' => 'robots', 'content' => 'none'));
		  echo $this->Html->css(
		  array('styles.min',
		//"admin/AdminLTE.css"
			));
		  echo $this->fetch('css');
		//  echo $this->Html->script(array('jquery-1.11.0.min','bootstrap.min','admin','scroll'));
		  echo  $this->Html->script(array("jquery.min","bootstrap.min"));
	?>
<style>
	th a:hover{
		text-decoration: none;
	}
/*	th a.asc:after {
 		content: ' ▲';
 		display: inline;
 	}
	th a.desc:after {
		content: ' ▼';
	}*/

	th a.asc:after {
		content: ' ⇣';
	}
	th a.desc:after {
		content: ' ⇡';
	}
</style>
</head>
<body class="">  <!-- en attende class=fixed -->
	<!-- nocache -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?= __('Administrator') ?></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><?= $this->Html->link(__("See the site"), '/',array('target' => '_blank')); ?></li>
					<li><?php echo $this->Html->link(__('help').'&nbsp;<i class="glyphicon glyphicon-question-sign"></i>' ,
					 array('controller' => 'pages', 'action' => 'help'),array('escape'=>false)); ?></li>
					<li><?php echo $this->Html->link(__('Logout').'&nbsp;<i class="glyphicon glyphicon-new-window"></i>' ,
					 array('controller' => 'users', 'action' => 'logout','admin'=>false),array('escape'=>false)); ?></li>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user">&nbsp;</i>
							<span>
						        <?php echo $this->Session->read('Auth.User.username'); ?>
							<i class="caret"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'account')); ?></li>
						</ul>
					</li>
				</ul>
				<!-- /nocache -->
			</div> <!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container" class="hidden-print" >
		<div class="row">
		<!-- nocache -->
			<?= $this->Session->flash(); ?>
			<?= $this->Session->flash('Auth'); ?>
			<!-- /nocache -->
			<?php  echo $this->fetch('content'); ?>
		</div>
	</div>
		<?php  // echo $this->element('top'); ?>
		<?php  echo $this->element('footer'); ?>
		<?php  echo $this->fetch('script'); ?>
</body>
</html>
