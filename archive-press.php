<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main">
        
            
            <div id="taxonomy_page">
                <?php if ( have_posts() ) : ?>
                    <?php $thisTerm = get_queried_object();
                    //echo var_dump($thisTerm); ?>
                    <?php 
                        if(!empty(get_field('image', $thisTerm))) {
                            $backgroundImg =  get_field('image', $thisTerm); 
                        } else {
                            $backgroundImg = get_field('all_press_image', 'option');
                        }
                    ?>
                    <header class="page-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg['url']; ?>') no-repeat center center; background-size: cover;">
                        <?php $title =  "All " . $thisTerm ->name; ?>

                        <h1 class="page-title cat-title">
                            <?php echo $title; ?>
                        </h1>
                    </header><!-- .page-header -->
                   
                    <?php smash_under_header_block(['header' => $title, 'text' => get_queried_object()->description]) ?>
                    
                <?php endif;?>

                <!-- FUNCTION FOR PRESS LOOPS STARTS HERE -->
                <section class="custom-post-holder container-lg">
                <?php //YEAR CATEGORY/TAX MENU
                        $terms = get_terms( array(
                            'taxonomy' => 'year_published',
                            'hide_empty' => false,
                        ) );
                        //taxonomy menu that should appear under header bar
                        if($terms) { ?>
                            <div class="cat-nav flex-wrap align-end justify-center container-lrg">
                                <!-- <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item">All</a> -->

                                <?php foreach($terms as $term){
                                    if($term->term_id == get_queried_object()->term_id ) {
                                        echo '<a class="cat-nav-item active" href="'.esc_url(get_category_link($term->term_id)).'">'.$term->name.'</a>';
                                    } else{
                                    echo '<a class="cat-nav-item" href="'.esc_url(get_category_link($term->term_id)).'">'.$term->name.'</a>';
                                    }
                                } ?>
                            </div>
                        <?php }

                    press_list('press', 1.45, 16, true); ?>

                    <?php 
                    function press_list($press_type, $aspect_ratio, $ppp, $more = false) {
                        
                        echo '<div class="blog-holder '. $press_type.'-holder" >';
                            while(have_posts()) : the_post(); ?>
                                <?php $p = get_post(get_the_ID());

                                if($press_type == get_post_type($p) ) {

                                    if($p){ ?>
                                        <div class="blog-card">
                                            <div class="blog-card-inner">
                                                    <?php $link = get_field('link_url');
                                                    
                                                    if(!empty(get_field('link_url'))) {
                                                            $link = get_field('link_url');
                                                    } else {
                                                        $link = get_field('video_link');
                                                    }
                                                    ?>
                                                <a href="<?php echo $link ?>">
                                                    
                                                    <div class="blog-card-bgr-pic" data-bgratio="<?php echo $aspect_ratio;?>" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center; background-size: cover;">
                                                        <div class="blog-card-shade">
                                                        </div>
                                                    </div>
                                                </a>      
                                            </div><!-- blog-card-inner ends here --> 
                                            <h5><?php the_title() ?></h5>
                                        </div><!-- blog-card ends here -->
                                    <?php }
                                } 

                            endwhile; wp_reset_postdata();
                            
                        echo '</div>'; ?>

                        <?php if($more){  
                            echo do_shortcode('[ajax_load_more container_type="div" repeater="template_4" css_classes="'.$press_type.'-holder" post_type="'.$press_type.'" posts_per_page="'.$ppp.'" offset="'.$ppp.'" pause="true" scroll="false" button_label="Load More"]'); 
                        } ?>

                    <?php } ?>
                    
                </section>
                    
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

