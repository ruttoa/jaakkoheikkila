<?php
$type = get_post_type();
if ($type == 'project') { 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('project-hentry'); ?>>
	<?php if ( has_post_thumbnail()) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('feed-thumbnail'); ?>
		</a>
	<?php endif; ?>
	<header class="entry-header">
		<?php the_title('<h4 class="entry-title">','</h4>' ); ?>
	</header>
</article>

<?php } else { ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-hentry'); ?>>
	<header class="entry-header">
		<?php the_title('<h4 class="entry-title">','</h4>' ); ?>
	</header>
	<div class="news-content">
		<?php the_content(); ?>
	</div>
	<?php 
	if ( has_post_thumbnail()) :
		the_post_thumbnail('feed-thumbnail'); 
	endif; 
	?>
</article>

<?php } ?>