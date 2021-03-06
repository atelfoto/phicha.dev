<?php
$cakeDescription = __d('cake_dev', 'studio');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $cakeDescription ?> : <?php  echo $this->fetch('title'); ?></title>
	<?php echo $this->Html->meta('icon') ;
	echo $this->Html->meta(array('name' => 'robots', 'content' => 'no index, no follow'));
	echo $this->Html->css(array('admin.min'));
	echo $this->fetch('css');
	?>
	<style>
		th a:hover{
			text-decoration: none;
		}
		th a.desc:after	 {
			content: ' ⇣';
		}
		th a.asc:after	 {
			content: ' ⇡';
		}
	</style>
</head>
<body class="skin-blue fixed">
	<div class="wrapper">
		<!-- nocache -->
		<header class="main-header">
			<?= $this->Html->link($cakeDescription, '/',array('target' => '_blank',"class"=>"logo")); ?><!-- Logo -->
			<nav class="navbar navbar-static-top"><!-- Header Navbar -->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><!-- Sidebar toggle button-->
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu"><!-- Navbar Right Menu -->
					<ul class="nav navbar-nav">
						<li class="dropdown messages-menu"><!-- Messages: style can be found in dropdown.less-->
							<ul class="dropdown-menu"><!-- Menu toggle button -->
								<li class="header">You have 4 messages
								</li>
								<li>
									<ul class="menu"><!-- inner menu: contains the messages -->
										<li><!-- start message -->
											<a href="#">
												<div class="pull-left">
													<!-- User Image -->
													<!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/> -->
												</div>
												<h4>
													Support Team
													<small><i class="fa fa-clock-o"></i> 5 mins</small>
												</h4><!-- Message title and timestamp -->
												<p>Why not buy a new awesome theme?</p><!-- The message -->
											</a>
										</li><!-- end message -->
									</ul><!-- /.menu -->
								</li>
								<li class="footer">
									<a href="#">See All Messages</a>
								</li>
							</ul>
						</li><!-- /.messages-menu -->
						<li class="dropdown notifications-menu"><!-- Notifications Menu -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- Menu toggle button -->
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning">10</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<ul class="menu"><!-- Inner Menu: contains the notifications -->
										<li><!-- start notification -->
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li><!-- end notification -->
									</ul>
								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li>
						<li class="dropdown tasks-menu"><!-- Tasks Menu -->
							<ul class="dropdown-menu">
								<li class="menu"><!-- Task item -->
									<a href="#"><!-- Task title and progress text -->
										<div class="progress xs"><!-- The progress bar -->
										</div>
									</a>
								</li><!-- end task item -->
							</ul>
						</li>
						<li class="dropdown user user-menu"><!-- User Account Menu -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- Menu Toggle Button -->
								<?php if ($this->Session->read('Auth.User.avatar')):?><!-- The user image in the navbar-->
									<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari').'?'.rand(),array('class'=>'user-image','title'=>'avatar',"alt"=>"#")); ?>
								<?php endif ?>
								<span class="hidden-xs"><?php echo $this->Session->read('Auth.User.username'); ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header"><!-- The user image in the menu -->
									<?php if ($this->Session->read('Auth.User.avatar')):?>
										<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari').'?'.rand(),
										array('class'=>'img-circle center-block','title'=>'avatar')); ?>
									<?php endif ?>
									<p>
										<?php echo $this->Session->read('Auth.User.username'); ?>
										<small> <?php echo __('Member since'); ?>&nbsp; <?php echo $this->Session->read('Auth.User.created'); ?></small>
									</p>
								</li>
								<li class="user-footer"><!-- Menu Footer-->
									<div class="pull-left">
										<?= $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'account'),
										array("class"=>"btn btn-default btn-flat")); ?>
									</div>
									<div class="pull-right">
										<?php echo $this->Html->link(__('Logout').'&nbsp;<i class="fa fa-external-link"></i>' ,
										array('controller' => 'users', 'action' => 'logout','admin'=>true),array('escape'=>false,"class"=>"btn btn-default btn-flat")); ?>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar"><!-- sidebar: style can be found in sidebar.less -->
				<div class="user-panel"><!-- Sidebar user panel (optional) -->
					<div class="pull-left image">
						<?php if ($this->Session->read('Auth.User.avatar')):?>
							<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),
							array('class'=>'img-circle center-block','alt'=>'User Image','title'=>'avatar')); ?>
						<?php endif ?>
					</div>
					<div class="pull-left info">
						<p><?php echo $this->Session->read('Auth.User.username'); ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a><!-- Status -->
					</div>
				</div>
				<form action="#" method="get" class="sidebar-form"><!-- search form (Optional) -->
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search..."/>
						<span class="input-group-btn">
							<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form><!-- /.search form -->
				<ul class="sidebar-menu text-capitalize"><!-- Sidebar Menu -->
					<li class="header">HEADER</li>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'dashboard')); ?>">
							<i class="fa fa-dashboard"></i> <span><?php echo __('Dashboard'); ?></span> <i class="fa fa-angle-left pull-right"></i>
						</a>
					</li>
					<li class="treeview <?php if ($this->request->controller =='homes'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-home"></i><span><?= __('Home');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='homes' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("homes manager") , array('controller' => 'homes', 'action' => 'index')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='comments'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-book"></i><span><?= __('visitors book');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='homes' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("comments manager") , array('controller' => 'comments', 'action' => 'index')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='carousels'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-file-image-o"></i><span><?= __('Carousel');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='carousels' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("carousel manager") , array('controller' => 'carousels', 'action' => 'index')); ?>
							</li>
							<li <?php if ($this->request->controller =='carousels' && $this->request->action =='admin_add'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("Add new image"), array('controller' => 'carousels', 'action' => 'add')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='wallpapers'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-file-image-o"></i><span><?= __('wallpaper');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='wallpapers' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("wallpapers manager") , array('controller' => 'wallpapers', 'action' => 'index')); ?>
							</li>
							<li <?php if ($this->request->controller =='wallpapers' && $this->request->action =='admin_add'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("Add new image"), array('controller' => 'wallpapers', 'action' => 'add')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='portfolios'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-file-image-o"></i><span><?= __('portfolio');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='portfolios' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("portfolios manager") , array('controller' => 'portfolios', 'action' => 'index')); ?>
							</li>
							<li <?php if ($this->request->controller =='portfolios' && $this->request->action =='admin_add'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("Add new portfolio"), array('controller' => 'portfolios', 'action' => 'add')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='enews'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-newspaper-o"></i><span><?= __('newsletter');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='enews' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("newsletter manager") , array('controller' => 'enews', 'action' => 'index')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='users'):?>active<?php endif; ?>">
						<a href="#"><i class="fa fa-users"></i><span><?= __('users');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='users' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("users manager") , array('controller' => 'users', 'action' => 'index')); ?>
							</li>
							<li <?php if ($this->request->controller =='users' && $this->request->action =='admin_signup'):?> class="active"<?php  endif; ?>>
								<?= $this->Html->link(__("add new user"), array('controller' => 'users', 'action' => 'signup')); ?>
							</li>
						</ul>
					</li>
					<li class="treeview <?php if ($this->request->controller =='pages'):?>active<?php endif; ?>">
						<a href="#"><i class="fa  fa-gear "></i><span><?= __('maintenance');?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li <?php if ($this->request->controller =='pages' && $this->request->action =='admin_clearcache'):?> class="active"<?php  endif; ?>>
								<?php echo $this->Html->link(__(" Clear Cache"),array('action'=>'clearcache','controller'=>'pages')); ?>
							</li>
						</ul>
					</li>
				</ul><!-- /.sidebar-menu -->
			</section><!-- /.sidebar -->
		</aside>
		<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
			<section class="content-header"><!-- Content Header (Page header) -->
				<p class="breadcrumb">
					<?php echo $this->Html->getCrumbs(' / ',array('text' => "<i class='fa fa-dashboard'></i>&nbsp;". __('home'),
					'url' => array('controller' => 'dashboard', 'action' => 'index',"admin"=>true),'escape' => false)); ?>
				</p>
			</section>
			<section class="content"><!-- Main content -->
				<!-- nocache -->
				<?= $this->Session->flash(); ?>
				<?= $this->Session->flash('Auth'); ?>
				<!-- /nocache -->
				<?php  echo $this->fetch('content'); ?>
			</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> <?php echo $cakeVersion; ?>
			</div>
			<strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a>.</strong> All rights reserved.
		</footer>
		<?php // echo $this->element('top'); ?>
	</div><!-- ./wrapper -->
	<?php echo  $this->Html->script(array("admin.min.js","admin/jquery.slimscroll.js")); ?>
	<script>
		$(document).ready(function(){
			$('#topbar').hide();
			$(function(){
				$(window).scroll(function(){
					if ($(this).scrollTop() > 100){
						$('#topbar').fadeIn();
					}else{
						$('#topbar').fadeOut();
					}
				});
			});
			$('#topbar a').click(function(){
				$('body,html').animate({
					scrollTop: 0
				}, 1500,'easeInOutExpo');
				return false;
			});
		});
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});
		// jQuery for page scrolling feature - requires jQuery Easing plugin
		$(function() {
			$('a.page-scroll').bind('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});
		});
			// jQuery to collapse the navbar on scroll
		$(window).scroll(function() {
			if ($(".navbar").offset().top > 50) {
				$(".navbar-fixed-top").addClass("top-nav-collapse");
			} else {
				$(".navbar-fixed-top").removeClass("top-nav-collapse");
			}
		});
	</script>
	<?php  echo $this->fetch('script'); ?>
</body>
</html>
