<?php  echo  $this->set('title_for_layout',__("livre d'or")); ?>
<?php echo $this->Html->meta(array('name' => 'robots','type'=>"meta", 'content' => 'index,follow'),NULL,array('inline'=>false)); ?>
<?= $this->Html->css(array('home.min',"https://fonts.googleapis.com/css?family=Raleway:700 "),array('inline'=>false)); ?>
<?php echo $this->Html->meta("description", " ", array("inline"=>false)); ?>
<?php $this->Html->addCrumb("posts",array("controller"=>"posts","action"=>"index"),array('class'=>"btn btn-default disabled")); ?>
<div id="Header">
	<div class="wrapper">
		<h1><?php  echo "studio"; ?></h1>
		<!-- <h1><?php // echo $this->fetch('title'); ?></h1> -->
		<?php // echo $this->assign('title', 'Acces clients'); ?>
		<ul>
			<li><a href="" title="Twitter" class="twitterIcon"></a></li>
			<li><a href="" title="facebook" class="facebookIcon"></a></li>
			<li><a href="" title="linkedIn" class="linkedInIcon"></a></li>
			<li><a href="" title="Pintrest" class="pintrestIcon"></a></li>
		</ul>
	</div>
</div>
<div id="Content" class="wrapper">
	<div class="col-md-9">
		<h2>Page en construction</h2>
		<br/><br/>
		<div class="countdown styled"></div>
		<div id="subscribe">
			<h3>Restez en contact</h3>
			<p>inscrivez vous à la newsletter</p>
			<?php  echo $this->element('enews'); ?>
		</div>
	</div>
	<div class="">
		<?php  echo $this->element('sidebar'); ?>
	</div>
</div>


<?php echo $this->Html->script(array("vegas.min","jquery.countdown"),array('inline'=>false)); ?>
<?php  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {



var endDate = "october  27, 2015 15:03:25";

        $('.countdown.simple').countdown({ date: endDate });

        $('.countdown.styled').countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></div>");
          }
        });

        $('.countdown.callback').countdown({
          date: +(new Date) + 10000,
          render: function(data) {
            $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
          },
          onEnd: function() {
            $(this.el).addClass('ended');
          }
        }).on("click", function() {
          $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

      });

<?php  $this->Html->scriptEnd(); ?>
