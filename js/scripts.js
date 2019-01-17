$(document).ready(function () {

  //Menu Responsive
  var menu = document.querySelector(".menu"),
    toggle = document.querySelector(".menu-toggle");

  function toggleToggle() {
    toggle.classList.toggle("menu-open");
  };

  function toggleMenu() {
    menu.classList.toggle("active");
  };

  toggle.addEventListener("click", toggleToggle, false);
  toggle.addEventListener("click", toggleMenu, false);

  


 

});

 // STICKY NAV
 var  mn = $("#second-nav");
 mns = "sticky";
 hdr = $('header').height();

$(window).scroll(function() {
if( $(this).scrollTop() > hdr ) {
 mn.addClass(mns);
} else {
 mn.removeClass(mns);
}
});