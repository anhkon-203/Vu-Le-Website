(function ($) {
  window.onload = function () {
    $(document).ready(function () {
      sliderPage();
      Sticky();
      Openmenu();
      Backtop();
      animateAOS();
    });
  };
})(jQuery);

function sliderPage() {
  if ($(".list-slide .ideal-slide").length > 1) {
    $(".list-slide").flickity({
      pageDots: true,
      prevNextButtons: false,
      contain: true,
      cellAlign: "right",
      imagesLoaded: true,
      draggable: true,
      wrapAround: true,
      // autoPlay: true,
    });
  }
  if ($(".slide-grid .g-item").length > 1) {
    $(".slide-grid").flickity({
      pageDots: true,
      prevNextButtons: false,
      contain: true,
      cellAlign: "right",
      imagesLoaded: true,
      draggable: true,
      wrapAround: true,
      // autoPlay: true,
    });
  }
  if ($(".partnerslideSwiper .swiper-slide").length > 1) {
    var partnerslideSwiper = new Swiper(".partnerslideSwiper", {
      grabCursor: true,
      slidesPerView: 6,
      spaceBetween: 20,
      allowTouchMove: false,
      grabCursor: true,
      loop: true,
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 4,
        },
        1280: {
          slidesPerView: 6,
        }
      }
    });
  }
  if ($(".tabslideSwiper .swiper-slide").length > 1) {
    var tabslideSwiper = new Swiper(".tabslideSwiper", {
      grabCursor: true,
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  }
}

function Sticky() {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 120) {
      $(".header-desktop").addClass("sticky");
    } else {
      $(".header-desktop").removeClass("sticky");
    }
  });
}

function Openmenu() {
  $(".open-mobi").click(function () {
    $(".sidebar-menu").addClass("showmenu");
  });
  $(".close-mobi").click(function () {
    $(".sidebar-menu").removeClass("showmenu");
  });

  var $ul = $(".menu-middle > ul");
  $ul.find("li a").click(function (e) {
    var $li = $(this).parent();
    if ($li.find("ul").length > 0) {
      e.preventDefault();
      if ($li.hasClass("selected")) {
        $li.removeClass("selected").find("li").removeClass("selected");
        $li.find("ul").slideUp(400);
        $li.find("a i").removeClass("i-up");
      } else {
        if ($li.parents("li.selected").length == 0) {
          $ul.find("li").removeClass("selected");
          $ul.find("ul").slideUp(400);
          $ul.find("li a i").removeClass("i-up");
        } else {
          $li.parent().find("li").removeClass("selected");
          $li.parent().find("> li ul").slideUp(400);
          $li.parent().find("> li a i").removeClass("i-up");
        }

        $li.addClass("selected");
        $li.find(">ul").slideDown(400);
        $li.find(">a>i").addClass("i-up");
      }
    }
  });

  var activeLi = $("li.selected");
  if (activeLi.length) {
    opener(activeLi);
  }
  function opener(li) {
    var ul = li.closest("ul");
    if (ul.length) {
      li.addClass("selected");
      ul.addClass("open");
      li.find(">a>i").addClass("i-up");
      if (ul.closest("li").length) {
        opener(ul.closest("li"));
      } else {
        return false;
      }
    }
  }
}

function Backtop() {
  var Backtotop = function () {
    if (jQuery(".backtotop").length) {
      var scrollTrigger = 500,
        backToTop = function () {
          var scrollTop = jQuery(window).scrollTop();
          if (scrollTop > scrollTrigger) {
            jQuery(".backtotop").addClass("showw");
          } else {
            jQuery(".backtotop").removeClass("showw");
          }
        };
      backToTop();
      jQuery(window).on("scroll", function () {
        backToTop();
      });
      jQuery(".backtotop").on("click", function (e) {
        e.preventDefault();
        jQuery("html,body").animate({ scrollTop: 0 }, 500);
      });
    }
  };
  Backtotop();
}

function animateAOS() {
  AOS.init({
    disable: "mobile",
    duration: 1200,
    delay: 300,
  });
}
