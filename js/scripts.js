jQuery(document).ready(function ($) {

    var swiperThumbs = new Swiper('#project-slider .swiper-container', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 30,
        loop: true,
        loopAdditionalSlides: 3,
        loopedSlides: 3,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '#project-slider .swiper-button-next',
            prevEl: '#project-slider .swiper-button-prev',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        updateOnImagesReady: true,
    });
    var swiperBigProject = new Swiper('#project-slider-big .swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
            loadPrevNextAmount: 1,
            loadOnTransitionStart: true,
        },
        navigation: {
            nextEl: '#project-slider-big .swiper-button-next',
            prevEl: '#project-slider-big .swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        thumbs: {
            swiper: swiperThumbs,
        },
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        observer: true,
        observeParents: true,
    });

    $('.b-overlay.b-overlay--default').each(function (index, element) {
        $overlay = $(this);
        $overlay.addClass('s' + index);
        $overlay_default_args = {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 1,
                loadOnTransitionStart: true,
            },
            navigation: {
                nextEl: '.s' + index +' .swiper-button-next',
                prevEl: '.s' + index +' .swiper-button-prev',
            },
            pagination: {
                el: '.s' + index + ' .swiper-pagination',
                type: 'fraction',
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            observer: true,
            observeParents: true,
        };
        var swiperBigDefault = new Swiper('.s' + index + ' .swiper-container', $overlay_default_args);

        $overlay.on('click', '.b-overlay__grid img', function (e) {
            e.preventDefault();
            $target = $(this).attr('data-target');
            $overlay.addClass('b-overlay--slider-mode').removeClass('b-overlay--gallery-mode');
            if ($overlay.is('.b-overlay--project')) {
                setTimeout(function () {
                    swiperBigProject.slideTo($target);
                }, 100);
            } else {
                setTimeout(function () {
                    swiperBigDefault.slideTo($target);
                }, 100);
            }
        });
    });

    function openSlider($id) {
        $overlay = $($id);
        $overlay.addClass('show visible b-overlay--slider-mode').removeClass('b-overlay--gallery-mode');
        $('body').addClass('overlay-opened');
        //swiperBigProject.update();
    };
    function openGallery($id) {
        $overlay = $($id);
        $overlay.addClass('show visible b-overlay--gallery-mode').removeClass('b-overlay--slider-mode');
        $('body').addClass('overlay-opened');
    };
    $(document).on('click', '#project-slider .swiper-slide .image-player-link', function (e) {
        e.preventDefault();
        $clickedIndex = $(this).attr('data-target');
        openSlider('#project-gallery-overlay');
    });
    $(document).on('click', '.close', function (e) {
        e.preventDefault();
        $('.b-overlay').removeClass('show visible');
        $('body').removeClass('overlay-opened');
    });

    $(document).on('click', '.js-overlay-grid-open', function (e) {
        e.preventDefault();
        $(this).parents('.b-overlay').addClass('b-overlay--gallery-mode').removeClass('b-overlay--slider-mode');
    });

    $(document).on('click', '.js-overlay-grid-close', function (e) {
        e.preventDefault();
        $(this).parents('.b-overlay').addClass('b-overlay--slider-mode').removeClass('b-overlay--gallery-mode');
    });

    $(document).on('click', '.b-overlay.b-overlay--project .b-overlay__grid img', function (e) {
        e.preventDefault();
        $target = $(this).attr('data-target');
        $(this).parents('.b-overlay').addClass('b-overlay--slider-mode').removeClass('b-overlay--gallery-mode');
        setTimeout(function () {
            swiperBigProject.slideTo($target);
        }, 100);
    });

    $(document).on('click', '.js-open-gallery', function (e) {
        e.preventDefault();
        $target = $(this).attr('data-target');
        openGallery($target);
    });

});