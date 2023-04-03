$(document).ready(function () {
  $(".banner-slick-slider").slick({
    slidesToShow: 1,
    infinite: true,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: false,
    arrows: true,
  });

  $(".products-slick-slider").slick({
    slidesToShow: 4,
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: true,
  });

  $(".beute-slick-slider").slick({
    slidesToShow: 3,
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: true,
  });

  $(".sb-img").click(function () {
    $(".sub-nav").fadeIn(250);
  });

  $(".close-btn").click(function () {
    $(".sub-nav").fadeOut(250);
  });

  $("#password").click(function () {
    $(".tab").removeClass("active");
    $(".tab").addClass("active");
  });

  // Accordian
  $(".accordion-titel").bind('click', function () {
    if ($(this).parent(".accordion-item").hasClass("active")) {
      $(this).parent(".accordion-item").find(".accordion-contant").slideUp();
      $(this).parent(".accordion-item").removeClass("active");
    }
    else {
      $(this).parent(".accordion-item").find(".accordion-contant").slideDown();
      $(this).parent(".accordion-item").addClass("active");
      $(this).parent(".accordion-item").prevAll(".accordion-item").find(".accordion-contant").slideUp();
      $(this).parent(".accordion-item").nextAll(".accordion-item").find(".accordion-contant").slideUp();
      $(this).parent(".accordion-item").nextAll(".accordion-item").removeClass("active");
      $(this).parent(".accordion-item").prevAll(".accordion-item").removeClass("active");
    }
    // $(this).parent(".accordion-item").find(".accordion-contant").slideToggle();
    // $(this).parent(".accordion-item").prevAll(".accordion-item").find(".accordion-contant").slideUp();
    // $(this).parent(".accordion-item").nextAll(".accordion-item").find(".accordion-contant").slideUp();
  });
})