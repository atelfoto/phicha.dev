/**
* social
**/
(function(){
var popupCenter = function(url,title, width,height){
	 var popupWidth = width || 640;
	 var popupHeight = height || 320;
	 var windowLeft = window.screenLeft || window.screenX;
	 var windowTop = window.screenTop || window.screenY;
	 var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	 var windowHeight = window.innerHeight || document.documentElement.clientHeight;

	 var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2;
	 var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
	 var popup = window.open(url,title,'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft +'');
	 popup.focus();
	 return true;

};
document.querySelector('.social-twitter').addEventListener('click', function(e) {
	 e.preventDefault();
	 var url = this.getAttribute('data-url');
	 var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
	 "&via=atelfoto_fr" +
	 "&url=" + encodeURIComponent(url);
	 popupCenter(shareUrl, "Partager sur twitter");
});

document.querySelector('.social-facebook').addEventListener('click', function(e) {
	 e.preventDefault();
	 var url = this.getAttribute('data-url');
	 var shareUrl = "https://facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
	 popupCenter(shareUrl, "Partager sur facebook");

});

document.querySelector('.social-googleplus').addEventListener('click', function(e){
		e.preventDefault();
		var url = this.getAttribute('data-url');
		var shareUrl = "https://plus.google.com/share?url=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Google+");
});

document.querySelector('.social-linkedin').addEventListener('click', function(e){
		e.preventDefault();
		var url = this.getAttribute('data-url');
		var shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Linkedin");
});
})();
//menu
 (function($){
    /* Quand je clique sur l'icône hamburger je rajoute une classe au body */
    $('#header__icon').click(function(e){
        e.preventDefault();
        $('body').toggleClass('with--sidebar');
    });
    /* Je veux pouvoir masquer le menu si on clique sur le cache */
   $('#site-cache').click(function(e){
       $('body').removeClass('with--sidebar');
   });
})(jQuery);

