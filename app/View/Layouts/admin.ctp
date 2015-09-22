<?php
$cakeDescription = __d('cake_dev', 'Administration');
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
<?php echo  $this->Html->script(array("jquery-1.11.3.min","bootstrap.min","admin/app.min","jquery.easing.min")); ?>
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
</head>
<body class="skin-blue">
<div class="wrapper">
<!-- nocache -->
<header class="main-header">
<!-- Logo -->
<!-- <a href="index2.html" class="logo"><b><?php echo __(""); ?></b></a> -->
<?= $this->Html->link($cakeDescription, '/',array('target' => '_blank',"class"=>"logo")); ?>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
</a>
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
<!-- Menu toggle button -->
<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope-o"></i>
<span class="label label-success">4</span>
</a> -->
<ul class="dropdown-menu">
<li class="header">You have 4 messages</li>
<li>
<!-- inner menu: contains the messages -->
<ul class="menu">
<li><!-- start message -->
<a href="#">
<div class="pull-left">
<!-- User Image -->
<!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/> -->
</div>
<!-- Message title and timestamp -->
<h4>
Support Team
<small><i class="fa fa-clock-o"></i> 5 mins</small>
</h4>
<!-- The message -->
<p>Why not buy a new awesome theme?</p>
</a>
</li><!-- end message -->
</ul><!-- /.menu -->
</li>
<li class="footer"><a href="#">See All Messages</a></li>
</ul>
</li><!-- /.messages-menu -->

<!-- Notifications Menu -->
<li class="dropdown notifications-menu">
<!-- Menu toggle button -->
<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell-o"></i>
<span class="label label-warning">10</span>
</a> -->
<ul class="dropdown-menu">
<li class="header">You have 10 notifications</li>
<li>
<!-- Inner Menu: contains the notifications -->
<ul class="menu">
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
<!-- Tasks Menu -->
<li class="dropdown tasks-menu">
<!-- Menu Toggle Button -->
<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-flag-o"></i>
<span class="label label-danger">9</span>
</a> -->
<ul class="dropdown-menu">
<!-- <li class="header">You have 9 tasks</li>
<li> -->
<!-- Inner menu: contains the tasks -->
<ul class="menu">
<li><!-- Task item -->
<a href="#">
<!-- Task title and progress text -->
<!-- <h3>
Design some buttons
<small class="pull-right">20%</small>
</h3> -->
<!-- The progress bar -->
<div class="progress xs">
<!-- Change the css width attribute to simulate progress -->
<!-- <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
<span class="sr-only">20% Complete</span>
</div> -->
</div>
</a>
</li><!-- end task item -->
</ul>
</li>
<!-- <li class="footer">
<a href="#">View all tasks</a>
</li> -->
</ul>
</li>
<!-- User Account Menu -->
<li class="dropdown user user-menu">
<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!-- The user image in the navbar-->
<?php if ($this->Session->read('Auth.User.avatar')):?>
<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),
array('class'=>'user-image','title'=>'avatar')); ?>
<?php endif ?>
<!-- hidden-xs hides the username on small devices so only the image appears. -->
<span class="hidden-xs"><?php echo $this->Session->read('Auth.User.username'); ?></span>
</a>
<ul class="dropdown-menu">
<!-- The user image in the menu -->
<li class="user-header">
<?php if ($this->Session->read('Auth.User.avatar')):?>
<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),
array('class'=>'img-circle center-block','title'=>'avatar')); ?>
<?php endif ?>
<p>
<?php echo $this->Session->read('Auth.User.username'); ?>
<small> <?php echo __('Member since'); ?>&nbsp; <?php echo $this->Session->read('Auth.User.created'); ?></small>
</p>
</li>
<!-- Menu Body -->
<!-- <li class="user-body">
<div class="col-xs-4 text-center">
<a href="#">Followers</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Sales</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Friends</a>
</div>
</li> -->
<!-- Menu Footer-->
<li class="user-footer">
<div class="pull-left">
<?= $this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'account'),array("class"=>"btn btn-default btn-flat")); ?>
</div>
<div class="pull-right">
<?php echo $this->Html->link(__('Logout&nbsp;<i class="glyphicon glyphicon-new-window"></i>') ,
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
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel (optional) -->
<div class="user-panel">
<div class="pull-left image">
<?php if ($this->Session->read('Auth.User.avatar')):?>
<?php echo  $this->Html->image($this->Session->read('Auth.User.avatari') . '?' . rand(),
array('class'=>'img-circle center-block','alt'=>'User Image','title'=>'avatar')); ?>
<?php endif ?>
</div>
<div class="pull-left info">
<p><?php echo $this->Session->read('Auth.User.username'); ?></p>
<!-- Status -->
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<!-- search form (Optional) -->
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
</div>
</form>
<!-- /.search form -->
<!-- Sidebar Menu -->
<ul class="sidebar-menu text-capitalize">
<li class="header">HEADER</li>
<!-- Optionally, you can add icons to the links -->
<!-- <li class=""><a href="#"><span>Link</span></a></li> -->
<li>
<a href="<?php echo $this->Html->url(array('controller' => 'dashboards', 'action' => 'index')); ?>">
<i class="fa fa-dashboard"></i> <span><?php echo __('Dashboard'); ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview <?php if ($this->request->controller =='activities'):?>active<?php endif; ?>">
<a href="#"><i class="fa fa-puzzle-piece"></i><span><?= __('activities');?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li <?php if ($this->request->controller =='activities' && $this->request->action =='admin_index'):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("activities manager"), array('controller' => 'activities', 'action' => 'index')); ?>
</li>
<li <?php if ($this->request->controller =='activities' && $this->request->action =='admin_edit'):?> class="active"<?php endif; ?>>
<?= $this->Html->link(__("add new page"), array('controller' => 'activities', 'action' => 'edit')); ?>
</li>
</ul>
</li>
<li class="treeview <?php if ($this->request->controller =='histories'):?>active<?php endif; ?>">
<a href="#"><i class="fa fa-book"></i><span><?= __('histories');?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li <?php if ($this->request->controller =='histories' && $this->request->action =='admin_index'):?> class="active"<?php endif; ?>>
<?php  echo $this->Html->link(__("<i class='fa fa-circle-o'></i>histories manager"),
array('controller' => 'histories', 'action' => 'index'),array('escape'=>false));?>
</li>
<li <?php if ($this->request->controller =='histories' && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
<?= $this->Html->link(__("<i class='fa fa-circle-o'></i>add new page"),
array('controller' => 'histories', 'action' => 'edit'),array('escape'=>false)); ?>
</li>
</ul>
</li>
<li class="treeview <?php if ($this->request->controller =='posts'):?>active<?php endif; ?>">
<a href="#"><i class="fa fa-file-text"></i><span><?= __('posts');?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li <?php if ($this->request->controller =='posts' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
<?= $this->Html->link(__("posts manager"), array('controller' => 'posts', 'action' => 'index')); ?>
</li>
<li <?php if ($this->request->controller =='posts' && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
<?= $this->Html->link(__("add new page"), array('controller' => 'posts', 'action' => 'edit')); ?>
</li>
</ul>
</li>
<li class="treeview <?php if ($this->request->controller =='categories'):?>active<?php endif; ?>">
<a href="#"><i class="fa fa-folder-open"></i><span><?= __('category');?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li <?php if ($this->request->controller =='categories' && $this->request->action =='admin_index'):?> class="active"<?php  endif; ?>>
<?= $this->Html->link(__("Categories manager") , array('controller' => 'categories', 'action' => 'index')); ?>
</li>
<li <?php if ($this->request->controller =='categories' && $this->request->action =='admin_edit'):?> class="active"<?php  endif; ?>>
<?= $this->Html->link(__("add new category"), array('controller' => 'categories', 'action' => 'edit')); ?>
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
<li class="treeview <?php if ($this->request->controller =='homes'):?>active<?php endif; ?>">
<a href="#"><i class="fa  fa-gear "></i><span><?= __('maintenance');?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li <?php if ($this->request->controller =='homes' && $this->request->action =='admin_clearcache'):?> class="active"<?php  endif; ?>>
<?php echo $this->Html->link(__(" Clear Cache"),array('action'=>'clearcache','controller'=>'homes')); ?>
</li>
</ul>
</li>
</ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
<?php // echo $this->fetch('title'); ?>
<small></small>
</h1>
<p class="breadcrumb">
<?php   echo $this->Html->getCrumbs(' / ',
array('text' => "<i class='fa fa-dashboard'></i>&nbsp;". __('home'),
'url' => array('controller' => 'dashboard', 'action' => 'index',"admin"=>true),
'escape' => false)); ?>
</p>
</section>
<!-- Main content -->
<section class="content">
<!-- nocache -->
<?= $this->Session->flash(); ?>
<?= $this->Session->flash('Auth'); ?>
<!-- /nocache -->
<?php  echo $this->fetch('content'); ?>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php // echo $this->element('top'); ?>

</div><!-- ./wrapper -->
<?php  echo $this->fetch('script'); ?>
</body>
</html>
