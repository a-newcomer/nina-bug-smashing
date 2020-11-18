<?php
/**
 * Template name: All Press
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
        <?php 
    $lp = new WP_Query([
        'post_type' => 'video_press',
        'posts_per_page' => 6
    ]);


       if ( have_posts() ) : ?>
        
            <section id="all-press-page">

                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
                <header class="page-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                        <h1 class="page-title cat-title"><?php the_title() ?></h1>
                </header><!-- .page-header -->
               
                <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
            
                <!-- Parameters for the function - 2 differing cat slugs, which need to look like this '$slug', then the category id #, then the # of posts you want per page -->
         
            
                <!-- year category menu -->
                <?php          
                    $terms = get_terms( array(
                        'taxonomy' => 'year_published',
                        'hide_empty' => false,
                    ) );
                   // echo var_dump($terms);


                    if($terms){ ?>
                    <div class="cat-nav container-lrg flex-wrap align-end justify-center">
                       
                        <!-- <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item cat-nav-current">All</a> -->
                        
                        <?php foreach($terms as $term){
                            echo '<a class="cat-nav-item" href="'.get_category_link($term->term_id).'">'.$term->name.'</a>';
                        } ?>
                    </div>
                    <?php } ?>

                <div class="archive-bg blog-archive all-press-archive">
                
                    <div class="">

                        <h3>start custom video query here</h3>
              
                        <?php wp_reset_query();

                        foreach($terms as $term) {
                            $args = array(
                                'post_type' => 'video_press',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'year_published',
                                        'field' => 'slug',
                                        'terms' => $term->ID
                                    )
                                )
                            );

                            $video_year_loop = new WP_Query( $args );

                        }
                
                        if($video_year_loop->have_posts()) : ?>

                                <div class="product-grid flex-wrap align-start justify-center">
                                    <?php while($video_year_loop->have_posts()) : $video_year_loop->the_post(); ?>
                                        <?php $p = get_post(get_the_ID());
                                        if($p){
                                            //video cover and link to external site

                                            // smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                                        } 
                                        ?>
                                    <?php endwhile; ?>
                                </div>
                                
                        <?php endif; wp_reset_query(); ?>
                    </div>
                <div><!-- end of archive-bg? -->
                <?php //wp_reset_postdata(); ?>
        </section>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->    
        
<?php
get_footer();
