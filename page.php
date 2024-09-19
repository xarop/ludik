<?php
$shortcode = get_field('shortcode', 'option');
$link = get_field('cta', 'option');
$title = get_field('title', 'option');
$cta = array();
if ($link) {
    $url = esc_url($link['url']);
    $cta = esc_html($link['title']);
    $target = esc_attr($link['target']) ? esc_attr($link['target']) : '_self';
    $cta = '<a href="' . $url . '" target="' . $target . '" class="btn mx-auto">' . $cta . '</a>';
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

<?php get_header(); ?>

<?php if (is_front_page()) : ?>

    <main>

        <?php get_template_part('template-parts/hero'); ?>

        <?php if ($shortcode): ?>
            <section class="gallery">
                <!-- Gallery -->
                <div class="lg:py-xxxxl p-md">

                    <h3 class="text-center"><?php echo $title ?></h3>
                    <?php echo do_shortcode($shortcode); ?>
                    <?php echo $cta; ?>

                </div>

            </section>
        <?php endif; ?>

    </main>
<?php else: ?>


    <main>
        <?php get_template_part('template-parts/content-single'); ?>
    </main>

<?php endif; ?>

<?php
get_footer();
