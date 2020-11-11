<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_hero_image_script', get_template_directory_uri() . '/smash/modules/block_hero_image/block_hero_image.js', array(), '1', true );
} );

function smash_block_hero($args = null)
{
    $post = (!empty($args['post'])) ? $args['post'] : null;
    $backgroundImg = (get_post_thumbnail_id($post->ID)) ? wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ) : null; ?>

    <header class="entry-header hero-img"  id="nmsc-section-1">
        <section class="hero-img-inner" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url(<?php echo $backgroundImg[0]; ?>) no-repeat center/cover;"></section>
        <?php if (is_single()) { ?>
            <div class="hero-content entry-header-inner">
                <?php $cats = get_the_category(); 
                if($cats) { ?>
                    <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="entry-cat"><?php echo $cats[0]->name; ?></a>
                <?php } ?>
                <div class="dot-sep"></div>
                <div class="entry-date"><?php echo get_the_date(); ?></div>
            </div>
        <?php } ?>
        <?php the_title( '<h1 class="hero-content entry-title">', '</h1>' ); ?>
        <div id="fade_title"></div>
            <?php smash_scroll_down_bar() ?>
    </header><!-- .entry-header -->
    
    <?php
}