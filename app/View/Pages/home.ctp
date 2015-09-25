<?php  echo  $this->set('title_for_layout',__("Accueil")); ?>
<?php echo $this->Html->meta(array('name' => 'robots','type'=>"meta", 'content' => 'index,follow'),NULL,array('inline'=>false)); ?>
<?= $this->Html->css(array('home.min',"https://fonts.googleapis.com/css?family=Raleway:700 "),array('inline'=>false)); ?>
<?php echo $this->Html->meta("description", " ", array("inline"=>false)); ?>
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
		<h2>Site en construction</h2>
		<br/><br/>
		<div class="countdown styled"></div>
		<div id="subscribe">
			<h3>Restez en contact</h3>
			<p>inscrivez vous à la newsletter</p>
			<!-- <h3>Stay in touch</h3> -->
			<!-- <form action="" method="post" onsubmit="">
				<p><input name="" placeholder="Entrez votre e-mail" type="text" id=""/>
					<input type="button" value="Submit" class="btn btn-primary" />
				</p>
			</form> -->
<?php
	echo $this->Form->create("Enews", array(
		'action'=> 'add',
		'type' => 'post',
		'inputDefaults' => array(
			'label' => false,
			'div' => false,
			)
		));
		?>

		<?php
	echo $this->Form->input('mail', array("placeholder"=>"Entrez votre Email"));
	//echo $this->Form->submit();
	//echo $this->Form->input("Envoyer", array('type'=>"button","value"=>"Submit"));
	echo $this->Form->button("Envoyer", array('type'=>"submit"));
?>
<!-- <input type="button" value="Envoyez"> -->

<?php
	echo  $this->Form->end();
?>
		</div>
	</div>
	<div class="">
		<?php  echo $this->element('sidebar'); ?>
	</div>
</div>


<?php echo $this->Html->script(array("vegas.min","jquery.countdown"),array('inline'=>false)); ?>
<?php  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {
	    $('#home').vegas({
        	slides: [
				{ src: 'img/images/background1.jpg' },
				{ src: 'img/images/background3.jpg' },
				{ src: 'img/images/background2.jpg' },
				{ src: 'img/images/background1.jpg' },
				{ src: 'img/images/background4.jpg' },
				{ src: 'files/home/photo/2/xvga_20150706_194107.jpg' },
				{ src: 'files/home/photo/3/xvga_20150712_095114.jpg' }
        	]
    });

var endDate = "September  29, 2015 15:03:25";

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
