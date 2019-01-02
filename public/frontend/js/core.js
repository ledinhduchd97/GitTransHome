'use strict';var Services = function ($) {
  var _is = function _is(selecter) {
    return $(selecter).length != 0;
  };



  return {
    is: _is };


}(jQuery);

"use strict";
jQuery(document).ready(function ($) {
  // Window on load
  $(window).on('load', function () {

    if (Services.is('.video-owl-carousel')) {
      $('.video-owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        mouseDrag: false,
        navText: [$('.our-video--prev'), $('.our-video--next')],
        items: 1 });

    }
  });

  $('.btn-play').on('click', function (ev) {
    // $(this).closest('.item').find('.item__video--content')[0].src += "&autoplay=1";
    // $(this).closest('.item').find('.item__video--content').get(0).play();
    ev.preventDefault();

  });
  //banner--slider
  if (Services.is('.banner__slider')) {
    $('.banner__slider').owlCarousel({
      loop: true,
      margin: 10,
      dots: false,
      navText: [$('.banner-nav--previous'), $('.banner-nav--next')],
      items: 1,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          nav: false },

        667: {
          nav: true } } });



  };
  if (Services.is('.feature__slider')) {
    $('.feature__slider').owlCarousel({
      loop: true,
      margin: 10,

      URLhashListener: true,
      dots: false,
      navText: [$('.feature-nav--previous'), $('.feature-nav--next')],
      responsive: {
        0: {
          items: 1,
          nav: false,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true },

        667: {
          nav: false,
          items: 2,
          autoplay: true,
          autoplayTimeout: 3000,
          autoplayHoverPause: true },

        1366: {
          nav: true,
          items: 3,
          autoplay: false,
          autoplayTimeout: 3000,
          autoplayHoverPause: false } } });



  };
  //   details
  $('.detail__slides').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 1,
    center: true,
    dots: false,
    URLhashListener: true,
    startPosition: 'URLHash',
    mouseDrag: false,
    responsive: {
      0: {
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true },

      667: {
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: false } } });




  $('.detail__small-slider').owlCarousel({
    nav: true,
    margin: 15,
    dots: false,
    navText: [$('.detail__small-slider--pre'), $('.detail__small-slider--next')],
    startPosition: 'URLHash',
    responsive: {
      0: {
        items: 3 },

      768: {
        items: 3 },

      1024: {
        items: 5 },

      1366: {
        items: 7 } } });





  //click active item small slider
  $('.small-item').click(function () {
    $('.small-item.active').removeClass('active');
    $(this).addClass('active');
  });
  var get_price = $(".btn-get_price");
  var modal_map = $(".modal_map");

  get_price.click(function (e) {
    $('#form__infor').valid({
      onsubmit: true });

    // if ($('#form__infor').valid() == true) {// here you check if validation returned true or false 
    //   modal_map.modal('hide');
    //   get_price.attr('data-target', '.modal_thanks');
    // }
  });
  // form infor partner
  var send_partner = $(".btn-send__patner");
  var infor_patner = $('#infor_patner');
  send_partner.click(function (e) {
    $('#form-infor_patner').valid({
      onsubmit: true });

    if ($('#form-infor_patner').valid() == true) {// here you check if validation returned true or false 
      infor_patner.modal('hide');
      send_partner.attr('data-target', '#modal-partner-thank');
    }
  });
  // modal_map.modal('hide')

  //btn-show-all
  $('#btn-show-all').click(function () {
    $('.feature__wrap-slider').addClass('disabled');
    $('.feature__all').fadeIn();
  });

  $('#btn-mini').click(function () {
    $('.feature__wrap-slider').removeClass('disabled');
    $('.feature__all').fadeOut('disabled');
  });

  //btn-bar
  $('.btn--bar').click(function (e) {
    if (!e)
    e = window.event;
    //IE9 & Other Browsers
    if (e.stopPropagation) {
      e.stopPropagation();
    }
    //IE8 and Lower
    else {
        e.cancelBubble = true;
      }
    $('.header-mobile').addClass('active');
    $('.mobile--bg').addClass('active');
    $('#wrapper').addClass('active');
  });

  $('.mobile--bg').click(function () {
    removeActive();
  });
  //btn-exit
  $('#mobile__exit').click(function () {
    removeActive();
  });

  $('.main__menu li a').click(function () {
    var id = $(this).attr('href');
    scrollEle(id);
  });

  $('.mobile__menu li a').click(function () {
    var id = $(this).attr('href');
    removeActive();
    scrollEle(id);
  });

  $(window).on('resize', function () {
    var win = $(this); //this = window
    if (win.width() >= 992) {
      removeActive();
    }
  });

  //validation
  $.validator.addMethod(
  "regex",
  function (value, element, regexp) {
    var check = false;
    return this.optional(element) || regexp.test(value);
  },
  "Please check your input.");


  // go it
  $('#form__infor').validate({

    rules: {
      first_name: {
        required: true,
        maxlength: 10,
        minlength: 1
        // regex: /G[a-b].*/i
      },
      email: {
        required: true,
        regex: /^[\w.+\-]+@gmail\.com$/ },

      phone: {
        required: true,
        minlength: 10,
        maxlength: 13,
        regex: /^[0-9 \(\)-]+$/ ,
      } 
    },
    messages: {
      first_name: {
        required: 'First name must be filled out',
        maxlength: jQuery.validator.format('First name must be not over 10 character'),
        minlength: jQuery.validator.format('First name must be at least 1 character'),
        regex: 'The first name must be in the correct format' },

      email: {
        required: 'Email must be filled out',
        regex: 'The email must be in the correct format' },

      phone: {
        required: 'The phone must be filled out',
        minlength: jQuery.validator.format('The phone must be at least 10 character'),
        maxlength: jQuery.validator.format('The phone must be not over 13 character'),
        regex: "The phone must be in the correct default format (123)4567-890"
      } } });



  // login
  $('#form_login').validate({
    rules: {
      username: {
        required: true,
        maxlength: 50,
        minlength: 3 },

      password: {
        required: true,
        minlength: 6,
        maxlength: 18 } },


    messages: {
      username: {
        required: "Username must be fill out",
        minlength: jQuery.validator.format('The username must be at least 3 character'),
        maxlength: jQuery.validator.format('The username must be not over 50 character') },

      password: {
        required: "Password must be fill out",
        minlength: jQuery.validator.format('The password must be at least 6 character'),
        maxlength: jQuery.validator.format('The password must be not over 18 character') } } });



  $('#form-infor_patner').validate({
    rules: {
      patner_fullname: {
        required: true,
        minlength: 6,
        maxlength: 50 },

      patner_email: {
        required: true,
        regex: /^[a-zA-z0-9]{1,32}@gmail.com$/ },

      patner_phone: {
        required: true,
        // number: true,
        maxlength: 13,
        regex: /^\([0-9]{3}\)[0-9]{4}\-[0-9]{3}$/ } },


    messages: {
      patner_fullname: {
        required: "Full name must be fill out",
        minlength: jQuery.validator.format("The fullname must be at least 6 character"),
        maxlength: jQuery.validator.format('The fullname must be not over 50 character') },

      patner_email: {
        required: "Email must be fill out",
        regex: "The email must be in the correct default format (@gmail.com)" },

      patner_phone: {
        required: "The phone must be fill out",
        number: "The phone must be the number",
        maxlength: jQuery.validator.format("The phone must be not over 13 character"),
        regex: "The phone must be in the correct default format (123)4567-890" } } });




  //event scroll
  scrollHeader();
  // keypress enter pop up

  $('#how_we__search').keypress(function (event) {
    var keycode = event.keyCode ? event.keyCode : event.which;
    if (keycode == '13') {
      $('.modal_map').modal('show');
    }
  });

  //click heart
  $('.feature-item__wrap i.fa-heart').click(function () {
    $(this).toggleClass('active');
  });
});

function removeActive() {
  $('.header-mobile').removeClass('active');
  $('.mobile--bg').removeClass('active');
  $('#wrapper').removeClass('active');
}
function scrollEle(ele) {
  $("html, body").animate({
    scrollTop: $(ele).offset().top - 144},
  1000);
  // $("html, body").animate({
  //   scrollTop: $(ele).offset().top
  // }, 1000);
}

function scrollHeader() {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0.00001) {
      $('.header').addClass('fixed');
    } else if ($(this).scrollTop() <= 0.00001) {
      $('.header').removeClass('fixed');
    }
  });
}