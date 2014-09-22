(function($){})(window.jQuery);

$(document).ready( function() {

	$(".main-nav__link--has-sub").hover( function() {
			$(".main-nav__link--has-sub").removeClass("main-nav__link--has-active-sub");
			$(this).addClass("main-nav__link--has-active-sub");

			// get list of all classes for this element
			var classList = this.className.split(' ');

			// remove unimportant classes from classList
			var index = 0;
			var excludeClasses = [  "main-nav__link",
															"main-nav__link--has-sub",
															"current" ];

			for ( var i = 0; i < excludeClasses.length; i++ ) {
				index = classList.indexOf( excludeClasses[i] );
				if ( index > -1 ) { classList.splice( index, 1 ); }
			}

			// hide all submenus so only current one is displayed
			$(".main-nav__sub-list").addClass("is-hidden");

			// display appropriate submenu (based on remaining class in classList)
			$( "." + classList[0] + "__sub" ).removeClass("is-hidden");

		}, function() {}

	);


});