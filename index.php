<?php
/* Template Name: Index */
get_header();
$type = 'post';
$slug = get_post_field('post_name', get_post());
$slug = esc_html($slug);
$columns = 3;
if ($slug == 'work') {
	$type = 'work';
	$columns = 2;
}
?>

<!-- <div class="lg:grid-cols-3"></div>
<div class="lg:grid-cols-2"></div> -->

<main>
	<?php get_template_part('template-parts/hero'); ?>

	<section class="p-sm lg:p-xl">

		<?php
		// Ensure `paged` is correctly set
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => $type,
			'paged' => $paged
		);
		$work_query = new WP_Query($args);

		if ($work_query->have_posts()) :
			echo '<div class="grid grid-cols-1 lg:grid-cols-' . $columns . ' gap-lg lg:gap-xl">';
			while ($work_query->have_posts()) :
				$work_query->the_post();
				get_template_part('template-parts/content');
			endwhile;
			echo '</div>';

			// Pagination Links
			$pagination_args = array(
				'total'     => $work_query->max_num_pages,
				'current'   => $paged,
				'prev_text' => __('« Previous', 'ludik'),
				'next_text' => __('Next »', 'ludik'),
			);
			if (paginate_links()) echo '<nav class="pagination text-gray4">' . paginate_links($pagination_args) . '</nav>';

			wp_reset_postdata(); // Reset the post data after custom query

		else :
			echo '<p>No work posts found.</p>';
		endif;
		?>

	</section>
</main>

<?php
get_footer();
