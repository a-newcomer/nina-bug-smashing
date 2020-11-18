<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nina_Magon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('project-page'); ?>>

                <?php smash_block_hero(['post' => $post]) ?>
                <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>

                <div class="entry-content">

                    <!-- Content goes here -->
                    <?php smash_slider_gallery(['images' => get_field('gallery')]); ?>

                </div><!-- .entry-content -->

            
                <div class="nina-cta flex-col container-lg flex-center header-block" id="nmsc-centered-cta">
                    <a class="ninaModal-trigger flex-row" data-modal="ninaModal-name" href="#">
                        <h5><?php  if(get_field('bottom_cta_text')) : the_field('bottom_cta_text'); endif; ?> </h5>
                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                    </a>
                    <!-- <a href="#" class="ninaModal-trigger" data-modal="ninaModal-name">Modal open!</a> Trigger Modal. -->
                </div> <!-- end cta-->
               

                <!-- Modal -->
                <div class="ninaModal" id="ninaModal-name">
                <div class="ninaModal-sandbox"></div>
                <div class="ninaModal-box">
                    <div class="ninaModal-header">
                    <div class="close-ninaModal">&#10006;</div> 
                    <h2><?php  if(get_field('project_detail_title')) : the_field('project_detail_title'); endif; ?></h2>
                    </div>
                    <div class="ninaModal-body">
                    <?php  if(get_field('project_details')) : the_field('project_details'); endif; ?>
                    <br />
                    <button class="close-ninaModal nina-btn"><?php  if(get_field('close_button_text')) : the_field('close_button_text'); endif; ?></button>
                    </div>
                </div>
                </div>
                <!-- End Modal -->

            </article><!-- #post-<?php //the_ID(); ?> -->
            
		
		<?php endwhile; ?>

		</main><!-- #main -->
    </div><!-- #primary -->
   
<?php
get_footer();
