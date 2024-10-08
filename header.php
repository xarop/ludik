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

	<?php do_action('ludik_site_before'); ?>

	<?php do_action('ludik_header'); ?>

	<header class="site-header">
		<div class="container">
			<nav class="flex-row">
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
						if (is_front_page()) echo '<h1 class="hidden lg:block">' . get_bloginfo('description') . '</h1>';
						else echo '<pre class="hidden lg:block">' . get_bloginfo('description') . '</pre>';
						?>
					</div>


				</div>

				<?php get_template_part('template-parts/menu'); ?>

			</nav>
		</div>
	</header>

	<?php do_action('ludik_content_start');	?>