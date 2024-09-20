<?php
get_header(); // Include the header template part
?>

<main id="main" class="site-archive">

    <?php
    // Get the current queried object
    $queried_object = get_queried_object();

    // Initialize the arguments for WP_Query
    $args = array(
        'post_type' => 'any', // Query all post types
        'posts_per_page' => 10, // Change this to your desired number
    );

    // Check if we are in a category or tag archive
    if (is_category()) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $queried_object->term_id,
            ),
        );
        $header_title = esc_html($queried_object->name);
    } elseif (is_tag()) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'term_id',
                'terms'    => $queried_object->term_id,
            ),
        );
        $header_title = esc_html($queried_object->name);
    } else {
        // If neither, just display a default title
        $header_title = __('Archives', 'textdomain');
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <header class="header">
            <div class="header-inner content lg:py-lg bg-gray2 shadow">
                <h1><?php echo $header_title; ?></h1>
                <?php the_archive_description('<p class="archive-description">', '</small>'); ?>
            </div>
        </header><!-- .page-header -->

        <?php
        // Start the loop
        echo '<div class="content shadow bg-secondary">';
        while ($query->have_posts()) :
            $query->the_post();
            $resume = get_field('resume') ? get_field('resume') : '';
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('flex gap-sm mb-xl block'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="post-thumbnail" style="width: 100px;">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); // Display the thumbnail in medium size 
                            ?>
                        </a>
                    </figure>
                <?php endif; ?>
                <div class="w-full">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <small class="text-gray5"><?php echo $resume; ?></small>
                </div>


            </article>
    <?php
        endwhile;
        echo '</div>';

        // Pagination
        the_posts_pagination(array(
            'prev_text' => __('Previous', 'textdomain'),
            'next_text' => __('Next', 'textdomain'),
        ));

    else :
        get_template_part('template-parts/content', 'none'); // No posts found template

    endif;

    // Reset post data
    wp_reset_postdata();
    ?>

</main><!-- #main -->

<?php
get_footer(); // Include the footer template part
?>