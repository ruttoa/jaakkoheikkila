<div class="entry-content">
	<?php
	the_content();

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'jaakkoheikkila' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span class="page-numbers">',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'jaakkoheikkila' ) . ' </span>%',
		'separator'   => '<span class="separator"> </span>',
	) );
	?>
</div>
