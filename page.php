<?php get_header(); ?>
<?php if (!is_front_page()) : ?>
    <main class="container">
        <?php get_template_part('template-parts/content', get_post_format()); ?>
    </main>
<?php endif; ?>

<?php
get_footer();
