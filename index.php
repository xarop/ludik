<?php
/* Template Name: Index */
if (get_post_type() === 'post'):
	$pretitle = get_field('news_pretitle', 'option');
	$title = get_field('news_title', 'option');
	$content = get_field('news_content', 'option');
else:
	$pretitle = get_field('pretitle');
	$title = get_the_title();
	$content = get_the_content();
endif;

get_header();

?>

<main class="container">

	<header class="grid lg:grid-cols-2 w-full py-10">
		<div>
			<?php if ($pretitle) echo '<pre>' . $pretitle . '</pre>'; ?>
			<h1> <?php echo $title; ?></h1>
		</div>
		<div>
			<?php echo $content; ?>
		</div>
	</header>

	<section>
		<?php if (have_posts()) : ?>
			<?php
			while (have_posts()) :
				the_post();
			?>

				<?php get_template_part('template-parts/content', get_post_format()); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</section>

</main>

<?php
get_footer();
