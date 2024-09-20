<article id="post-<?php the_ID(); ?>" <?php post_class('bg-secondary shadow'); ?>>

	<div class="shadow">
		<?php get_template_part('template-parts/hero'); ?>

		<?php
		if (have_rows('work')):
			while (have_rows('work')): the_row();
				$image = get_sub_field('image');
				$text = get_sub_field('text');
				echo '<div class="post-header">';
				echo '<figure>';
				if ($image) echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
				echo '</figure>';
				echo '<div class="p-xl text-gray5">';
				echo  $text;
				echo '</div>';
				echo '</div>';
			endwhile;
		endif;
		?>



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