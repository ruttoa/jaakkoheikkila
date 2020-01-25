<?php 
/* Template Name: Gallery */
get_header(); ?>
<main role="main" class="clearfix">
<?php 
while ( have_posts() ) : the_post(); 
	$gallery_1_thumb = get_field('gallery_1_thumb');
	$gallery_2_thumb = get_field('gallery_2_thumb');
	$gallery_1 = get_field('gallery_1');
	$gallery_2 = get_field('gallery_2');
	?>
	<section>
		<div class="container">
			<figure class="projects-pullquote wp-block-pullquote is-style-solid-color has-background-black">
				<blockquote>
					<p>The Gallery is the abstract
					of my themes.</p>
					<p class="small">I devide the gallery into two walls. The first one is my favourite images from different themes. The second one Waterspaces in Venice. You are also able to order prints from different themes beside the gallery.<p>
					<cite>Gallery</cite>
				</blockquote>
			</figure>
			<div class="gallery-intro clearfix">
				<h1 class="page-title">Gallery</h1>
				<div class="row">
					<div class="col">
						<h3>Wall 1</h3>
						<?php
						if( $gallery_1_thumb ) {
							echo wp_get_attachment_image( $gallery_1_thumb, 'feed-thumbnail' );
						}
						?>
						<button class="open-gallery-link js-open-gallery" data-target="#wall-1-gallery">Click to open <span></span></button>
					</div>
					<div class="col">
						<h3>Wall 2</h3>
						<?php
						if( $gallery_2_thumb ) {
							echo wp_get_attachment_image( $gallery_2_thumb, 'feed-thumbnail' );
						}
						?>
						<button class="open-gallery-link js-open-gallery" data-target="#wall-2-gallery">Click to open <span></span></button>
					</div>
				</div>
				<div class="clearfix gallery-description">
					<p>I print my images to the smooth Hahnemuehle Photo Rag paper, and sign them. The main paper size is A3+. When you are thinking to order prints, please contact me.</p>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
