<?php
$shortcode = get_field('shortcode', 'option');
$link = get_field('cta', 'option');
$title = get_field('title', 'option');
$cta = array();
if ($link) {
    $url = esc_url($link['url']);
    $cta = esc_html($link['title']);
    $target = esc_attr($link['target']) ? esc_attr($link['target']) : '_self';
    $cta = '<a href="' . $url . '" target="' . $target . '" class="btn mx-auto my-10">' . $cta . '</a>';
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

        <header class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
            <div class="hero-header">
                <h2><?php the_title(); ?></h2>
            </div>
            <article class="hero-content">
                <?php echo apply_filters('the_content', $content); ?>
            </article>
        </header>



        <?php if ($shortcode): ?>
            <section class="gallery">
                <!-- Gallery -->
                <h3 class="text-center p-xl lg:pt-xxxxl"><?php echo $title ?></h3>
                <?php echo do_shortcode($shortcode); ?>
                <?php echo $cta; ?>

            </section>
        <?php endif; ?>

    </main>
<?php else: ?>


    <main class=" container mx-auto">
        <!-- <header class="hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
            <h1><?php the_title(); ?></h1>
        </header> -->

        <section>
            <?php get_template_part('template-parts/content', get_post_format()); ?>
        </section>

    </main>

<?php endif; ?>

<?php
get_footer();
