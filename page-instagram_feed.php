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
	
            <section id="pinterest_page" class="social-page">
                <!-- could make template part starting here -->
                <?php 
                $feedLink = get_field('link_to_page');
                $feedCTA = get_field('cta');
                $feedTitle = get_field('social_media_title'); ?>
                <div class="title-block">
                    <?php if($feedTitle) { ?>
                        <h2><?php echo $feedTitle; ?></h2>
                    <?php } ?>
                    <?php if($feedLink && $feedCTA) { ?>
                        <a href="<?php echo $feedLink ?>">
                            <span>+</span><?php echo $feedCTA ?>
                        </a>
                    <?php } ?>
                </div>

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

            </section><!-- #pinterest_page.social-page -->

        </main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
