<?php

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_back_to_top_script', get_template_directory_uri() . '/smash/modules/block_back_to_top/block_back_to_top.js', array(), '1', true );
} );

/*****************
*
* back_to_top SHORTCODE
*
*****************/
add_shortcode( 'back_to_top', function ( $atts, $content = null ) {
    return '<div class="footer-right">
                <a id="back_to_top" class="flex align-center justify-center" href="#">
                    <svg class="icon"><use xlink:href="#up-angle" /></svg>
                </a>
            </div>';
});