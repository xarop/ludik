<?php do_action('tailpress_content_end'); ?>



<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="site-footer py-12" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="container lg:flex lg:justify-between lg:items-center">



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

		<div class="menu-item text-gray-400">developed in Barcelona by &nbsp;<a href="https://xarop.com" target="_blank">xarop.com</a></div>

	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>