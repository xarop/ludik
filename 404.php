<?php
$avatar = get_field('avatar', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="antialiased">
	<div class="md:flex min-h-screen">
		<div class="w-full md:w-1/2 flex items-center justify-center">
			<div class="max-w-sm m-8">
				<div class="text-5xl md:text-15xl text-gray-800 border-primary border-b">404</div>
				<div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>
				<?php
				if ($avatar) echo '<figure><img src="' . esc_url($avatar) . '" /></figure>';
				?>
				<p class="text-gray-800 text-2xl md:text-3xl font-light mb-8"><?php _e('Parece que estas buscando algo que no existe.', 'ludik'); ?></p>
				<a href="<?php echo get_bloginfo('url'); ?>" class="bg-primary px-4 py-2 rounded text-white">
					<?php _e('Ir a la portada', 'ludik'); ?>
				</a>
			</div>
		</div>
	</div>
</body>

</html>