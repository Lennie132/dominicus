$(document).ready(function () {
    checkScrollPositionTop();


    var nav = priorityNav.init({
        mainNavWrapper: ".header-main", // mainnav wrapper selector (must be direct parent from mainNav)
        mainNav: ".header-nav", // mainnav selector. (must be inline-block)
        navDropdownLabel: '',
        navDropdownBreakpointLabel: '',
        breakPoint: 976,
        navDropdownClassName: "nav__dropdown", // class used for the dropdown.
        navDropdownToggleClassName: "nav__dropdown-toggle", // class used for the dropdown toggle.

        moved: function () {
        }, // executed when item is moved to dropdown
        movedBack: function () {
        } // executed when item is moved back to main menu);
    });


    // Logo tekst weghalen bij scrollen
    $(window).scroll(function () {
        checkScrollPositionTop();

    });


    // Functie voor het open van submenu's
    $('.header-nav > li.isparent > a').on('click', function (e) {
        //OPTIE 1:
        //Als de pagina zelf ook content bevat, dan link een keer uitzetten
//        if (!$(this).hasClass('is-navigatable')) {
//            e.preventDefault();
//        }
//        $('.header-nav > li.isparent > a').removeClass('is-navigatable');
//        $(this).addClass('is-navigatable');

        //OPTIE 2:
        //Als de pagina zelf geen content bevat, altijd sub-menu triggeren en link uitzetten
        e.preventDefault();


        //Vervolg van de functie voor diepte 1
        if ($(this).parents('li.isparent').eq(0).hasClass('is-open-1')) {
            console.log('sluit 1');
            $(this).parents('li.isparent').eq(0).removeClass('is-open-1');
        } else {
            console.log('open 1');
            $('.nav__dropdown > li.isparent').removeClass('is-open-1');
            $(this).parents('li.isparent').eq(0).addClass('is-open-1');
        }
    });

    //Functie voor 2de niveau van menu
    $('.header-nav > li.isparent > ul > li.isparent > a').on('click', function (e) {
        $('.header-nav > li > ul > li.isparent').removeClass('is-open-2');
        $(this).parents('.main-nav li.isparent > ul > li.isparent').eq(0).addClass('is-open-2');


        //OPTIE 1:
        //Als de pagina zelf ook content bevat, dan link een keer uitzetten
//        if (!$(this).hasClass('is-navigatable')) {
//            e.preventDefault();
//        }
//        $('.header-nav > li.isparent > ul > li.isparent > a').removeClass('is-navigatable');
//        $(this).addClass('is-navigatable');

        //OPTIE 2:
        //Als de pagina zelf geen content bevat, altijd sub-menu triggeren en link uitzetten
        e.preventDefault();

        //Vervolg van de functie voor diepte 2
        if ($(this).parents('li.isparent').eq(0).hasClass('is-open-2')) {
            console.log('sluit 2');
            $(this).parents('li.isparent').eq(0).removeClass('is-open-2');
        } else {
            console.log('open 2');
            $('.nav__dropdown > li.isparent > ul > li.isparent').removeClass('is-open-2');
            $(this).parents('li.isparent').eq(0).addClass('is-open-2');
        }

    });
});

/**
 * Plaatst ander logo zonder tekst bij scrollen
 */
function checkScrollPositionTop() {
    if ($(window).width() < 991) {
        $('.wrapper-logo').removeClass("not-visible");
        $('.wrapper-logo-no-text').addClass("not-visible");
    } else {
        var scrollPosition = $(window).scrollTop();
        if (scrollPosition > 70) {
            $('.wrapper-logo').addClass("not-visible");
            $('.wrapper-logo-160-jaar').addClass("not-visible");
            $('.wrapper-logo-no-text').removeClass("not-visible");
        }
        else {
            $('.wrapper-logo').removeClass("not-visible");
            $('.wrapper-logo-160-jaar').removeClass("not-visible");
            $('.wrapper-logo-no-text').addClass("not-visible");
        }
    }
}