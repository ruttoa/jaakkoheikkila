<?php get_header(); ?>
<main role="main" class="clearfix">
	<section>
		<?php //get_template_part( 'template-parts/page', 'header' ); ?>
		<div class="container">
			<figure class="projects-pullquote wp-block-pullquote is-style-solid-color">
				<blockquote>
					<p>Images are intimate 
					and poetic, exhaling the 
					deep and warm Humanity. </p>
					<cite>Projects</cite>
				</blockquote>
			</figure>
			<div class="clearfix projects-intro">
				<h1>Projects</h1>
				<p>I started early 1990s in Torne River Valley in northern Sweden among the Finnish minority. Since then my main themes have settled on populations around the world, those who are outsiders in one way or another as well as those caught under the wheels of change.</p>
			</div>
			<div class="primary row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; ?>
				<div class="pagination">
					<?php 
					the_posts_pagination(
						array(
							'prev_text'          => __( 'Previous page' ),
							'next_text'          => __( 'Next page' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
						)
					); 
					?>
				</div>
				<?php else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
