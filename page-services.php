<?php
/**
 * Template name: Design Services
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
<article id="post-<?php the_ID(); ?>" <?php post_class('design-services'); ?>>
	<!-- The bg-position of the below header image has been changed in the SCSS to resemble the design - remove if you want to edit photo. -->
    <?php smash_block_hero(['post' => $post]) ?>

    <!-- now add the block of text under the header-->
    <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
    <main>
           
        <!-- this is actually the video block - name needs to be updated, and SCSS adjusted -->
        <div id="about_page">
            <?php get_template_part( 'template-parts/content', 'page-about' ); ?>
        </div>

        <section class="services-container flex-col">

            <?php

            // check if the repeater field has rows of data
            if( have_rows('services') ):

                // loop through the rows of data
                while ( have_rows('services') ) : the_row();
                //echo var_dump(get_sub_field('image'));
                    // display a sub field value ?>
                    <div class="service-block flex-row">
                    <?php if(get_sub_field('image')) : $image = get_sub_field('image'); endif; ?>
                    <div class="img-box" data-bgratio=".75" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                    </div>
                        <?php //the_sub_field('image'); ?>
                        <div class="text-box flex-col flex-center">
                        <?php if(get_sub_field('header')) : $header = get_sub_field('header'); endif; ?>
                            <h4><?php echo $header; ?></h4>
                        <?php if(get_sub_field('text')) : $text = get_sub_field('text'); endif; ?>
                            <p><?php echo $text; ?></p>
                        </div>
                    </div>
                    <?php 
                    
                endwhile;

            else :

                // no rows found

            endif;

            ?>

            <!-- <div class="service-block flex-row">
                <div class="img-box" data-bgratio=".75" style="background: url(<?php //echo $image['sizes']['large']; ?> http://magon.test/wp-content/uploads/2020/10/4954_190206_Contour-1.jpg) no-repeat center/cover;">
                </div>
                
                <div class="text-box flex-col flex-center">
                    <h4>Sample</h4>
                    <p>adipiscing elit. Proin amet risus turpis a. Suspendisse id auctor sed neque odio amet purus sit. Arcu, in consectetur viverra nisl tincidunt dolor, viverra. Metus ac platea porttitor molestie pellentesque orci laoreet suspendisse.</p>
                </div>
            </div>End service-block -->


        </section><!-- End services-container -->

            
    </main>
        

</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php
get_footer();
