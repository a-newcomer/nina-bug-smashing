<?php

//this function creates a double post category loop meant to be used OUTSIDE the regular loop that always has the featured posts first. Multiple instances can be stacked on one page. Because of this option the parameters include 2 parameter names that can be anything, but each one must be different on the page, and the must be in the form '$param'. It also takes the category id and the number of posts you want after the featured. On this website, the featured category is 35 - on another website it may not be.

function featured_first_loop( $feat_cat, $cat_alone, $cats_in, $posts_per_page) {
    ?>
    <div class="blog-card-holder">

    <?php
    $args = array(
        'post_type'     => 'post',
        'category__and' => array(35, $cats_in),
        'posts_per_page' => 1);

    $feat_cat = new WP_Query($args);
    if ($feat_cat->have_posts()) : while ($feat_cat->have_posts()) : $feat_cat->the_post(); ?>

    <div class="blog-card">
        <a href="<?php the_permalink(); ?>">
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($feat_cat->ID), 'full' ); ?>
        <div class="blog-card-bgr-pic" style="background: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
            <div class="blog-card-shade">
            </div>
        </div>
        <?php the_category(); ?>
        <h5><?php the_title(); ?></h5>
        <?php the_excerpt(); ?>
        </a>
    </div><!-- end blog-card-->

    <?php endwhile; endif; ?>
    
    <!-- // rewind -->
    <?php $feat_cat->rewind_posts(); ?>
    
    <!-- // new loop -->
    <?php $args = array(
        'post_type'     => 'post',
        'cat'  => $cats_in,
        'category__not_in'    => 35,
        'posts_per_page' => $posts_per_page,
        'operator' => 'OR'
    );
    $cat_alone = new WP_Query($args);
    while ($cat_alone->have_posts()) : $cat_alone->the_post(); ?>

    <div class="blog-card">
        <a href="<?php the_permalink(); ?>">
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($feat_cat->ID), 'full' ); ?>
            <div class="blog-card-bgr-pic" style="background: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                <div class="blog-card-shade">
                </div>
            </div> 
            <?php the_category(); ?>
            <h5><?php the_title(); ?></h5>
            <?php the_excerpt(); ?>
        </a>
    </div><!-- end blog-card-->
    </div>
    <?php endwhile; 
}
wp_reset_postdata();

