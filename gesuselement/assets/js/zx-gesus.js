(function ($) {
    "use strict";

    var GesusGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });

        jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.gesus-sticky-header').addClass('sticky-on')
            } else {
                jQuery('.gesus-sticky-header').removeClass('sticky-on')
            }
        });
        $('.gesus-icon-lightbox a').on('click', '[data-lightbox]', lity);
        // Js End

    };

    var CDNavMenu = function ($scope, $) {

        $scope.find('.gesus-nav-builder').each(function () {
            var settings = $(this).data('gesus');

            // Js Start
            $('.str-open_mobile_menu').on("click", function () {
                $('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
            });
            $('.str-open_mobile_menu').on('click', function () {
                $('body').toggleClass('mobile_menu_overlay_on');
            });
            if ($('.str-mobile_menu li.dropdown ul').length) {
                $('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
                $('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
                    $(this).prev('ul').slideToggle(500);
                });
            }
            // Js End
        });
    };

    var GesusHero = function ($scope, $) {

        $scope.find('.gesus-banner-section').each(function () {
            var settings = $(this).data('gesus');

            // Js Start
            var swiper = new Swiper(".gesus-banner-wrapper", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                },
                navigation: {
                    nextEl: "#banner-next",
                    prevEl: "#banner-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 1,
                    },
                    557: {
                        slidesPerView: 1,
                    },
                },
            });
            // Js End
        });
    };

    var sermonsslider = function ($scope, $) {

        $scope.find('.gesus-our-sermons-section').each(function () {
            var settings = $(this).data('gesus');

            // Js Start

            var swiper = new Swiper(".gesus-our-sermons-wrapper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 3,
                speed: 1000,
                navigation: {
                    nextEl: "#sermons-next",
                    prevEl: "#sermons-prev",
                },

                breakpoints: {
                    900: {
                        slidesPerView: 3,
                    },
                    800: {
                        slidesPerView: 2,
                    },
                    600: {
                        slidesPerView: 2,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
            // Js End
        });
    };


    var brandslider = function ($scope, $) {

        $scope.find('.gesus-brand-section').each(function () {
            var settings = $(this).data('gesus');

            // Js Start

            var swiper = new Swiper(".gesus-brand-wrapper", {
                loop: true,
                spaceBetween: 25,
                slidesPerView: 5,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                },

                breakpoints: {
                    900: {
                        slidesPerView: 5,
                    },
                    800: {
                        slidesPerView: 4,
                    },
                    600: {
                        slidesPerView: 3,
                    },
                    0: {
                        slidesPerView: 2,
                    },
                },
            });

            // Js End
        });
    };

    var testimonialslider = function ($scope, $) {

        $scope.find('.gesus-testimonial-section').each(function () {
            var settings = $(this).data('gesus');
            // Js Start
            var swiper = new Swiper(".testimonial-slide-wrapper", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: "#testimonial-next",
                    prevEl: "#testimonial-prev",
                },
            });
            // Js End
        });
    };


    var condonw = function ($scope, $) {

        $scope.find('.gesus-countdown-section').each(function () {
            var settings = $(this).data('gesus');
            // Js Start
            var time = $('#coming-soon').data('date');
            $('#coming-soon').countdown({
                date: time
            }, function () {
                alert('gesus Theme is ready');
            });
            // Js End
        });
    };


    var playerss = function ($scope, $) {

        $scope.find('.gesus-leatest-sermons-section').each(function () {
            var settings = $(this).data('gesus');
            // Js Start
            var controls =
                [
                    'rewind', // Rewind by the seek time (default 10 seconds)
                    'play', // Play/pause playback
                    'fast-forward', // Fast forward by the seek time (default 10 seconds)
                    'progress', // The progress bar and scrubber for playback and buffering
                    'current-time', // The current time of playback
                    'duration', // The full duration of the media
                    'mute', // Toggle mute
                    'volume', // Volume control
                ];

            const players = Plyr.setup('.js-player', {controls});
            // Expose player so it can be used from the console
            window.player = player;

            // Js End
        });
    };

     var searchhh = function ($scope, $) {
        $scope.find('.mnmd-search-full').each(function () {
            var settings = $(this).data('gesus');
            // Js Start
            $("#search-modal").on("click", function () {
                $(".mnmd-search-full").toggleClass("On");
            });
            $("#mnmd-search-remove").on("click", function () {
                $(".mnmd-search-full").removeClass("On");
            });
   
            // Js End
        });
    };

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            $('.preloader').remove();
            console.log('Elementor editor mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', GesusGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/nav-builder.default', CDNavMenu);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-hero-slider.default', GesusHero);
            elementorFrontend.hooks.addAction('frontend/element_ready/sermons-slider.default', sermonsslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-brand.default', brandslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-testimonial.default', testimonialslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-counter.default', condonw);
            elementorFrontend.hooks.addAction('frontend/element_ready/sermons-audio.default', playerss);
            elementorFrontend.hooks.addAction('frontend/element_ready/headertwo.default', searchhh);
        } else {
            //console.log('Elementor frontend mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', GesusGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-hero-slider.default', GesusHero);
            elementorFrontend.hooks.addAction('frontend/element_ready/sermons-slider.default', sermonsslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-brand.default', brandslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-testimonial.default', testimonialslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/gesus-counter.default', condonw);
            elementorFrontend.hooks.addAction('frontend/element_ready/sermons-audio.default', playerss);
            elementorFrontend.hooks.addAction('frontend/element_ready/headertwo.default', searchhh);
        }
    });
//console.log('addon js loaded');
})(jQuery);