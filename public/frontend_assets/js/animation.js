//animation scroll js

$('.about-box-layout2 ul li a').on('click', function () {
 if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
     var target = $(this.hash);
     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
     if (target.length) {
         htmlBody.animate({
             scrollTop: target.offset().top - 150
         }, 2000);
         return false;
     }
 }
});
