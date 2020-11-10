<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_nina_magon_script', get_template_directory_uri() . '/smash/modules/nav_nina_magon/nav_nina_magon.js', array(), '1', true );
} );

function smash_nav_nina_magon() {
    ?>
    <section class="nina-header main-navigation header-block header-middle flex align-center justify-center"><h1>HTML & PHP For Nina Nav Here</h1></section>
    <?php
}