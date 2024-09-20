<?php
$index = get_the_ID();
$type = get_post_type();

$pretitle = get_field('pretitle', $index) ? get_field('pretitle', $index) : '';
$title = get_field('title', $index) ? get_field('title', $index) : get_the_title($index);
$resume = get_field('resume', $index) ? get_field('resume', $index) : '';
$content = get_post_field('post_content', $index);
$image = get_field('image', $index);

$background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<?php if (is_front_page()) : ?>

    <header class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="hero-header">
            <h2><?php echo $title; ?></h2>
        </div>
        <article class="hero-content">
            <div class="max-w-screen-md mx-auto text-center">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
        </article>
    </header>

<?php else: ?>

    <?php switch ($type) {
        case 'post':
        case 'work':
            echo '<header class="post-header">';
            if ($background_image) echo '<figure><img src="' . esc_url($background_image) . '" alt="' . esc_attr($title) . '" /></figure>';
            echo '<div class="p-xl">';
            if ($pretitle) echo '<pre>' . $pretitle . '</pre>';
            else ludik_time();
            // the_title('<h1>', '</h1>');
            echo '<h1 class="mb-lg mt-sm leading-none">' . $title . '</h1>';
            echo '<div class="text-large text-gray5">' . $resume . '</div>';
            echo '</div>';
            echo '</header>';
            break;
        default:
    ?>

            <header class="header" style="background-image: url('<?php echo esc_url($background_image); ?>');">
                <div class="header-inner">
                    <figure class="w-full h-full bg-gray6 absolute"></figure>
                    <div class="z-20 flex flex-col items-baseline justify-center">
                        <?php if ($image):
                            echo '<figure class="mx-auto"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" /></figure>';
                        else:
                            echo '<div class="p-lg lg:p-xxxxl">';
                            ludik_time();
                            echo '<pre>' . $pretitle . '</pre>';
                            echo '<h1>' . $title . '</h1>';
                            echo '</div>';
                        endif;
                        ?>
                    </div>
                    <div class="p-lg lg:pr-xxxxl z-20">
                        <?php if ($image) echo '<pre>' . $pretitle . '</pre>'; ?>
                        <?php if ($image) echo '<h1>' . $title . '</h1>'; ?>
                        <div><?php echo $resume; ?></div>
                    </div>
            </header>
    <?php } ?>



<?php endif; ?>