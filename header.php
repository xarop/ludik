<?php
$shortcode = get_field('shortcode', 'option');
$link = get_field('cta', 'option');
$cta = array();
if ($link) {
	$url = esc_url($link['url']);
	$title = esc_html($link['title']);
	$target = esc_attr($link['target']) ? esc_attr($link['target']) : '_self';
	$cta = '<a href="' . $url . '" target="' . $target . '" class="btn">' . $title . '</a>';
}


// Get the content of the page
the_post();
$content = get_the_content();
if (is_front_page()) :
	// Replace <h1> with <div class="h1"> and </h1> with </div>
	$content = str_replace('<h1>', '<div class="h1">', $content);
	$content = str_replace('</h1>', '</div>', $content);
endif;

$background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('tailpress_site_before'); ?>



	<?php do_action('tailpress_header'); ?>

	<header>
		<div class="mx-auto container">
			<div class="flex justify-between items-center py-6">
				<div class="site-logo z-50 flex justify-between items-center">
					<div class="flex items-center">
						<?php if (has_custom_logo()) { ?>
							<?php the_custom_logo(); ?>
						<?php } else { ?>
							<a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo('name'); ?>
							</a>
						<?php } ?>


						<?php
						if (is_front_page()) echo '<h1 class="hidden lg:block ml-5 italic">' . get_bloginfo('description') . '</h1>';
						else echo '<span class="hidden lg:block ml-5 italic">' . get_bloginfo('description') . '</span>';
						?>
					</div>


				</div>

				<?php get_template_part('template-parts/menu'); ?>



			</div>
		</div>
	</header>


	<?php if (is_front_page()) : ?>
		<!-- Start introduction -->
		<div class="container mx-auto">

			<div class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
				<h2><?php the_title(); ?></h2>
			</div>

			<section class="home-content">
				<article>
					<?php echo apply_filters('the_content', $content); ?>
				</article>
			</section>


			<?php if ($shortcode): ?>
				<section class="gallery">
					<!-- Gallery -->
					<h2><?php the_field('title', 'option'); ?></h2>
					<?php echo do_shortcode($shortcode); ?>
					<div class="py-10 text-center"><?php echo $cta; ?></div>
				</section>
			<?php endif; ?>

		</div>
	<?php endif; ?>

	<?php do_action('tailpress_content_start');	?>