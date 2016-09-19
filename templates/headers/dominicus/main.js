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
    
    
});
