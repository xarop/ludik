<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header shadow">
		<?php the_title(sprintf('<h1><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>');
		?>
		<?php ludik_time(); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'ludik') . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'ludik') . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div>

</article>