<?php do_action('ludik_content_end'); ?>



<?php do_action('ludik_content_after'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action('ludik_footer'); ?>

	<?php if (have_rows('contact', 'option')):  ?>
		<ul class="nav footer-contact">
			<?php
			while (have_rows('contact', 'option')): the_row();
				$name = get_sub_field('name');
				$email = get_sub_field('email');
				$tel = get_sub_field('tel');
			?>
				<li>
					<?php if (esc_attr($name)) echo '<span>' . esc_attr($name) . '</span>'; ?>
					<a href="mailto:<?php echo esc_url($email); ?>" target="_blank" title="<?php echo esc_attr($email); ?>"><?php echo esc_attr($email); ?></a>
					<a href="tel:<?php echo esc_url($tel); ?>" target="_blank" title="<?php echo esc_attr($tel); ?>"><?php echo esc_attr($tel); ?></a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>

	<?php if (have_rows('banners', 'option')):  ?>
		<div class="site-footer-content">
			<?php
			while (have_rows('banners', 'option')): the_row();
				$name = get_sub_field('url');
				$image = get_sub_field('image');
			?>

				<a href="<?php echo esc_url($url); ?>" target="_blank" nofollow class=" opacity-50 hover:opacity-100">
					<img src="<?php echo $image; ?>">
				</a>


			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<nav class="nav">

		<div class="lg:flex lg:items-center">

			<div class="menu-item">&copy; <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?></div>

			<?php
			wp_nav_menu(
				array(
					'container_id'    => 'footer-menu',
					'theme_location'  => 'footer',
				)
			);
			?>
		</div>

		<?php if (have_rows('social', 'option')):  ?>
			<ul class="flex">
				<?php
				while (have_rows('social', 'option')): the_row();
					$icon = get_sub_field('social');
					$url = get_sub_field('url');
				?>
					<li class="menu-item"><a class="icon icon-<?php echo esc_attr($icon); ?>" href="<?php echo esc_url($url); ?>" target="_blank" title="<?php echo esc_attr($icon); ?>"></a></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<div class="menu-item opacity-60">developed in Barcelona by &nbsp;<a href="https://xarop.com" target="_blank">xarop.com</a></div>

	</nav>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>