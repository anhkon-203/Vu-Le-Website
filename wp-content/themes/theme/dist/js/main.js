(function ($) {
    window.onload = function () {
        $(document).ready(function () {
            animateAOS();
        });
    };
})(jQuery);
function animateAOS() {
    AOS.init({
        disable: "mobile",
        duration: 1200,
        delay: 300,
    });
}
function initializeSwipers() {

    // Swiper s5-home
    var swiper1Config = {
        slidesPerView: 3,
        grabCursor: true,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination-custom',
            clickable: true,
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            768: { slidesPerView: 1 },
            1024: { slidesPerView: 3 },
        }
    };

    new Swiper('.list-project', swiper1Config);

    // Swiper gallery
    var swiperGalleryConfig = {
        slidesPerView: 1,
        grabCursor: true,
        spaceBetween: 10,
        loop: true,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            768: { slidesPerView: 1 },
            1024: { slidesPerView: 1 },
        }
    };

    new Swiper('.gallery', swiperGalleryConfig);
    new Swiper('.gallery-project', swiperGalleryConfig);
  
    //   slide-project
    var swiperProjectConfig = {
        slidesPerView: 3,
        grabCursor: true,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next-custom',
            prevEl: '.swiper-button-prev-custom',
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        }
    };
    new Swiper('.slide-project', swiperProjectConfig);
    new Swiper('.slide-news', swiperProjectConfig);

    // swiper system
    var swiperSystemConfig = {
        slidesPerView: 1,
        grabCursor: true,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,

        },
        navigation: {
            nextEl: '.swiper-button-next-custom',
            prevEl: '.swiper-button-prev-custom',
        },
        
    };
    new Swiper('.slide-system', swiperSystemConfig);

}

function Openmenu() {
    $(".open-mobi").click(function () {
        $(".sidebar-menu").addClass("showmenu");
    });
    $(".close-mobi").click(function () {
        $(".sidebar-menu").removeClass("showmenu");
    });

    var $ul = $(".menu-middle > ul");
    $ul.find("li a i").click(function (e) {
        var $icon = $(this);
        var $li = $icon.closest("li");

        if ($li.find("ul").length > 0) {
            e.preventDefault();
            if ($li.hasClass("selected")) {
                $li.removeClass("selected").find("li").removeClass("selected");
                $li.find("ul").slideUp(400);
                $icon.removeClass("i-up");
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
                $icon.addClass("i-up");
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
    // usage:
    batch(".gsap > *", {
        interval: 0.1,
        onEnter: batch => gsap.to(batch, {autoAlpha: 1, stagger: 0.15, overwrite: true}),
        onLeave: batch => gsap.set(batch, {autoAlpha: 0, overwrite: true}),
        onEnterBack: batch => gsap.to(batch, {autoAlpha: 1, stagger: 0.15, overwrite: true}),
        onLeaveBack: batch => gsap.set(batch, {autoAlpha: 0, overwrite: true})
      });
      
      function batch(targets, vars) {
        let varsCopy = {},
            interval = vars.interval || 0.1,
            proxyCallback = (type, callback) => {
              let batch = [],
                  delay = gsap.delayedCall(interval, () => {callback(batch); batch.length = 0;}).pause();
              return self => {
                batch.length || delay.restart(true);
                batch.push(self.trigger);
                vars.batchMax && vars.batchMax <= batch.length && delay.progress(1);
              };
            },
            p;
        for (p in vars) {
          varsCopy[p] = (~p.indexOf("Enter") || ~p.indexOf("Leave")) ? proxyCallback(p, vars[p]) : vars[p];
        }
        gsap.utils.toArray(targets).forEach(target => {
          let config = {};
          for (p in varsCopy) {
            config[p] = varsCopy[p];
          }
          config.trigger = target;
          ScrollTrigger.create(config);
        });
      }





