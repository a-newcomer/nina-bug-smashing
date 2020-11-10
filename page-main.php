<?php
/**
 * Template name: Main
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
<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?>>
	
    <?php smash_block_hero(['post' => $post]) ?>

    <!-- now add the block of text under the header-->
    <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
  
    <span id="nmsc-section-2"></span>

	<div class="entry-content">
		<?php
		the_content();

		?>

    <main>
           
            <!-- this is actually the video block - name needs to be updated, and SCSS adjusted -->
            <div id="about_page">
                <?php get_template_part( 'template-parts/content', 'page-about' ); ?>
            </div>

            <!-- Might have to think of a more generic id for this block for scroll-jacking -->
            <span id="nmsc-section-3"></span>
            <div class="second-header-block">
                <?php smash_under_header_block(['header' => get_field('2nd_subheader'), 'text' => get_field('2nd_text')]) ?>
            </div>
            <section class="blog-card-holder container-lg" id="featured-services-block">
                <!-- * * *  LEFT SERVICES BOX * * * -->
                <div class="blog-card rising-card flex-col">
                    <a href="<?php //acf link goes here ?>">
                        <div class="blog-card-inner">
                            <?php $left_image = (get_field('left_image')) ? get_field('left_image') : null; ?>
                            <?php if($left_image){ ?>
                                <div class="blog-card-bgr-pic" data-bgratio="1" style="background: url(<?php echo $left_image['url']; ?>) no-repeat center; background-size: cover;">
                                    <div class="blog-card-shade"></div>
                                </div>
                            <?php } ?>
                        </div><!-- blog-card-inner ends here -->
                        
                        <?php $lServiceHead = (get_field('left_services_header')) ? get_field('left_services_header') : null; ?>
                        <?php if($lServiceHead){ ?>
                            <h5><?php echo $lServiceHead; ?></h5>
                        <?php } ?>
                        
                        <?php $lServiceText = (get_field('left_services_text')) ? get_field('left_services_text') : null; ?>
                        <?php if($lServiceText){ ?>
                            <h6><?php echo $lServiceText; ?></h6>
                        <?php } ?>
                    </a>      
                </div><!-- blog-card ends here -->
                    
                <!-- * * *  MIDDLE SERVICES BOX * * * -->
                <div class="blog-card rising-card flex-col">
                    <a href="<?php //acf link goes here ?>">
                        <div class="blog-card-inner">
                            <?php $center_image = (get_field('center_image')) ? get_field('center_image') : null; ?>
                            <?php if($center_image){ ?>
                                <div class="blog-card-bgr-pic" data-bgratio="1" style="background: url(<?php echo $center_image['url']; ?>) no-repeat center; background-size: cover;">
                                    <div class="blog-card-shade"></div>
                                </div>
                            <?php } ?>
                        </div><!-- blog-card-inner ends here -->
                        
                        <?php $lServiceHead = (get_field('center_services_header')) ? get_field('center_services_header') : null; ?>
                        <?php if($lServiceHead){ ?>
                            <h5><?php echo $lServiceHead; ?></h5>
                        <?php } ?>
                        
                        <?php $lServiceText = (get_field('center_services_text')) ? get_field('center_services_text') : null; ?>
                        <?php if($lServiceText){ ?>
                            <h6><?php echo $lServiceText; ?></h6>
                        <?php } ?>
                    </a>      
                </div><!-- blog-card ends here -->

                <!-- * * *  RIGHT SERVICES BOX * * * -->
                <div class="blog-card rising-card flex-col">
                    <a href="<?php //acf link goes here ?>">
                        <div class="blog-card-inner">
                            <?php $right_image = (get_field('right_image')) ? get_field('right_image') : null; ?>
                            <?php if($right_image){ ?>
                                <div class="blog-card-bgr-pic" data-bgratio="1" style="background: url(<?php echo $right_image['url']; ?>) no-repeat center; background-size: cover;">
                                    <div class="blog-card-shade"></div>
                                </div>
                            <?php } ?>
                        </div><!-- blog-card-inner ends here -->
                        
                        <?php $lServiceHead = (get_field('right_services_header')) ? get_field('right_services_header') : null; ?>
                        <?php if($lServiceHead){ ?>
                            <h5><?php echo $lServiceHead; ?></h5>
                        <?php } ?>
                        
                        <?php $lServiceText = (get_field('right_services_text')) ? get_field('right_services_text') : null; ?>
                        <?php if($lServiceText){ ?>
                            <h6><?php echo $lServiceText; ?></h6>
                        <?php } ?>
                    </a>      
                </div><!-- blog-card ends here -->
                
            </section> <!--End Featured-blog-block-->

            <div class="nina-cta flex-col container-lg flex-center header-block" id="nmsc-centered-cta">
                <a class="flex-row" href="<?php if(get_field('bottom_cta_link')) : the_field('bottom_cta_link'); endif; ?>">
                    <h5><?php  if(get_field('bottom_cta_text')) : the_field('bottom_cta_text'); endif; ?> </h5><svg class="icon"><use xlink:href="#right-arrow" /></svg>
                </a>
            </div> <!-- end cta-->
        </main>
        

</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php
get_footer();
