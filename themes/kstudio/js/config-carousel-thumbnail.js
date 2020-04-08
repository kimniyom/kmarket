'use strict';
$(function() {
   
  $('.thumbnail-carousel').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.main-carousel',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    arrows: false,
  });

}); 