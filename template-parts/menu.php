<?php
$social = get_field('social', 'option');
?>

<div class="lg:flex items-center justify-center">

    <?php
    wp_nav_menu(
        array(
            'container_id'    => 'primary-menu',
            'theme_location'  => 'primary',
        )
    );
    ?>

    <div class="z-50 flex relative">
        <?php if (have_rows('social', 'option')):  ?>
            <ul class="flex">
                <?php
                while (have_rows('social', 'option')): the_row();
                    $icon = get_sub_field('social');
                    $url = get_sub_field('url');
                ?>
                    <li class="menu-item menu-icon"><a class="icon icon-<?php echo esc_attr($icon); ?>" href="<?php echo esc_url($url); ?>" target="_blank" title="<?php echo esc_attr($icon); ?>"></a></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>


        <button aria-label="Toggle navigation" id="primary-menu-toggle" class="hamburger lg:hidden ml-4">
            <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                    <g id="icon-shape">
                        <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z"></path>
                        <path d="M0,9 L20,9 L20,11 L0,11 L0,9 Z"></path>
                        <path d="M0,15 L20,15 L20,17 L0,17 L0,15 Z"></path>
                    </g>
                </g>
            </svg>
        </button>
    </div>

</div>