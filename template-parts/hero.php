<?php
$index = is_home() ? get_option('page_for_posts') : get_the_ID();
$type = is_home() ? 'home' : get_post_type();

$pretitle = get_field('pretitle', $index) ?: '';
$title = get_field('title', $index) ?: get_the_title($index);
$resume = get_field('resume', $index) ?: '';
$content = get_post_field('post_content', $index);
$image = get_field('image', $index);

// Use post thumbnail if available, otherwise fall back to 'background' option field.
$background_image = get_the_post_thumbnail_url($index, 'full') ?: get_field('background', 'option');
?>


<?php if (is_front_page()) : ?>

    <header class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
        <div class="hero-header flex-col">
            <?php if ($pretitle) echo '<pre class="text-gray9">' . $pretitle . '</pre>'; ?>
            <h2><?php echo $title; ?></h2>
            <?php echo $resume; ?>
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

            <header class="header overflow-hidden" style="background-image: url('<?php echo esc_url($background_image); ?>');">
                <div class="header-inner ">
                    <figure class="w-full h-full bg-gray6 absolute animate-fade"></figure>
                    <div class="z-20 flex flex-col items-baseline justify-center animate-fade-up">
                        <?php if ($image):
                            echo '<figure class="mx-auto"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" /></figure>';
                        else:
                            echo '<div class="p-lg lg:p-xxxxl">';
                            ludik_time($pretitle);
                            // echo '<pre>' . $pretitle . '</pre>';
                            echo '<h1>' . $title . '</h1>';
                            echo '</div>';
                        endif;
                        ?>
                    </div>
                    <div class="p-lg lg:pr-xxxxl z-20 animate-fade-up">
                        <?php if ($image) echo '<pre>' . $pretitle . '</pre>'; ?>
                        <?php if ($image) echo '<h1>' . $title . '</h1>'; ?>
                        <div><?php echo $resume; ?></div>
                    </div>
            </header>
    <?php } ?>



<?php endif; ?>