<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_recent_posts_script', get_template_directory_uri() . '/smash/modules/slider_recent_posts/slider_recent_posts.js', array(), '1', true );
} );

function smash_slider_recent_posts($args = ['post_type' => 'post', 'posts_per_page' => 5]){
    
    if(is_singular('post')) {
		global $post;
		$current_post = $post; // remember the current post
		
		for($i = 1; $i <= 5; $i++) :
			$post = get_previous_post(); // this uses $post->ID
			if($post && $i == 1) :
		?>

			<section id="recent_posts_slider">
                <div class="recent-posts-header flex align-center justify-between">
                    <div class="section-title recent-posts-title">You May Also Like</div>
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="view-more-link">
                        View More
                        <svg class="icon"><use xlink:href="#plus" /></svg>
                    </a>
                </div>
                <div class="recent-posts">

			<?php // SORT OF LIKE THE START OF A WHILE
			endif; 
			setup_postdata($post); 
			?>
						<div class="recent-post-slide">
                            <a href="<?php the_permalink(); ?>" class="recent-post-thumb" data-bgratio="1.2" style="background: url(<?php the_post_thumbnail_url('large'); ?>) no-repeat center/cover;"></a>
                            <div class="recent-post-body flex-col justify-between">
                                <a class="recent-post-title" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                                <div class="recent-post-actions flex align-center justify-between">
                                    <a href="<?php the_permalink(); ?>" class="recent-post-link">
                                        Read Post
                                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                                    </a>
                                    <div class="archive-item-share">
                                        <svg class="icon"><use xlink:href="#share" /></svg>
                                        <div id="share-<?php echo get_the_id(); ?>" class="social-share flex align-center justify-end">
                                            <input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
                                            <input class="url" type="hidden" value="<?php the_permalink(); ?>">
                                            <input class="title" type="hidden" value="<?php the_title(); ?>">
                                            <button class="share s_facebook btn-off"><i class="fab fa-facebook" aria-hidden="true"></i></button>
                                            <button class="share s_pinterest btn-off"><i class="fab fa-pinterest-p" aria-hidden="true"></i></button>
                                            <button class="share s_twitter btn-off"><i class="fab fa-twitter" aria-hidden="true"></i></button>
                                            <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="fas fa-envelope" aria-hidden="true"></i></a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
			<?php if($post && $i == 5) :  // SORT OF LIKE THE END OF A WHILE ?>
                </div>
            </section>
			<?php 
			endif;
		endfor;

    } else {

        $loop = new WP_Query($args);

        if($loop->have_posts()) : ?>
            <section id="recent_posts_slider">
                <div class="recent-posts-header flex align-center justify-between">
                    <div class="section-title recent-posts-title">From the Blog</div>
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="view-more-link">
                        View More
                        <svg class="icon"><use xlink:href="#plus" /></svg>
                    </a>
                </div>
                <div class="recent-posts">
                    <?php while($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="recent-post-slide">
                            <a href="<?php the_permalink(); ?>" class="recent-post-thumb" data-bgratio="1.2" style="background: url(<?php the_post_thumbnail_url('large'); ?>) no-repeat center/cover;"></a>
                            <div class="recent-post-body flex-col justify-between">
                                <a class="recent-post-title" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                                <div class="recent-post-actions flex align-center justify-between">
                                    <a href="<?php the_permalink(); ?>" class="recent-post-link">
                                        Read Post
                                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif;
        wp_reset_query();
        wp_reset_postdata();
    }
}