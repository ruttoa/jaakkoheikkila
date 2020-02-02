<?php get_header(); ?>
<main role="main" class="clearfix">
	<section>
		<div class="container entry-container clearfix">
			<header class="page-header">
				<div class="container container--narrow">
					<h1 class="page-title page-title--nocontent"><span>404</span> <?php _e('Sorry, nothing found.', 'jaakkoheikkila'); ?></h1>
					<p><?php _e('Please check that you have a correct url. If you tried a specific gallery, please choose one from below.', 'jaakkoheikkila'); ?></p>
				</div>
			</header>
			<section class="projects-feed-section">
				<div class="container">
					<h3><?php _e('Projects', 'jaakkoheikkila'); ?></h3>
				</div>
				<div class="container-wide">
					<div class="row">
						<?php
						$query = new WP_Query(array(
							'post_type'     => 'project',
							'posts_per_page' => -1,
						));
						if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
								get_template_part('template-parts/content', get_post_format());
							endwhile;
						else :
							get_template_part('template-parts/content', 'none');
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</section>
		</div>
	</section>
</main>
<?php get_footer(); ?>