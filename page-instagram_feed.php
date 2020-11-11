<?php
/**
 * Template name: Instagram Feed
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
                $feedLink = get_field('link_to_page');
                $feedCTA = get_field('cta');
                $feedTitle = get_field('social_media_title'); ?>
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

                    <section class="msnry-container-outer">
                        <div class="msnry-container-inner">

                        <div class="msnry-container-outer feed-shortcode-outer">
                            <div class="msnry-container-inner">
                                <?php 
                                $feed = get_field('feed');
                                    if($feed) {
                                     the_field('feed'); 
                                    }
                                ?>
                            </div>
                        </div>

                        </div>
                    </section>
                    
             
                
                
      
                   
                        <!-- <div class="msnry-item-outer">
                            
                                   <img src="http://magon.test/wp-content/uploads/2020/10/pinterest3.jpg" alt="">
                            

                        </div>--><!--msnry-item-outer   -->
                           


            </div><!-- #pinterest_page.social-page -->

        </main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
