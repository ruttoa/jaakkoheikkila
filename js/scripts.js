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
