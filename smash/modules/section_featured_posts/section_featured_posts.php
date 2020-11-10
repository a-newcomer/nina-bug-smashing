<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_featured_posts_script', get_template_directory_uri() . '/smash/modules/section_featured_posts/section_featured_posts.js', array(), '1', true );
} );

function smash_section_featured_posts($posts = null) {
    if(is_singular('post')) {

        ?>
        <section id="featured_post">
                <div class="featured-posts-header flex align-center justify-between">
                    <span>Keep Reading</span>
                    <div class="bar"></div>
                    <span>get inspired</span>
                </div>
                <div class="featured-posts-slider container-lg">
        <?php

		global $post;
		$current_post = $post; // remember the current post
		
		for($i = 1; $i <= 10; $i++) :
            $post = get_previous_post(); // this uses $post->ID
            $include = true;
            
            if($post){
                $c = get_the_category($post->ID);
                $e = get_field('exclude_categories','option');
                foreach ($c as $c){
                    if(in_array($c->term_id, $e)) {
                        $include = false;
                    }
                }
            }

            setup_postdata($post); 
            if($post && $include){
                $cats = get_the_category($post->ID);
            ?>
                        <div class="featured-post-wrap">
                            <div class="featured-post flex align-end" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'medium'); ?>) no-repeat center/cover;">
                                <div class="featured-post-content flex-col align-center justify-start">
                                    <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="featured-post-cat"><?php echo $cats[0]->name; ?></a>
                                    <a href="<?php the_permalink(); ?>" class="featured-post-title"><?php the_title(); ?></a>
                                    <div class="featured-post-excerpt">
                                        <?php
                                        $excerpt = get_the_excerpt();
                                        echo wp_trim_words($excerpt, 15);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php 
            }
        endfor; ?>
            </div>
        </section>
        <?php
	} else {
        $posts = ($posts) ? $posts : get_field('featured_posts','option');

        if($posts) :
        ?>
            <section id="featured_post">
                <div class="featured-posts-header flex align-center justify-between">
                    <span>Trending Now</span>
                    <div class="bar"></div>
                    <span>get inspired</span>
                </div>
                <div class="featured-posts-slider container-lg">
                    <?php foreach ( $posts as $p ) : 
                    $cats = get_the_category($p->ID);
                    ?>
                        <div class="featured-post-wrap">
                            <div class="featured-post flex align-end" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'medium'); ?>) no-repeat center/cover;">
                                <div class="featured-post-content flex-col align-center justify-start">
                                    <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="featured-post-cat"><?php echo $cats[0]->name; ?></a>
                                    <a href="<?php echo get_the_permalink($p->ID); ?>" class="featured-post-title"><?php echo get_the_title($p->ID); ?></a>
                                    <div class="featured-post-excerpt">
                                        <?php
                                        $excerpt = get_the_excerpt($p->ID); 
                                        echo wp_trim_words($excerpt, 15);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif;
    }
}