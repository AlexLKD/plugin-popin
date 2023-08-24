(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );


document.addEventListener("DOMContentLoaded", function () {
	let show = true;
	document.querySelector("#redmodal").addEventListener("DOMNodeInserted", () => {
		setTimeout(closeKp, 3000)
	});
	
	function closeKp() {
		if (document.querySelector('form div#success')) {
			closeredmodal();
		}
	}
	if (show == true) {
		window.addEventListener('load', ShowPopup);
	}
	
	function ShowPopup() {
	
		setTimeout(e =>
			document.querySelector('#redmodal').classList.remove('hiden'), 100)
		setTimeout(function() {
			document.querySelector('#overlay').classList.add('active');
			document.querySelector('#redmodal').classList.add('active');
	
		}, 2 * 1000 )
	}
	
	const cross = document.querySelector(".js-close-button");
	const overlay = document.querySelector('.js-overlay');
	
	const closedInteractionOptions = [];
	closedInteractionOptions.push(cross);
	closedInteractionOptions.push(overlay);

	closedInteractionOptions.forEach((option) => {
		option.addEventListener("click", closeredmodal);
	});

	

	function closeredmodal() {
		document.querySelector('#redmodal.active').classList.remove('active');
		document.querySelector('#overlay.active').classList.remove('active');
	}
	

})
