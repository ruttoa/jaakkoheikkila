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
                        get_template_part( 'template-parts/content', 'book', array('post_count' => $i) );
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
						//'posts_per_page' => 4,
						'offset' => 4,
						'post__in'			=> $book_ids,
						'orderby'        	=> 'post__in',
					));
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					    get_template_part( 'template-parts/content', 'book', array('post_count' => $i) );
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