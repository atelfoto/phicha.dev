<?php echo  $this->Html->scriptStart($options = array("inline"=>false)); ?>
$( function() {
	    $('#home').vegas({
        	slides: [
				{ src: 'img/images/background1.jpg' }	,
				{ src: 'img/images/background3.jpg' },
				{ src: 'img/images/background2.jpg' },
				{ src: 'img/images/background1.jpg' },
				{ src: 'img/images/background4.jpg' },
				{ src: 'files/home/photo/2/xvga_20150706_194107.jpg' },
				{ src: 'files/home/photo/3/xvga_20150712_095114.jpg' }
        	]
    });
     });
<?php  $this->Html->scriptEnd(); ?>
