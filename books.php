<?php 
/* Template Name: Books */
get_header(); ?>
<main role="main" class="clearfix">
<?php while ( have_posts() ) : the_post(); ?>
	<section>
		<div class="container container--narrow">
			<figure class="projects-pullquote wp-block-pullquote is-style-solid-color">
				<blockquote>
					<p>His photographs often contain
					nostalgia for a lost world
					as well as warm humour. </p>
					<cite>Books</cite>
				</blockquote>
			</figure>
			<div class="books-list-wrapper books-list-first clearfix">
				<div id="book-1" class="book">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-1.jpg" alt="" />
					<h4 class="book-title">Silent talks, 2011</h4>
				</div>
				<div id="book-2" class="book">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-2.jpg" alt="" />
					<h4 class="book-title">Rooms hidden by the Water, 2016</h4>
				</div>
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
				<div id="book-1" class="book">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-1.jpg" alt="" />
					<h4 class="book-title">Silent talks, 2011</h4>
				</div>
				<div id="book-2" class="book">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books/book-2.jpg" alt="" />
					<h4 class="book-title">Rooms hidden by the Water, 2016</h4>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
