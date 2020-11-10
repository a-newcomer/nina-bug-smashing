<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_search_script', get_template_directory_uri() . '/smash/modules/block_search/block_search.js', array(), '1', true );
} );

function smash_block_search(){
    ?>
        <aside id="search-modal" class="modal">
            <div id="search-modal-box" class="modal-box">
                <div id="search-close">
                    <svg class="icon"><use xlink:href="#close" /></svg>
                </div>
                <div id="search-modal-inner" class="modal-inner">
                    <?php the_widget( 'WP_Widget_Search'); ?>
                </div>
            </div>
        </aside>
    <?php
}