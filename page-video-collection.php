<?php
/**
 * Template name: Video Collection
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
<article id="post-<?php the_ID(); ?>" <?php post_class('video-collection'); ?>>
	<!-- The bg-position of the below header image has been changed in the SCSS to resemble the design - remove if you want to edit photo. -->
    <?php smash_block_hero(['post' => $post]) ?>

    <!-- now add the block of text under the header-->
    <?php smash_under_header_block() ?>
    <main>
        <section class="box-container">

            <?php
            // check if the repeater field has rows of data
            if( have_rows('image_boxes') ):

                // loop through the rows of data
                while ( have_rows('image_boxes') ) : the_row();
                //echo var_dump(get_sub_field('image'));
                    // display a sub field value ?>
                    <div class="image-card flex-col">
                        
                        <a href="<?php the_sub_field('link') ?>" target="_blank" rel="noopener noreferrer" >
                        <?php if(get_sub_field('image')) : $image = get_sub_field('image'); endif; ?>
                            <div class="img-box" data-bgratio=".75" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                                <div class="shade">
                                    
                                </div><!-- end .shade -->
                            </div>
                            <div class="text-box flex-col justify-center align-center">
                                <?php if(get_sub_field('header')) : $header = get_sub_field('header'); endif; ?>
                                    <h3><?php echo $header; ?></h3>
                            </div><!-- end .text-box -->
                        </a>
                    </div><!-- end .image-card -->
                    <?php 
                    
                endwhile;

            else :

                // no rows found

            endif;

            ?>

        </section><!-- End services-container -->
    </main>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
get_footer();
