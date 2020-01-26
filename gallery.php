<?php 
/* Template Name: Gallery */
get_header(); ?>
<main role="main" class="clearfix">
<?php 
while ( have_posts() ) : the_post(); 
	$gallery_1_thumb = get_field('gallery_1_thumb');
	$gallery_2_thumb = get_field('gallery_2_thumb');
	$gallery_1 = get_field('gallery_1');
	$gallery_2 = get_field('gallery_2');
	?>
	<section>
		<div class="container">
			<figure class="projects-pullquote wp-block-pullquote is-style-solid-color has-background-black">
				<blockquote>
					<p>The Gallery is the abstract
					of my themes.</p>
					<p class="small">I devide the gallery into two walls. The first one is my favourite images from different themes. The second one Waterspaces in Venice. You are also able to order prints from different themes beside the gallery.<p>
					<cite>Gallery</cite>
				</blockquote>
			</figure>
			<div class="gallery-intro clearfix">
				<h1 class="page-title">Gallery</h1>
				<div class="row">
					<div class="col">
						<h3>Wall 1</h3>
						<?php if( $gallery_1_thumb ) { ?>
							<a href="#" class="js-open-gallery" data-target="#wall-1-gallery">
							<?php echo wp_get_attachment_image( $gallery_1_thumb, 'feed-thumbnail' ); ?>
							</a>
						<?php } ?>
						<button class="open-gallery-link js-open-gallery" data-target="#wall-1-gallery">Click to open <span></span></button>
					</div>
					<div class="col">
						<h3>Wall 2</h3>
						<?php if( $gallery_2_thumb ) { ?>
							<a href="#" class="js-open-gallery" data-target="#wall-2-gallery">
							<?php echo wp_get_attachment_image( $gallery_2_thumb, 'feed-thumbnail' ); ?>
							</a>
						<?php } ?>
						<button class="open-gallery-link js-open-gallery" data-target="#wall-2-gallery">Click to open <span></span></button>
					</div>
				</div>
				<div class="clearfix gallery-description">
					<p>I print my images to the smooth Hahnemuehle Photo Rag paper, and sign them. The main paper size is A3+. When you are thinking to order prints, please contact me.</p>
				</div>
			</div>
		</div>
	</section>
	<div id="wall-1-gallery" class="b-overlay b-overlay--default">
		<div class="b-overlay__header">
			<div class="b-overlay__site-title"><a href="<?php echo esc_url(home_url('/')); ?>">Jaakko Heikkilä</a></div>
			<h3 class="b-overlay__gallery-title">Wall 1</h3>				
			<div class="b-overlay__controls category-photographer">
				<div class="grid-open js-overlay-grid-open show visible">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</div>
				<div class="grid-close js-overlay-grid-close">
					<span></span>
				</div>
				<a href="#" class="close js-overlay-close">
					<em class="line-1"></em>
					<em class="line-2"></em>
				</a>
			</div>
		</div>
		<div id="slider-big" class="slider slider--default b-overlay__slider">
			<div class="swiper-container">
				<div class="swiper-wrapper">
				<?php foreach( $gallery_1 as $image ): ?>
					<div class="swiper-slide">
						<div class="content-outer">
							<div class="story-big-image">
								<img src="" class="swiper-lazy" alt="<?php echo esc_attr($image['alt']); ?>" data-src="<?php echo $image['url']; ?>" />
							</div>
						</div>
						<div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
					</div>
				<?php endforeach; ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div id="slider-grid" class="gallery-grid b-overlay__grid">
			<div class="container container--narrow">
				<div class="row">
					<?php 
					$i = 1;
					foreach( $gallery_1 as $image ): 
					?>
					<div class="col">
						<img data-target="<?php echo $i; ?>" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
					<?php 
					$i++; 
					endforeach; 
					?>
				</div>
			</div>
		</div>
	</div>

	<div id="wall-2-gallery" class="b-overlay b-overlay--default">
		<div class="b-overlay__header">
			<div class="b-overlay__site-title"><a href="<?php echo esc_url(home_url('/')); ?>">Jaakko Heikkilä</a></div>
			<h3 class="b-overlay__gallery-title">Wall 2</h3>				
			<div class="b-overlay__controls category-photographer">
				<div class="grid-open js-overlay-grid-open show visible">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</div>
				<div class="grid-close js-overlay-grid-close">
					<span></span>
				</div>
				<a href="#" class="close js-overlay-close">
					<em class="line-1"></em>
					<em class="line-2"></em>
				</a>
			</div>
		</div>
		<div id="slider-big" class="slider slider--default b-overlay__slider">
			<div class="swiper-container">
				<div class="swiper-wrapper">
				<?php foreach( $gallery_2 as $image ): ?>
					<div class="swiper-slide">
						<div class="content-outer">
							<div class="story-big-image">
								<img src="" class="swiper-lazy" alt="<?php echo esc_attr($image['alt']); ?>" data-src="<?php echo $image['url']; ?>" />
							</div>
						</div>
						<div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
					</div>
				<?php endforeach; ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div id="slider-grid" class="gallery-grid b-overlay__grid">
			<div class="container container--narrow">
				<div class="row">
					<?php 
					$i = 1;
					foreach( $gallery_2 as $image ): 
					?>
					<div class="col">
						<img data-target="<?php echo $i; ?>" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
					<?php 
					$i++; 
					endforeach; 
					?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
