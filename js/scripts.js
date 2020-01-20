jQuery(document).ready(function ($) {
/*
function Gallery($el, options) {
    var style = options.style || "oneImage";
    delete options.style;
    var $gal = $el;
    var $slides = $gal.children("dl");
    var id = $gal.attr("id");
    var $container = $('<div class="' + id + '"></div>').appendTo($gal);
    var $wrapper = $('<div class="swiper-wrapper"></div>').appendTo($container);
    if (style == "oneImage") {
        $slides.each(function () {
            var $slide = $('<div class="swiper-slide"></div>');
            var imgSrc = $(this).find("img").attr("src");
            $slide.css('background-image', 'url(' + imgSrc + ')');
            var text = $(this).find("dd").html();
            $('<h1 class="slide-text"></h1>').html(text).appendTo($slide);
            $slide.appendTo($wrapper);
            $(this).remove()
        });
        $container.addClass('oneImage')
    } else if (style == "sameHeight") {
        $slides.each(function () {
            var $slide = $('<div class="swiper-slide"></div>');
            $slide.html($(this).find("img"));
            var text = $(this).find("dd").html();
            $('<h1 class="slide-text"></h1>').html(text).appendTo($slide);
            $slide.appendTo($wrapper);
            $(this).remove()
        });
        $container.addClass('sameHeight')
    }
    $gal.children('br').remove();
    if (options.pagination)
        $container.append('<div class="swiper-pagination ' + options.pagination.substring(1) + '"></div>');
    if (options.prevButton)
        $container.append('<div class="swiper-button-prev ' + options.prevButton.substring(1) + '"></div>');
    if (options.nextButton)
        $container.append('<div class="swiper-button-next ' + options.nextButton.substring(1) + '"></div>');
    var gallerySwiper = new Swiper('.' + id, options)
}
*/
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
    });
    var swiperBig = new Swiper('#project-slider-big .swiper-container', {
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
    });
    /*swiperBig.on('slideChange', function () {
        //console.log('slide changed');
        swiperThumbs.slideTo(swiperBig.activeIndex);
    });*/
    
    //swiperContainer = $slider.find('.swiper-container');
    //swiper = new Swiper(swiperContainer, args);
    /*
    setTimeout(function () {
        swiperThumbs.update(true);
        swiperThumbs.slideTo(0, 0)
    }, 200);
    */
    $(document).on('click', '.slider .image-player-link', function (e) {
        e.preventDefault();
        $('.b-overlay').addClass('show visible');
        $('body').addClass('overlay-opened');
        /*console.log('image-player-link');
        var args = {
            url: $(this).attr('href'),
            type: 'post',
            success: function (html) {
                $(html).filter('.b-overlay').imagesLoaded(function () {
                    $('body').append($(html).filter('.b-overlay'));
                    imageOverlay.$el = $('.b-overlay');
                    if ($('.story__header h1').length) {
                        imageOverlay.$el.find('.b-overlay__title a').attr('href', window.location.toString()).text($('.story__header h1').text())
                    }
                    imageOverlay.init();
                    imageOverlay.openAndGoTo();
                    setTimeout(function () {
                        imageOverlay.$el.dwImagePlaceholder()
                    }, 100)
                })
            }
        };
        var ids = []
            , total = 0
            , mainId = $(this).data('image-id');
        $('.image-player-link').each(function () {
            var id = $(this).data('image-id');
            ids.push(id);
            if (id != mainId) {
                total++
            }
        });
        if (total > 0) {
            args.data = {
                sequence: ids.join(',')
            }
        }
        if (document.body.classList.contains('single-post')) {
            args.data.player_post = document.body.className.replace(/^.*postid-(\d+).*$/, '$1')
        }
        $.ajax(args);
        return !1*/
    });
    $(document).on('click', '.close', function (e) {
        e.preventDefault();
        $('.b-overlay').removeClass('show visible');
        $('body').removeClass('overlay-opened');
    });
/*
    var overlay = window.imageOverlay = {
        $el: $('.b-overlay'),
        gallerySwiper: !1,
        gridControls: !1,
        moving: !1,
        opened: !1,
        init: function () {
            var that = this;
            this.$slider = this.$el.find('.slider');
            this.$grid = this.$el.find('.b-overlay__grid');
            this.$overlayControls = this.$el.find('.overlay-control');
            this.$gridControls = this.$el.find('.grid-control');
            $('.js-overlay-open').click(function (e) {
                e.preventDefault();
                if (that.opened)
                    return;
                that.open();
                var slide = $(this).data('slide')
                if (slide === 'current')
                    return;
                setTimeout(function () {
                    if (!slide)
                        slide = 0;
                    if (that.gallerySwiper)
                        that.gallerySwiper.slideTo(slide);
                    else {
                        var $teaser = that.$el.find('.swiper-slide--temp').eq(slide);
                        if ($teaser.length)
                            that.$el.animate({
                                scrollTop: $teaser.position().top - 60
                            })
                    }
                }, 25)
            });
            $('.js-overlay-close').click(function (e) {
                if (!$('body').is('.simplified')) {
                    e.preventDefault();
                    that.close()
                }
            });
            $('.js-overlay-grid-open').click(function (e) {
                e.preventDefault();
                that.openGrid()
            });
            $('.js-overlay-grid-close').click(function (e) {
                e.preventDefault();
                that.closeGrid()
            });
            that.$el.scroll(function () {
                var t = that.$el.scrollTop();
                if (t > 50)
                    that.$el.addClass('locked');
                else
                    that.$el.removeClass('locked')
            });
            $('.b-caption__opener').click(function () {
                var $this = $(this);
                var $slide = $this.closest('.swiper-slide--temp');
                if ($slide.length)
                    $slide.find('.b-overlay__bottom').slideDown('slow')
            });
            $('.b-overlay__title').click(function (e) {
                if (window.location.href.indexOf('/attachment/') < 0) {
                    e.preventDefault();
                    that.close(!0)
                }
            });
            if (this.$el.is('.show.visible')) {
                that.open()
            }
        },
        open: function () {
            var that = this;
            setTimeout(function () {
                $('html, body').addClass('overlay-opened');
                that.opened = !0
            }, 10);
            setTimeout(function () {
                window.openNicely(that.$el);
                window.openNicely(that.$overlayControls);
                that.$el.animate({
                    scrollTop: 0
                }, 1000);
                setTimeout(function () {
                    window.updateAll();
                    window.shareInit();
                    window.checkCaptions();
                    $win.off('scroll', window.dwScroll);
                    that.$el.on('scroll', window.dwScroll)
                }, 100)
            }, 20)
        },
        openAndGoTo: function () {
            var that = this
                , index = this.$el.data('index');
            this.initialIndex = index - 1;
            this.open()
        },
        close: function (scrollToo) {
            var that = this;
            window.closeNicely(this.$el);
            window.closeNicely(this.$gridControls);
            window.closeNicely(this.$grid);
            $('html, body').removeClass('overlay-opened');
            this.opened = !1;
            if (scrollToo) {
                setTimeout(function () {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 1000)
                }, 10)
            }
            setTimeout(function () {
                that.$el.off('scroll');
                $win.on('scroll', window.dwScroll);
                that.$el.remove()
            }, 800)
        },
        openGrid: function () {
            window.openNicely(this.$grid);
            window.closeNicely(this.$overlayControls);
            window.openNicely(this.$gridControls);
            if (!this.gridControls)
                this.initGridControls()
        },
        closeGrid: function () {
            window.closeNicely(this.$grid);
            window.openNicely(this.$overlayControls);
            window.closeNicely(this.$gridControls)
        },
        activateSlide: function ($slide) {
            var html, $cnt = $slide.find('script.slide-content');
            if ($slide.is('.activated')) {
                return
            }
            if ($cnt.length) {
                html = $cnt.html()
            }
            if (!html && $slide.data('html')) {
                html = $slide.data('html')
            }
            if (!html) {
                return
            }
            $slide.html(html);
            $slide.data('html', html);
            $slide.addClass('activated');
            $slide.find('img[data-src]').each(function () {
                var $img = $(this)
                    , $tmp = $('<img />');
                $tmp.load(function () {
                    $img.attr('src', $img.data('src'));
                    $img.data('src', !1);
                    setTimeout(window.updateAll, 100)
                });
                $tmp.attr('src', $img.data('src'))
            });
            if ($slide.find('.related-placeholder').length) {
                $.ajax({
                    url: $slide.data('url'),
                    data: {
                        load_related: 1
                    },
                    success: function (html) {
                        $slide.find('.related-placeholder').replaceWith(html);
                        $slide.find('.b-overlay__related').dwImagePlaceholder()
                    }
                })
            }
        },
        deactivateSlide: function ($slide) {
            if ($slide.is('.activated')) {
                $slide.removeClass('activated');
                $slide.data('html', $slide.html());
                $slide.empty()
            }
        },
        activeSlideAndSiblings: function ($slide) {
            var that = this;
            this.activateSlide($slide);
            if ($slide.prev()) {
                this.activateSlide($slide.prev());
                $slide.prev().prevAll('.activated').each(function () {
                    that.deactivateSlide($(this))
                })
            }
            if ($slide.next()) {
                this.activateSlide($slide.next());
                $slide.next().nextAll('.activated').each(function () {
                    that.deactivateSlide($(this))
                })
            }
        },
        initSwiper: function () {
            var that = this;
            var swiperIndex = swiperInit(that.$slider);
            if (!1 === swiperIndex)
                return;
            if (!that.opened)
                return;
            var args = {
                speed: 600,
                slidesPerView: 1,
                spaceBetween: 600,
                autoHeight: !0,
                prevButton: that.$el.find('.slider').find('.swiper-container').find('.gallery-arrow--left'),
                nextButton: that.$el.find('.slider').find('.swiper-container').find('.gallery-arrow--right'),
                onSlideChangeStart: function () {
                    that.moving = !0;
                    that.$el.animate({
                        scrollTop: 0
                    }, 1000);
                    that.$el.addClass('transitioning anim-last-slide');
                    that.$el.find('img').trigger('external-resize');
                    setTimeout(function () {
                        that.$el.addClass('anim-next-slide');
                        that.$el.removeClass('anim-last-slide')
                    }, 300)
                },
                onSlideChangeEnd: function (swiper) {
                    that.$el.removeClass('transitioning anim-next-slide');
                    that.$el.find('img').trigger('external-resize');
                    that.moving = !1;
                    that.activeSlideAndSiblings(that.$el.find('.slider .swiper-slide').eq(swiper.activeIndex))
                },
                threshold: 40
            }
            if ('initialIndex' in this) {
                args.initialSlide = this.initialIndex;
                that.activeSlideAndSiblings(that.$el.find('.slider .swiper-slide').eq(this.initialIndex))
            }
            this.gallerySwiper = this.$el.find('.slider').find('.swiper-container').swiper(args);
            swipers[swiperIndex].inst = this.gallerySwiper;
            swipers[swiperIndex].running = !0;
            this.gallerySwiper.on('TransitionEnd', function (s) {
                that.$el.find('.counter .active').text(s.activeIndex + 1)
            });
            that.$el.find('.story-big-image > a').click(function (e) {
                e.preventDefault();
                if (that.moving)
                    return;
                if (!that.opened)
                    return;
                that.gallerySwiper.slideNext()
            });
            $(document).keydown(function (e) {
                if (that.moving)
                    return;
                if (!that.opened)
                    return;
                switch (e.which) {
                    case 37:
                        that.gallerySwiper.slidePrev();
                        break;
                    case 39:
                        that.gallerySwiper.slideNext();
                        break;
                    case 27:
                        that.close();
                        break;
                    default:
                        return
                }
                e.preventDefault()
            })
        },
        initGridControls: function () {
            this.gridControls = !0;
            var that = this;
            $('.grid-item').click(function (e) {
                e.preventDefault();
                var $item = $(this);
                var i = $item.data('index');
                if (that.gallerySwiper)
                    that.gallerySwiper.slideTo(i);
                else {
                    var $teaser = that.$el.find('.swiper-slide--temp').eq(i);
                    if ($teaser.length)
                        that.$el.animate({
                            scrollTop: $teaser.position().top - 60
                        })
                }
                that.closeGrid()
            })
        }
    }
    if (overlay.$el.length) {
        overlay.init()
    }
*/
});