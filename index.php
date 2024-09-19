<?php
/* Template Name: Index */
get_header();
?>

<main>
	<?php get_template_part('template-parts/hero'); ?>

	<section>
		<?php
		// If it's not the page for posts, query the custom post type 'work'
		if (!is_home() && !is_page(get_option('page_for_posts'))) {
			$args = array(
				'post_type' => 'work',  // Custom post type
				'posts_per_page' => 10, // Adjust the number of posts per page if needed
			);
			$work_query = new WP_Query($args);

			if ($work_query->have_posts()) :
				while ($work_query->have_posts()) :
					$work_query->the_post();
					get_template_part('template-parts/content', get_post_format());
				endwhile;

				wp_reset_postdata(); // Reset the post data after custom query

			else :
				echo '<p>No work posts found.</p>';
			endif;
		} else {
			// Default loop for regular posts (blog page)
			if (have_posts()) :
				while (have_posts()) :
					the_post();
					get_template_part('template-parts/content', get_post_format());
				endwhile;
			endif;
		}
		?>
	</section>

</main>

<?php
get_footer();
