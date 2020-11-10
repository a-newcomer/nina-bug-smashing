<?php
/**
 * Template name: Our Process
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
<article id="post-<?php the_ID(); ?>" <?php post_class('process'); ?>>
	
    <?php smash_block_hero(['post' => $post]) ?>

    <!-- now add the block of text under the header-->
    <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
  
	<main id="process_page">
    <div class="slider" id="process-slider">
        <?php
        // check if the repeater field has rows of data
        if( have_rows('services') ):

            // loop through the rows of data
            while ( have_rows('services') ) : the_row();
            //echo var_dump(get_sub_field('image'));
                // display a sub field value ?>
        <div class="slider-box">
            <div class="process-block flex-row">
            <?php if(get_sub_field('image')) : $image = get_sub_field('image'); endif; ?>
                    <div class="img-box" data-bgratio=".75" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                    </div>
                <div class="text-box flex-col justify-center">
                <?php if(get_sub_field('header')) : $header = get_sub_field('header'); endif; ?>
                            <h4><?php echo $header; ?></h4>
                        <?php if(get_sub_field('text')) : $text = get_sub_field('text'); endif; ?>
                            <p><?php echo $text; ?></p>
                </div>
            </div><!-- .process-block -->
        </div> 
            <?php  
                endwhile;
            else :
                // no rows found
                echo '<h3>Please add some slides.</h3>';

            endif;
            ?>

        
        </div>
    </div><!-- .slider -->

    </main><!-- #process_page -->
    <script>
           
           //find options in docs
           jQuery(function($) {
                $('.slider').slick({
                    arrows: true,
                    nextArrow: '<button type="button" class="slick-next"><svg class="icon"><use xlink:href="#right-arrow" /></svg></button>',
                    prevArrow: '<button type="button" class="slick-prev"><svg class="icon"><use xlink:href="#left-arrow" /></svg></button>',
                    dots: true,
                })
           });
           </script>

</article><!-- #post-id -->
<?php
get_footer();
