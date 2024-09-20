<?php
$title = get_field('title') ? get_field('title') : get_the_title();
$resume = get_field('resume') ? get_field('resume') : '';
$img_size = 'thumbnail';
$post_url = get_permalink();
if (get_post_type() == 'work') $img_size = 'medium';
$avatar = get_field('background', 'option');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<a href="<?php echo esc_url($post_url); ?>">

		<header class="card-header">
			<figure>
				<?php
				$post_url = get_permalink();
				if (has_post_thumbnail()) :
					the_post_thumbnail($img_size, array('class' => 'entry-thumbnail'));
				else:
					echo '<img src="' . $avatar . '" alt="' . get_the_title() . '" />';
				endif;
				?>
			</figure>
		</header>

		<div class="card-content">
			<?php ludik_time(); ?>
			<?php //the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); 
			?>
			<?php echo '<h2>' . $title . '</h2>'; ?>
			<?php echo '<div class="card-resume">' . $resume . '</div>'; ?>
		</div>

	</a>

</article>