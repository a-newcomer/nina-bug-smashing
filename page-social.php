<?php
/**
 * Template name: Social
 * 
 * The template for displaying all pages
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

	        <?php smash_block_hero(['post' => $post]) ?>
	
            <div id="pinterest_page" class="social-page">
                <!-- could make template part starting here -->
                <?php 
                $type = get_field('social_feed_type');
                $feedLink = get_field('link');
                $feedCTA = get_field('cta');
                $feedTitle = get_field('social_media_name'); ?>
                <section class="title-block">
                    <?php if($feedTitle) { ?>
                        <h2><?php echo $feedTitle; ?></h2>
                    <?php } ?>
                    <?php if($feedLink && $feedCTA) { ?>
                        <a href="<?php echo $feedLink ?>">
                            <span>+</span><?php echo $feedCTA ?>
                        </a>
                    <?php } ?>
                </section>
                
                <?php if($type == 'feed'){ ?>

                    
                        <section class="msnry-container-outer feed-shortcode-outer">
                            <div class="msnry-container-inner">
                                <?php the_field('feed'); ?>
                            </div>
                        </section>
                    
                    
                <?php } elseif($type == 'manual') { ?>

                    <section class="msnry-container-outer">
                        <div class="msnry-container-inner">

                            <?php // Check rows exists.
                            if( have_rows('individual_images') ): 
                                
                                // Loop through rows.
                                while( have_rows('individual_images') ) : the_row(); ?>

                                <?php
                                    // Load sub field value.
                                    $pinImage = get_sub_field('image_link'); 
                                    if($pinImage) {
                                    ?>
                                    <div class="msnry-item-outer">
                                        <img src="<?php echo $pinImage ?>" alt="Nina Magon Pinterest image">
                                    </div><!-- .msnry-item-outer -->

                                    <?php } // End loop.
                                endwhile; 
                                else :
                                    echo '<h2>No Images Yet</h2>';
                            
                            endif; ?>
                        </div>
                    </section>
                    
                <?php } ?>
                
                
      
                   
                        <!-- <div class="msnry-item-outer">
                            
                                   <img src="http://magon.test/wp-content/uploads/2020/10/pinterest3.jpg" alt="">
                            

                        </div>--><!--msnry-item-outer   -->
                           


            </div><!-- #pinterest_page.social-page -->

        </main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
