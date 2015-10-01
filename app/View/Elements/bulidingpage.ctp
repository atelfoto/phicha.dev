<div id="Content" class="">
	<div class="col-md-9">
		<h2>Site en construction</h2>
		<br/><br/>
		<div class="countdown styled"></div>
		<div id="subscribe" class="text-center">
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

var endDate = "october  29, 2015 15:03:25";

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
