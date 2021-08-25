<?php
$book_gallery = get_field('book_gallery');
$book_text_left = get_field('book_text_left');
$book_text_right = get_field('book_text_right');
// Get the passed down post count variable from the page template
$i = $args['post_count'];
?>

<div id="book-<?php echo $i; ?>" class="book" data-aos="fade-up">
    <a href="#" data-target="#book-<?php echo $i; ?>-gallery" class="js-open-gallery">
        <?php the_post_thumbnail('large'); ?>
        <h4 class="book__title"><?php the_title(); ?></h4>
        <button class="open-gallery-link open-gallery-link--small js-open-gallery" data-target="#book-<?php echo $i; ?>-gallery">Open gallery <span></span></button>
    </a>
</div>
<div id="book-<?php echo $i; ?>-gallery" class="b-overlay b-overlay--book">
    <div class="b-overlay__header">
        <div class="container container--narrow">
            <div class="b-overlay__site-title"><a href="<?php echo esc_url(home_url('/')); ?>">Jaakko Heikkilä</a></div>
            <h3 class="b-overlay__gallery-title"><?php the_title(); ?></h3>
            <div class="b-overlay__controls category-photographer">
                <a href="#" class="close js-overlay-close">
                    <em class="line-1"></em>
                    <em class="line-2"></em>
                </a>
            </div>
        </div>
    </div>
    <div class="b-overlay__text">
        <div class="container container--narrow">
            <div class="row">
                <div class="col">
                    <?php echo $book_text_left; ?>
                </div>
                <div class="col">
                    <?php echo $book_text_right; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="slider-grid" class="gallery-grid b-overlay__grid">
        <div class="container">
            <div class="row">
                <?php
                if ($book_gallery) :
                    foreach ($book_gallery as $image) :
                ?>
                        <div class="col">
                            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php
                    endforeach;
                else :
                    ?>
                    <p>No images in gallery.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>