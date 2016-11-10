$(document).ready(function () {

    $('.bxslider').bxSlider({
        // Automatisch sliden als er meer dan 1 slide is
        auto: ($('.bxslider > .slide').not('.bxslider > .bx-clone').length > 1) ? true : false,
        pager: false,
        controls: false,
        speed: 1500,
        pause: 6000
    });
    
});