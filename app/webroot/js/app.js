 (function($){
        /* Quand je clique sur l'icône hamburger je rajoute une classe au body */
     $('.menu-icon').click(function(e){
         e.preventDefault();
         $('body').toggleClass('with--sidebar');
     });
     /* Je veux pouvoir masquer le menu si on clique sur le cache */
    $('#site-cache').click(function(e){
        $('body').removeClass('with--sidebar');
    });
 })(jQuery);
//tooltype de bootstrap
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
// script hamburger
$(document).ready(function(){
	$('.menu-icon').click(function(e){
		e.preventDefault();
		$this = $(this);
		if($this.hasClass('is-opened')){
			$this.addClass('is-closed').removeClass('is-opened');
		}else{
			$this.removeClass('is-closed').addClass('is-opened');
		}
	})
});
$(document).ready(function(){
	$(window).resize(function() {
		ellipses1 = $("#bc1 :nth-child(2)")
		if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
			ellipses2 = $("#bc2 :nth-child(2)")
		if ($("#bc2 a:hidden").length >0) {ellipses2.show()} else {ellipses2.hide()}
	})
});

//script pour le menu mobile
$(document).ready(function() {
	var sideslider = $('[data-toggle=collapse-side]');
	var sel = sideslider.attr('data-target-1');
	var sel2 = sideslider.attr('data-target-2');
	sideslider.click(function(event){
		$(sel).toggleClass('in');
		$(sel2).toggleClass('out');
	});
});
