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
        
            
            <section id="taxonomy_page">
                <?php if ( have_posts() ) : ?>
                    <?php $thisTerm = get_queried_object(); ?>
                    <?php 
                        if(!empty(get_field('image', $thisTerm))) {
                            $backgroundImg =  get_field('image', $thisTerm); 
                        } else {
                            $backgroundImg = get_field('all_press_image', 'option');
                        }
                    ?>
                    <header class="page-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg['url']; ?>') no-repeat center center; background-size: cover;">
                        <?php 
                        $title = "Press Page";
                        $pt = get_query_var('post_type');
                        if( $pt == 'video_press') {
                                $title =  "Video " . $thisTerm->name;
                        } elseif($pt != '') {
                            $title = $pt ." ". $thisTerm->name;
                        } else {
                            $title = "Press Page";
                        } ?>

                        <h1 class="page-title cat-title">
                            <?php echo $title; ?>
                        </h1>
                        <?php smash_scroll_down_bar() ?>
                    </header><!-- .page-header -->
                   
                    <?php smash_under_header_block(['header' => $title, 'text' => get_queried_object()->description]) ?>
                    
                <?php endif;?>

                <!-- FUNCTION FOR PRESS LOOPS STARTS HERE -->
                <section class="custom-post-holder container-lg">
                    <?php 
                    if (isset($_GET['post_type']) ) {
                        $press_type = $_GET['post_type'];
                        
                        if ($press_type == 'video_press') { 
                            press_list('video_press', .65, 8, true);
                            
                        }elseif($press_type == 'press'){ 
                            press_list('press', 1.45, 16, true);
                        } else {
                            echo "<h5>something went wrong</h5>";
                        }
                    } else {
                        //move menu in here and everything
                        
                        //YEAR CATEGORY/TAX MENU
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
                        
                        echo '<h3>'. $thisTerm->slug .' Press</h3>';
                        press_list('press', 1.25, 16);

                        echo '<div class="nina-cta"><a class="flex-row justify-center align-center" href="/year_published/'.get_queried_object()->slug. '?post_type=press"><h5> See All From '.get_queried_object()->name.' </h5><svg class="icon"><use xlink:href="#right-arrow" /></svg></a></div>';
                        echo '<h3>'. $thisTerm->slug .' Videos</h3>';
                        press_list('video_press', .65, 4);
                        echo '<div class="nina-cta"><a class="flex-row justify-center align-center" href="/year_published/'.get_queried_object()->slug. '?post_type=video_press"><h5> See All From '.get_queried_object()->name.' </h5><svg class="icon"><use xlink:href="#right-arrow" /></svg></a></div>';
                    } ?>

                    <?php 
                    function press_list($press_type, $aspect_ratio, $ppp, $more = false) {
                        
                        echo '<div class="blog-holder '. $press_type.'-holder" >'; 
                            $pressQ = new WP_Query([
                                'post_type' => $press_type,
                                'posts_per_page' => $ppp,
                                'tax_query'  => array(
                                    array(
                                        'taxonomy' => 'year_published',
                                        'field'    => 'slug',
                                        'terms'    => array(get_queried_object()->slug)
                                    ),
                                ),
                            ]);

                            while($pressQ->have_posts()) : $pressQ->the_post(); ?>
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
                                                    
                                                    <div class="blog-card-bgr-pic" data-bgratio="<?php echo $aspect_ratio;?>" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/contain;">
                                                        <div class="blog-card-shade">
                                                            <?php  if( $press_type == 'video_press') {
                                                                echo '<img src="/app/themes/nina_magon/smash/images/circle-triangle-50x50.png" alt="video play symbol">';
                                                            }
                                                            
                                                            ?>
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
                            $repeater = ($press_type == 'press') ? 'template_3' : 'template_4';
                            echo do_shortcode('[ajax_load_more container_type="div" repeater="'.$repeater.'" css_classes="'.$press_type.'-holder" post_type="'.$press_type.'" taxonomy="year_published" taxonomy_terms="'.get_queried_object()->slug.'" taxonomy_operator="IN" posts_per_page="'.$ppp.'" offset="'.$ppp.'" pause="true" scroll="false" button_label="Load More"]'); 
                        } ?>

                    <?php } ?>
                    
                </section>
                    
            </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

