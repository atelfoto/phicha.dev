<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {
	    $('#home').vegas({
        	slides: [
				{ src: 'files/home/photo/1/xvga_01.jpg' },
				{ src: 'files/home/photo/2/xvga_02.jpg' },
				{ src: 'files/home/photo/3/xvga_03.jpg' },
				{ src: 'files/home/photo/4/xvga_04.jpg' },
				{ src: 'files/home/photo/5/xvga_05.jpg' }
        	]
    });
     });
<?php  $this->Html->scriptEnd(); ?>
