<?php get_header(); ?>

<main class="container mx-auto my-8">

	<?php if (have_posts() && ! is_front_page()) : ?>
		<?php
		while (have_posts()) :
			the_post();
		?>

			<?php get_template_part('template-parts/content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</main>

<?php
get_footer();
