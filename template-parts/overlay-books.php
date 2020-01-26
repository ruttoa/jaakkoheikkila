<div id="project-gallery-overlay" class="b-overlay">
	<div class="b-overlay__header">
		<div class="b-overlay__site-title"><a href="<?php echo esc_url(home_url('/')); ?>">Jaakko Heikkilä</a></div>
		<h3 class="b-overlay__gallery-title"><?php the_title(); ?></h3>				
		<div class="b-overlay__controls category-photographer">
			<div class="grid-open js-overlay-grid-open show visible">
				<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
			</div>
			<div class="grid-close js-overlay-grid-close">
				<span></span>
			</div>
			
			<a href="" class="close js-overlay-close">
				<em class="line-1"></em>
				<em class="line-2"></em>
			</a>
		</div>
	</div>
	<div id="project-slider-big" class="slider b-overlay__slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">
			<?php foreach( $images as $image ): ?>
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
	<div id="project-slider-grid" class="gallery-grid b-overlay__grid">
		<div class="container container--narrow">
			<div class="row">
				<?php 
				$i = 1;
				foreach( $images as $image ): 
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
