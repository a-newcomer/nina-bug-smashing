<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'gsap_script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), '1', true );
    wp_enqueue_script( 'scrollToPlugin',  'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollToPlugin.min.js', array(), '1', true );
    wp_enqueue_script( 'block_dot_nav_script', get_template_directory_uri() . '/smash/modules/block_dot_nav/block_dot_nav.js', array('gsap_script', 'scrollToPlugin'), '1', true );
} );

function smash_dot_nav() { ?>
    <ul class="nav-dots flex-col flex-center">
        <!-- when active will have to add far fa-dot-circle class or better yet, look into using an svg image around the dot that fades in -->
        <li class="dot-item">
            <a class="smash-dot"  href="#nmsc-section-1">&#11044;</a>
        </li>
        <li class="dot-item">
            <a class="smash-dot" href="#nmsc-section-2">&#11044;</a>
        </li>
        <li class="dot-item">
            <a class="smash-dot" href="#nmsc-section-3">&#11044;</a>
        </li>
    </ul>


<?php }