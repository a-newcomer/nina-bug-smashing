<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nina_Magon
 */

?>

	</div><!-- #content -->


    <!-- <section id="instagram_feed">
        <?php if ( get_field('instagram_handle','option') && get_field('instagram_link','option') ) : ?>
            <a class="instagram-header btn btn-primary" href="<?php echo get_field('instagram_link','option'); ?>" target="_blank"><?php echo get_field('instagram_handle','option'); ?></a>
        <?php endif; ?>
        <?php echo do_shortcode('[instagram-feed]'); ?>
    </section> -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <div class="site-copy">
                &COPY; <?php bloginfo( 'name' ); ?>. All Rights Reserved.
            </div>

            <?php
                wp_nav_menu( array(
                    'theme_location' 	=> 'footer',
                    'menu_id'        	=> 'footer_menu',
                    'menu_class'        => 'footer-menu',
                    'container_id'	    => 'footer_menu_container',
                    'container_class'	=> 'footer-menu-container',
                ) );
            ?>

			<div class="site-built flex align-center">
                <!-- <span>Site by <a href="https://smashcreative.com/" target="_blank"><img src="<?php //echo bloginfo('stylesheet_directory').'/smash/images/smash.png'; ?>"></a></span> -->
				<span>Site by <a href="https://smashcreative.com/" target="_blank">Smash</a></span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
