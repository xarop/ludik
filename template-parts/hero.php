<?php
if (get_post_type() == 'page') $index = get_the_ID();
else  $index = get_option('page_for_posts');

$pretitle = get_field('pretitle', $index);
$title = get_field('title', $index);
$resume = get_field('resume', $index);
$content = get_the_content();
$image = get_field('image', $index);
$image = get_field('image', $index);

$background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<?php if (is_front_page()) : ?>

    <header class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="hero-header">
            <h2><?php the_title(); ?></h2>
        </div>
        <article class="hero-content">
            <div class="max-w-screen-md mx-auto text-center">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
        </article>
    </header>

<?php else: ?>

    <header class="bg-cover bg-center relative" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="grid lg:grid-cols-2 w-full items-center justify-center ">
            <figure class="w-full h-full bg-gray6 absolute"></figure>
            <div class="z-20 flex flex-col items-baseline justify-center">
                <?php if ($image):
                    echo '<figure class="mx-auto"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" /></figure>';
                else:

                    echo '<div class="p-lg lg:p-xxxxl">';
                    echo '<pre>' . $pretitle . '</pre>';
                    echo '<h1>' . $title . '</h1>';
                    echo '</div>';
                endif;
                ?>
            </div>
            <div class="p-lg lg:p-xxxxl z-20">
                <?php if ($image) echo '<pre>' . $pretitle . '</pre>'; ?>
                <?php if ($image) echo '<h1>' . $title . '</h1>'; ?>
                <div class="text-gray"><?php echo $resume; ?></div>
            </div>
    </header>

<?php endif; ?>