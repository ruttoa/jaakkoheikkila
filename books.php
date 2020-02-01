<?php
/* Template Name: Books */
get_header(); ?>
<main role="main" class="clearfix">
	<?php while (have_posts()) : the_post(); ?>
		<section>
			<div class="container container--narrow">
				<figure class="projects-pullquote wp-block-pullquote is-style-solid-color">
					<blockquote data-aos="fade-up" data-aos-offset="0">
						<p>His photographs often contain
							nostalgia for a lost world
							as well as warm humour. </p>
						<cite>Books</cite>
					</blockquote>
				</figure>
				<div class="books-list-wrapper books-list-first clearfix">
					<?php
					$book_ids = get_field('books', false, false);
					$query = new WP_Query(array(
						'post_type'     => 'book',
						'post_status'	=> 'publish',
						'posts_per_page' => 4,
						'post__in'			=> $book_ids,
						'orderby'        	=> 'post__in',
					));
					$i = 1;
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							$book_gallery = get_field('book_gallery');
							$book_text_left = get_field('book_text_left');
							$book_text_right = get_field('book_text_right');
					?>
							<div id="book-<?php echo $i; ?>" class="book" data-aos="fade-up">
								<a href="#" data-target="#book-<?php echo $i; ?>-gallery" class="js-open-gallery">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-<?php echo $i; ?>.jpg" alt="" />
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
					<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
				<figure class="projects-pullquote wp-block-pullquote is-style-solid-color">
					<blockquote>
						<p>At the same time, the photographs
							bring the viewer to ponder
							the miracle of being in the world.</p>
						<cite>Books</cite>
					</blockquote>
				</figure>
				<div class="books-list-wrapper books-list-second clearfix">
					<?php
					$query = new WP_Query(array(
						'post_type'     => 'book',
						'post_status'	=> 'publish',
						'posts_per_page' => 4,
						'offset' => 4,
						'post__in'			=> $book_ids,
						'orderby'        	=> 'post__in',
					));
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					?>
							<div id="book-<?php echo $i; ?>" class="book" data-aos="fade-up">
								<a href="#" data-target="#book-<?php echo $i; ?>-gallery" class="js-open-gallery">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-<?php echo $i; ?>.jpg" alt="" />
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
					<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>