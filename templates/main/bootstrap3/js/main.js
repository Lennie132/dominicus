$(document).ready(function () {
    $(".block-op-zoek p").dotdotdot({
        watch: "window"
    });
    $(".block-fancy-content p").dotdotdot({
        watch: "window"
    });

    $('[data-toggle="tooltip"]').tooltip();

    if (!Modernizr.objectfit) {
        $('.post__image-container').each(function () {
            var $container = $(this),
                    imgUrl = $container.find('img').prop('src');
            if (imgUrl) {
                $container
                        .css('backgroundImage', 'url(' + imgUrl + ')')
                        .addClass('compat-object-fit');
            }
        });
    }
});
