$(document).ready(function () {

    //Menu Responsive
    const menu = $(".menu");
    const toggle = $(".toggle");



    // evt click burger
    toggle.click(function () {
        toggle.toggleClass("menu-open");
        menu.toggleClass("active");
    });



// STICKY NAV
    const mn = $("#second-nav");
    const mns = "sticky";
    const hdr = $('header').height();

    $(window).scroll(function () {
        if ($(this).scrollTop() > hdr) {
            mn.addClass(mns);
        } else {
            mn.removeClass(mns);
        }
    });

    function setMenu() {
        if ($(window).scrollTop() < hdr && $('.sticky').length && $('.active').length) {
            menu.removeClass("active");

        }
    }

    setMenu();
    $(window).resize(setMenu);

});

