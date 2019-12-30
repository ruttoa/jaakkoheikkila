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
					<div id="project-slider" class="swiper-container">
						<div class="swiper-wrapper">
						<?php foreach( $images as $image ): ?>
							<div class="swiper-slide">
								<img src="<?php echo esc_url($image['sizes']['hero-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							</div>
						<?php endforeach; ?>
						</div>
						<div class="swiper-button-prev"></div>
    					<div class="swiper-button-next"></div>
					</div>
				<?php endif; ?>
				<script>
				var swiper = new Swiper('.swiper-container', {
					slidesPerView: 'auto',
					centeredSlides: true,
					spaceBetween: 30,
					loop: true,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
				</script>
			</section>
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
