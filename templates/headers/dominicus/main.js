$(document).ready(function () {
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
    // Menu button
    $('.menu-trigger').on('click', function () {
        console.log("test menu");
        $('html').toggleClass('menu__is-open');
        if ($('html').hasClass('menu__is-open')) {
            console.log("open");

        } else {
            console.log("dicht");
            $('nav > ul > li.isparent').removeClass('is-open-1');
            $('nav > ul > li.isparent').removeClass('is-open-2');
            $('nav > ul > li.isparent > a').removeClass('is-navigatable');
            $('nav > ul> li.isparent > ul > li.isparent > a').removeClass('is-navigatable');
        }
    });



    $('.nav-ul > li.isparent > a').on('click', function (e) {
            if ($(this).parents('.nav-ul > li.isparent').eq(0).hasClass('is-open-1')) {
                $(this).parents('.nav-ul > li.isparent').eq(0).removeClass('is-open-1');
            } else {
                $('.nav-ul > li.isparent').removeClass('is-open-1');
                $(this).parents('.nav-ul > li.isparent').eq(0).addClass('is-open-1');
            }

            $('.nav-ul> li.isparent > ul > li.isparent > a').on('click', function (e) {


            });

            //Link uitschakelen
            $(this).addClass('is-navigatable');
            if ($(this).hasClass('is-navigatable')) {
                e.preventDefault();
            }

            $('nav > ul > li.isparent > a').addClass('is-navigatable');

    });
    
    
});
