<?php 
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_featured_posts_script', get_template_directory_uri() . '/smash/modules/slider_featured_posts/slider_featured_posts.js', array(), '1', true );
} );

function smash_slider_featured_posts() {
    $posts = get_field('featured_posts_slider','option'); ?>
    <?php if ( $posts ): ?>
        <section id="featured_posts_slider">
            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                <a class="featured-post-slide" href="<?php echo get_the_permalink($post); ?>" style="background: url(<?php echo get_the_post_thumbnail_url($post); ?>) no-repeat center/cover;">
                    <div class="featured-post-inner flex align-center justify-center">
                        <h3 class="featured-post-title"><?php echo get_the_title($post); ?></h3>
                    </div>
                </a>
            <?php endforeach; wp_reset_postdata(); ?>
        </section>
    <?php endif;
}