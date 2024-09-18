<?php
/* Template Name: Index */
$index = get_option('page_for_posts');

// Get custom fields and content for the current index page
$pretitle = get_field('pretitle', $index);
$resume = get_field('resume', $index);
$title = get_the_title($index);
$content = get_the_content($index);

get_header();

?>

<main>

	<header class="grid lg:grid-cols-2 w-full py-10">
		<div>
			<?php if ($pretitle) echo '<pre>' . $pretitle . '</pre>'; ?>
			<h1><?php echo $title; ?></h1>
		</div>
		<div>
			<?php echo $resume; ?>
			<?php echo $content; ?>
		</div>
	</header>

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
