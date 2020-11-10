<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_trend_report_script', get_template_directory_uri() . '/smash/modules/section_trend_report/section_trend_report.js', array(), '1', true );
} );

function smash_section_trend_report($args = null) {
    $posts = (!empty($args['posts'])) ? $args['posts'] : null;

    if($posts) {
        $lp = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => count($posts),
            'post__in' => $posts
        ]);

        if($lp->have_posts()) : while($lp->have_posts()) : $lp->the_post(); 
        
        $cats = (is_archive()) ? get_queried_object() : get_the_category();
        $cat = (!is_archive()) ? $cats[0] : $cats;
        ?>
            <section class="trend_report">
                <div class="trend-report-container flex align-center justify-between">
                    <div class="trend-post-body">
                        <a href="<?php echo get_term_link($cat->term_id); ?>" class="trend-post-cat"><?php echo $cat->name; ?></a>
                        <h3 class="trend-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="trend-post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <?php if ( have_rows('products') ) : ?>
                        <div class="trend-post-products">
                            <?php while( have_rows('products') ) : the_row(); ?>
                                <div class="trend-post-product">
                                    <div class="product-index"><?php echo '#' . get_row_index(); ?></div>
                                    <div class="product-thumb-wrap flex align-center justify-center">
                                        <?php if ( get_sub_field('image') ) : $image = get_sub_field('image'); ?>
                                            <img class="product-thumb" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                        <?php endif; ?>
                                        <?php if( get_sub_field('link') ) : ?>
                                            <a href="<?php echo get_sub_field('link'); ?>" class="btn btn-primary">shop now</a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if( get_sub_field('text') ) : ?>
                                        <div class="product-text">
                                            <?php echo get_sub_field('text'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>   
            </section>
        <?php endwhile; endif; wp_reset_query(); wp_reset_postdata();
    }
}