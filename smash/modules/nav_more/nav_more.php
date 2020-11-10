<?php

function smash_nav_more($args = null){
    $title = ($args['title']) ? $args['title'] : 'Explore the Blog';
    ?>
        <section id="more_nav" class="flex align-center justify-center">
            <h4 class="more-nav-header"><?php echo $title; ?></h4>
            <?php
                wp_nav_menu( array(
                    'theme_location' 	=> 'category',
                    'menu_id'        	=> 'category_menu',
                    'menu_class'        => 'category-menu',
                    'container_id'	    => 'category_menu_container',
                    'container_class'	=> 'category-menu-container flex align-center justify-start',
                ) );
            ?>
        </section>
    <?php
}