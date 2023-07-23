var sparkMultipurpose = sparkMultipurpose || {};

sparkMultipurpose.primaryMenu = {

    init: function () {
        this.focusMenuWithChildren();
    },

    // The focusMenuWithChildren() function implements Keyboard Navigation in the Primary Menu
    // by adding the '.focus' class to all 'li.menu-item-has-children' when the focus is on the 'a' element.
    focusMenuWithChildren: function () {
        // Get all the link elements within the primary menu.
        var links, i, len,
            menu = document.querySelector('.box-header-nav');

        if (!menu) {
            return false;
        }

        links = menu.getElementsByTagName('a');

        // Each time a menu link is focused or blurred, toggle focus.
        for (i = 0, len = links.length; i < len; i++) {
            links[ i ].addEventListener('focus', toggleFocus, true);
            links[ i ].addEventListener('blur', toggleFocus, true);
        }

        //Sets or removes the .focus class on an element.
        function toggleFocus () {
            var self = this;
            // Move up through the ancestors of the current link until we hit .primary-menu.
            while (-1 === self.className.indexOf('main-menu')) {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase()) {
                    if (-1 !== self.className.indexOf('focus')) {
                        self.className = self.className.replace(' focus', '');
                    } else {
                        self.className += ' focus';
                    }
                }
                self = self.parentElement;
            }
        }
    }
}; // sparkMultipurpose.primaryMenu

jQuery(document).ready(function ($) {

    /**
     * Call Primary Menu Focus Class
    */
    sparkMultipurpose.primaryMenu.init();    // Primary Menu

    /**
     * Add RTL Class in Body
    */
    var brtl;

    if ($("body").hasClass('rtl')) {

        brtl = true;

    } else {

        brtl = false;
    }

    /**
     * Header Search
    */
    $('.menu-item-search a').click(function () {
        if ($(this).hasClass('layout_two')) {
            $(this).parents('.nav-menu').find('.main-menu, .nav-buttons').hide();
        }
        $('.full-search-wrapper').addClass('search-triggered');
        setTimeout(function () {
            $('.full-search-wrapper input[type="search"]').focus();
        }, 1000);
    });

    $('.full-search-wrapper .close-icon').click(function () {
        $('.full-search-wrapper').removeClass('search-triggered');
        if ($(this).hasClass('search-layout-two')) {
            $(this).parents('.nav-menu').find('.main-menu, .nav-buttons').show();
        }
        $('.menu-item-search a').focus();
    });

    /**
     * Banner Slider
    */
    var owlHome = $(".features-slider");
    owlHome.owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplayTimeout: parseInt(owlHome.data('pause')) || 5000,
        smartSpeed: parseInt(owlHome.data('speed')) || 2000,
        autoplay: parseInt(owlHome.data('autoplay')) == 1 ? true : false,
        loop: parseInt(owlHome.data('loop')) == 1 ? true : false,
        transitionStyle: 'fade',
        margin: 0,
        nav: parseInt(owlHome.data('controls')) == 1 ? true : false,
        dots: parseInt(owlHome.data('pager')) == 1 ? true : false,
        autoHeight: false,
        mouseDrag: parseInt(owlHome.data('drag')) == 1 ? true : false,
        autoplayHoverPause: true,
        items: 1,
        rtl: brtl
    });

    $(".owl-item.active .supertitle").addClass('animated fadeInUp delay-1');
    $(".owl-item.active .maintitle").addClass('animated fadeInUp delay-2');
    $(".owl-item.active .maincontent").addClass('animated fadeInUp delay-3');
    $(".owl-item.active .btn-area").addClass('animated fadeInUp delay-4');

    owlHome.on('change.owl.carousel', function (event) {
        var item = event.item.index - 1;
        $('.supertitle').removeClass('animated fadeInUp delay-1');
        $('.maintitle').removeClass('animated fadeInUp delay-2');
        $('.maincontent').removeClass('animated fadeInUp delay-3');
        $('.btn-area').removeClass('animated fadeInUp delay-4');
        $('.owl-item').not('.cloned').eq(item).find('.supertitle').addClass('animated fadeInUp delay-1');
        $('.owl-item').not('.cloned').eq(item).find('.maintitle').addClass('animated fadeInUp delay-2');
        $('.owl-item').not('.cloned').eq(item).find('.maincontent').addClass('animated fadeInUp delay-3');
        $('.owl-item').not('.cloned').eq(item).find('.btn-area').addClass('animated fadeInUp delay-4');
    });

    /**
      *  Enable Number Count(1,2,3) in Owl Dots 
    */
    var dots = document.querySelectorAll(".features-slider .owl-dots .owl-dot");
    var i = 1;
    dots.forEach((elem) => {
        elem.innerHTML = i;
        i++;
    });

    /**
     * Testimonial
    */
    $('#testimonial_slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        smartSpeed: 2500,
        dots: true,
        items: 1,
    });

    /**
     * Client logo owl slider
    */
    $('.client-logo-slider').owlCarousel({
        loop: true,
        dots: true,
        margin: 10,
        nav: false,
        autoplay: true,
        smartSpeed: 3000,
        autoplayTimeout: 5000,
        rtl: brtl,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            },
            1024: {
                items: 5
            }
        }
    });

    /**
     * Portfolio Carousel
    */
    $('#portfolio-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        smartSpeed: 2500,
        center: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            769: {
                items: 3
            },
            1024: {
                items: 5
            }
        }
    });

    $('.postgallery-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        smartSpeed: 2500,
        center: true,
        singleItem: true,
        stagePadding: 0,
        items: 1,
        scrollbarType: "progress",
    });

    /**
     * scrollTop To Top
    */
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('#back-to-top').addClass('show');
        } else {
            $('#back-to-top').removeClass('show');
        }
    });

    $('#back-to-top').click(function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 800);
    });
    try {
        var progressPath = document.querySelector('.progress path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 300ms linear';
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var percent = Math.round(scroll * 100 / height);
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
            $('#back-to-top .percent').text(percent + "%");
        };
        updateProgress();
        $(window).scroll(updateProgress);
    } catch (e) {

    }


    /**
     * Video popup
    */
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    /****
     * Contact Section 
    */
    $('body').on('click', '.contact-detail-toggle.open', function () {
        $(this).next('.contact-content').addClass('box-hidden');
        $(this).addClass('closed').removeClass('open');
    });

    $('body').on('click', '.contact-detail-toggle.closed', function () {
        $(this).next('.contact-content').removeClass('box-hidden');
        $(this).removeClass('closed').addClass('open');
    });


    /**
     * Gallery Light Box
    */
    $("a[rel^='portfolio[work]']").prettyPhoto({
        theme: 'light_rounded',
        slideshow: 5000,
        autoplay_slideshow: false,
        keyboard_shortcuts: true,
        deeplinking: false,
        default_width: 500,
        default_height: 344,
    });

    /**
     * About us Achiments Awards Counter
    */
    $('.achivement').counterUp();

    /***
     *  search
    */
    $('.search_main_menu a').click(function () {
        $('.ss-content').addClass('ss-content-act');
    });
    $('.ss-close').click(function () {
        $('.ss-content').removeClass('ss-content-act');
    });

    /***
     * Youtube Player
    */
    try {
        $(".section[data-property]").YTPlayer({
            showControls: false,
            containment: 'self',
            mute: true,
            addRaster: false,
            useOnMobile: false,
            playOnlyIfVisible: true,
            anchor: 'center,center',
            showYTLogo: false,
            loop: true,
            optimizeDisplay: true,
            quality: 'hd720'
        });
    } catch (e) {
        console.log(e);
    }

    /**************
     * Sidebar mobile menu 
    */
    $('body').click(function (evt) {

        //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
        if ($(evt.target).closest('.cover-modal.active').length)
            return;

        //Do processing of click event here for every element except with id menu_content
        if ($('body').hasClass('showing-menu-modal')) {
            var body = document.body;

            $('.cover-modal.active').removeClass('active');
            body.classList.remove('showing-modal');
            body.classList.add('hiding-modal');
            body.classList.remove('showing-menu-modal');
            body.classList.remove('show-modal');

            document.documentElement.removeAttribute('style')
            document.body.style.removeProperty('padding-top');

            // Remove the hiding class after a delay, when animations have been run.
            setTimeout(function () {
                body.classList.remove('hiding-modal');
            }, 500);
        }
        return;
    });

    // AOS.init({
    //     // Global settings:
    //     disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    //     startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    //     initClassName: 'aos-init', // class applied after initialization
    //     animatedClassName: 'aos-animate', // class applied on animation
    //     useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    //     disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    //     debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    //     throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

    //     // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    //     offset: 120, // offset (in px) from the original trigger point
    //     delay: 0, // values from 0 to 3000, with step 50ms
    //     duration: 400, // values from 0 to 3000, with step 50ms
    //     easing: 'ease', // default easing for AOS animations
    //     once: false, // whether animation should happen only once - while scrolling down
    //     mirror: false, // whether elements should animate out while scrolling past them
    //     anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    // });

});