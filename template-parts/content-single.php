<article id="post-<?php the_ID(); ?>" <?php post_class('bg-secondary shadow'); ?>>

	<div class="shadow">
		<?php get_template_part('template-parts/hero'); ?>
		<div class="entry-content">

			<?php the_content(); ?>

		</div>
	</div>

</article>

<nav class="text-gray4"><em><?php previous_post_link(); ?></em><em><?php next_post_link(); ?></em></nav>