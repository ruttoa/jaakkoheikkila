<article id="post-<?php the_ID(); ?>" <?php post_class('project-hentry project-hentry--home row'); ?>>
	<div class="col project-hentry__image">
	<?php if ( has_post_thumbnail()) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('project-home'); ?>
		</a>
	<?php endif; ?>
	</div>
	<div class="col project-hentry__text">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php 
			the_title( '<h4 class="entry-title">', '</h4>' ); 
			$project_meta = get_field('project_meta');
			if( $project_meta ):
				echo '<div class="project-meta">' . $project_meta . '</div>';
			endif;
			?>
			</a>
		</header>
		<a class="text-link text-link--small" href="<?php the_permalink(); ?>">explore more</a>
	</div>
</article>