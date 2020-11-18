<?php
/**
 * Template name: Blog
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

        <?php if ( have_posts() ) : $pageID = get_option( 'page_for_posts' );  ?>
        
            <div id="archive_page">

                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <header class="page-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                    <!-- <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?> -->

                    <?php $title = get_the_title( get_option('page_for_posts', true) ); ?>
                    <h1 class="page-title cat-title"><?php echo $title ?></h1>
                </header><!-- .page-header -->

                <?php smash_under_header_block(['header' => get_field('headline_under_top_image', $pageID), 'text' => get_field('text_under_header_image', $pageID)]) ?> 

                <section class="archive-bg blog-archive">
                    
                    <!-- Loop through selected categories to get banner and posts -->
                    <?php if ( get_field('categories', $pageID) ) : $cats = get_field('categories', $pageID); ?>
                        <?php foreach($cats as $cat) { ?>

                            <div class="blog-card-holder container-lg">

                                <div class="blog-card cat-card"> 
                                    <a href='<?php echo esc_url( get_category_link( $cat->term_id ) ) ?>'> 
                                        <?php if(get_field('image', $cat)){ $image = get_field('image', $cat); ?>
                                            <div class="blog-card-bgr-pic" data-bgratio=".35" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center; background-size: cover;">
                                                <div class="blog-card-shade">
                                                <h3><?php echo $cat->name ?></h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </a>
                                </div>
                            
                                <?php 
                                $a = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 5,
                                    'cat' => $cat->term_id
                                ];
                                $lp = new WP_Query($a);
                                ?>

                                <?php if($lp->have_posts()) : ?>
                                    <?php while($lp->have_posts()) : $lp->the_post(); ?>
                                        <div class="rising-card blog-card cat-card"> 
                                            <a href="<?php the_permalink(); ?>">
                                                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                                <div class="blog-card-bgr-pic" style="background: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                                                    <div class="blog-card-shade">
                                                    </div>
                                                </div> 
                                                <?php the_category(); ?>
                                                <h5><?php the_title(); ?></h5>
                                                <?php the_excerpt(); ?>
                                            </a>
                                        </div><!--end of blog-card for normal cat loop -->
                                    <?php endwhile; ?>
                                <?php endif; wp_reset_query(); ?>
                            </div>

                        <?php } ?>
            
                    <?php endif; ?>
                </section><!-- end of archive-bg? -->
            </div>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->    
        
<?php
get_footer();
