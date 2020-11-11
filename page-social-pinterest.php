<?php
/**
 * Template name: Social Pinterest
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
                $feedTitle = get_field('social_media_title');
                $feedLink = get_field('link');
                $feedCTA = get_field('cta') ?>
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
                        
                        <?php                        
                            // Check rows exists.
                            if( have_rows('images') ):

                                // Loop through rows.
                                while( have_rows('images') ) : the_row(); ?>

                                <?php
                                    // Load sub field value.
                                    $pinImage = get_sub_field('image_url');
                                    $pinLink = get_sub_field('image_link');
                                    if($pinImage) {
                                    ?>
                                    <a class="msnry-item-outer" href="<?php if($pinLink) { echo $pinLink;} ?>">
                                    <img src="<?php echo $pinImage ?>" alt="Nina Magon Pinterest image">
                                    </a><!-- .msnry-item-outer -->

                                    <?php } // End loop.
                                endwhile;

                        
                            else :
                                echo '<h2>No Images Yet</h2>';
                            endif;
                        ?>
                    </div>
                </section>

            </div><!-- #pinterest_page.social-page -->

        </main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
