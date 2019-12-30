<?php get_header(); ?>
	<main role="main" class="clearfix">
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="clearfix section section--intro">
				<div class="container container--narrow">
					<h1>I’ve been laying all day <br>
					letting the light come <br>
					into my room.</h1>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-1.jpg" alt="" />
				</div>
			</section>
			<section class="clearfix section section--beyond">
				<div class="container container--narrow">
					<div class="row">
						<div class="col">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-2.jpg" alt="" />
						</div>
						<div class="col">
							<h2>Beyond <br>
							photography</h2>
							<blockquote>
								<p>Jaakko Heikkilä realizes a photocraphic art Beyond photography aesthetically in the Philosphical tradition of romanticism of Caspar David Friedrich or an enlightened Rationalism of Max Ernst and Salvador Dali. Yet at the same time his work contrawise, contradicts this classification. He moves us by touching the many wounds od globally oriented societes and cultures with his padst and current projects. </p>
								<cite><strong>Andreas Vowinckel</strong>, Arthistorian, Cologne, Germany</cite>
							</blockquote>
						</div>
					</div>
				</div>
			</section>
			<section class="clearfix section section--projects">
				<div class="container container--narrow">
					<h2>Projects</h2>
					<div class="latest-projects">
						<?php 
						$query = new WP_Query(array(
							'post_type'     => 'project',
							'post_status'	=> 'publish',
							'posts_per_page' => 3,
						)); 
						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
							get_template_part( 'template-parts/content', 'project-home' );
						endwhile;
						else : 
							get_template_part( 'template-parts/content', 'none' );
						wp_reset_postdata();
						endif; 
						?>
					</div>
					<a class="text-link text-link--big" href="#">explore all</a>
				</div>
			</section>
			<section class="clearfix section section--books">
				<div class="container container--narrow">
					<div class="books-image">
						<div class="books-image__inner">
							<h2>Books</h2>
							<p>There is no other way, the way worward is a mystery Dreams are movement, the future is in our blood Titian knew how to paint black, a man rises out of blackness.</p>
							<a href="/books" class="text-link text-link--small">explore more</a>
						</div>
					</div>
				</div>
			</section>
			<section class="clearfix section section--gallery">
				<div class="container container--narrow">
					<h2>Gallery</h2>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-4.jpg" alt="" />
					<div class="gallery-text">
						<p>You are able to order gallery images. I print them to the beautiful Hahnemuehle Photo Rag paper and sign them. </p>
						<a href="/gallery" class="text-link text-link--big">explore more</a>
					</div>
				</div>
			</section>
			<section class="clearfix section section--intermission">
				<div class="container container--wide">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-5.jpg" alt="" />
				</div>
			</section>
			<section class="clearfix section section--news">
				<div class="container">
					<h2>News</h2>
					<div class="latest-news row three-col">
						<?php 
						$query = new WP_Query(array(
							'post_type'     => 'post',
							'posts_per_page' => 6,
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
					<a class="text-link" href="#">All news</a>
				</div>
			</section>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
