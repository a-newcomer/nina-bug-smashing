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
        
            <?php if ( have_posts() ) : ?>
            
                <section id="archive_page">
                    <?php $current_cat = get_queried_object(); ?>
                
                    <?php $backgroundImg =  get_field('image', $current_cat); ?>
                    <header class="page-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg['url']; ?>') no-repeat center center; background-size: cover;">

                        <?php the_archive_title( '<h1 class="page-title cat-title">', '</h1>' ); ?>		
                    </header><!-- .page-header -->

                    <?php smash_under_header_block(['header' => $current_cat->name, 'text' => get_the_archive_description()]) ?> 

                    <div class="archive-bg">

                        <div class="archive-items container-lg">
                            <div class="blog-card-holder">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <div class="blog-card rising-card"> 
                                        <a class="blog-card-image-wrapper" href="<?php the_permalink(); ?>">
                                            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($current_cat->ID), 'full' ); ?>
                                            <div class="blog-card-bgr-pic" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                                                <div class="blog-card-shade"></div>
                                            </div>
                                        </a>
                                        <?php $cats = get_the_category(); ?>
                                        <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="post-cats"><?php echo $cats[0]->name; ?></a>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <?php the_excerpt(); ?>
                                    </div><!-- end blog-card-->
                                <?php endwhile; ?>
                            </div>
                        </div>
                        
                        <!-- Load More -->
                        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="archive-items container-lg" post_type="post" category="'.$current_cat->slug.'" posts_per_page="8" offset="8" pause="true" scroll="false" button_label="Load More"]'); ?>

                    </div>
                </section>

            <?php endif;?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

