<article id="post-<?php the_ID(); ?>" <?php post_class('bg-secondary shadow'); ?>>

	<div class="shadow">
		<?php get_template_part('template-parts/hero'); ?>
		<div class="entry-content">
			<?php the_content(); ?>

			<?php
			echo '<small class="meta-content">';
			echo '<span class="cats">';
			the_category(', ');
			echo '</span>';
			echo '<span class="tags">';
			the_tags('', ', ', '');
			echo '</span>';
			echo '</small>';
			?>

		</div>
	</div>

</article>

<nav class="text-gray4"><em><?php previous_post_link(); ?></em><em><?php next_post_link(); ?></em></nav>