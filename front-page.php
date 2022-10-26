<?php get_header(); ?>
<main role="main" class="clearfix">
	<?php while (have_posts()) : the_post(); ?>
		<section class="clearfix section section--intro">
			<div class="container container--narrow">
				<h1 data-aos="fade-up" data-aos-offset="0"><?php the_field('title'); ?></h1>
				<img data-aos="fade-up" data-aos-offset="0" data-aos-delay="500" src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-1.jpg" alt="" />
			</div>
		</section>
		<section class="clearfix section section--beyond">
			<div class="container container--narrow">
				<div class="row">
					<div class="col">
						<img data-aos="fade-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-2.jpg" alt="" />
					</div>
					<div class="col">
						<h2 data-aos="fade-left"><?php the_field('beyond_photography_title'); ?></h2>
						<blockquote>
							<p><?php the_field('beyond_photography_quote'); ?></p>
							<cite><?php the_field('beyond_photography_cite'); ?></cite>
						</blockquote>
					</div>
				</div>
			</div>
		</section>
		<section class="clearfix section section--projects">
			<div class="container container--narrow">
				<h2><?php the_field('projects_title'); ?></h2>
				<div class="latest-projects">
					<?php
					$project_query = new WP_Query(array(
						'post_type'     => 'project',
						'post_status'	=> 'publish',
						'posts_per_page' => 3,
					));
					if ($project_query->have_posts()) : while ($project_query->have_posts()) : $project_query->the_post();
							get_template_part('template-parts/content', 'project-home');
						endwhile;
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					wp_reset_postdata();
					?>
				</div>
				<a class="text-link text-link--big" href="<?php echo get_post_type_archive_link('project'); ?>">explore all</a>
			</div>
		</section>
		<section class="clearfix section section--books">
			<div class="container container--narrow">
				<div class="books-image">
					<div class="books-image__inner">
						<h2><?php the_field('books_title'); ?></h2>
						<p><?php the_field('books_quote'); ?></p>
						<a href="/books" class="text-link text-link--small">explore more</a>
					</div>
				</div>
			</div>
		</section>
		<section class="clearfix section section--gallery">
			<div class="container container--narrow">
				<h2><?php the_field('gallery_title'); ?></h2>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-4.jpg" alt="" />
				<div class="gallery-text">
					<p><?php the_field('gallery_description'); ?></p>
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
				<h2><?php the_field('news_title'); ?></h2>
				<div class="latest-news row three-col">
					<?php
					$news_query = new WP_Query(array(
						'post_type'     => 'post',
						'posts_per_page' => 6,
					));
					if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post();
							get_template_part('template-parts/content', get_post_format());
						endwhile;
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					wp_reset_postdata();
					?>
				</div>
				<a class="text-link" href="<?php echo get_post_type_archive_link( 'post' ); ?>">All news</a>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>