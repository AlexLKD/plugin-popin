(function ($) {
    "use strict";

    /**
     * All of the code for your admin-facing JavaScript source
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
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
    const registerName = document.querySelector(".js-popin-name");
    // console.log(registerName);
    const form = document.querySelector(".js-form");
    const popinName = document.querySelector(".js-popin-name-input");

    registerName.addEventListener("submit", function (event) {
        event.preventDefault();
        form.classList.remove("form-hidden");
        popinName.setAttribute("disabled", true);
        console.log(registerName["popin-id"].value);
        
        let popinIdField = document.querySelector('.js-popin-id');
        popinIdField.setAttribute("value", registerName["popin-id"].value);
        // popinIdField.setAttribute("name", registerName["popin-id"].value);
        
    });
});
