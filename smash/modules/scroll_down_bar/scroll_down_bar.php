<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_back_to_top_script', get_template_directory_uri() . '/smash/modules/scroll_down_bar/scroll_down_bar.js', array(), '1', true );
} );

//<!-- this is the little line that appears at the bottom of the header section in place of a scroll down arrow -->

function smash_scroll_down_bar() {
    ?>
    <div class="bar-outer">
        <div id="bar">

        </div>
    </div>


    <?php
}