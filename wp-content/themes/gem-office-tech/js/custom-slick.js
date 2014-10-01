$(document).ready( function() {

	/**
	 * Initialize Slick carousel for the appropriate containers
	 * 
	 * Slick carousel: http://kenwheeler.github.io/slick/
	 */
	 $(".slick-banner").slick({
	 		autoplay: true,
	 		autoplaySpeed: 10000,
	 		dots: true,
	 		infinite: true
	 });

	 $(".slick-news").slick({
	 	autoplay: true,
 		autoplaySpeed: 15000,
	 	dots: true,
	 	infinite: true,
	 	slide: 'article'
	 });

});