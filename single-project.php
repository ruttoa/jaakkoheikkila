<?php get_header(); ?>
	<main role="main" class="clearfix">
		<?php while ( have_posts() ) : the_post(); ?>
			<section>
				<?php get_template_part( 'template-parts/page', 'header' ); ?>
				<div class="container container--narrow entry-container clearfix">
					<div class="entry-content">
					<?php 
					$project_meta = get_field('project_meta');
					if( $project_meta ):
						echo '<div class="project-meta">' . $project_meta . '</div>';
					endif;

					$project_description = get_field('project_description');
					if( $project_description ): 
						echo  $project_description; 
					endif; 
					?>
					</div>
					<?php //the_content(); ?>
				</div>
				<div class="container container--narrow project-featured-image">
					<?php 
					if ( has_post_thumbnail() ): 
						the_post_thumbnail( 'hero-image' );
					endif;
					?>
				</div>
			</section>
			<section class="quote-section">
			<?php
			$blockquote = get_field('blockquote');
			if( $blockquote ): ?>
				<figure class="wp-block-pullquote is-style-solid-color">
					<blockquote>
						<p><?php echo $blockquote['quote']; ?></p>
						<cite><?php echo $blockquote['cite'] ?></cite>
					</blockquote>
				</figure>
			<?php endif; ?>
			</section>
			<section class="gallery-section">
				<?php 
				$images = get_field('gallery');
				if( $images ): ?>
				<div id="project-slider" class="slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						<?php foreach( $images as $image ): ?>
							<div class="swiper-slide">
								<a href="#" class="image-player-link" data-image-id="<?php echo esc_attr($image['id']); ?>"> 
									<img src="<?php echo esc_url($image['sizes']['hero-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-src="<?php echo esc_url($image['url']); ?>" />
								</a>
							</div>
						<?php endforeach; ?>
						</div>
						<div class="swiper-button-prev"></div>
    					<div class="swiper-button-next"></div>
					</div>
				</div>
				<?php endif; ?>
				
			</section>
			<div class="b-overlay">
				<div class="b-overlay__header">
					<div class="b-overlay__site-title"><a href="<?php echo esc_url(home_url('/')); ?>">Jaakko Heikkilä</a></div>
					<h3 class="b-overlay__gallery-title"><?php the_title(); ?></h3>				
					<div class="b-overlay__controls category-photographer">
						<!--div class="counter overlay-control show visible">
							<span class="active">1</span>/<span class="sum">50</span>
						</div>-->
						<div class="grid-open js-overlay-grid-open overlay-control show visible">
							<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
						</div>
						<div class="grid-close js-overlay-grid-close grid-control"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39.9 15"><defs><style>.cls-1,.cls-3{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{stroke:#312e2d;}</style><clipPath id="clip-path" transform="translate(-254 -375)"><rect class="cls-1" x="254" y="375" width="39.9" height="15"></rect></clipPath></defs><title>gallery</title><g class="cls-2"><rect class="cls-3" x="10.87" y="0.5" width="18.77" height="14"></rect><polyline class="cls-3" points="36.33 5.18 39.22 8.28 36.33 11.37"></polyline><polyline class="cls-3" points="3.57 5.18 0.68 8.28 3.57 11.37"></polyline></g></svg></div>
						
						<a href="" class="close js-overlay-close">
							<em class="line-1"></em>
							<em class="line-2"></em>
						</a>
					</div>
				</div>
				<div id="project-slider-big" class="slider">
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
			</div>
			<section class="projects-feed-section">
				<div class="container">
					<h2>Projects</h2>
				</div>
				<div class="container-wide">
					<div class="row">
						<?php 
						$query = new WP_Query(array(
							'post_type'     => 'project',
							'posts_per_page' => -1,
						)); 
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
							get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
						else : 
							get_template_part( 'template-parts/content', 'none' );
						wp_reset_postdata();
						endif; 
						?>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
