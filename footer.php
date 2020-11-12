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

</div><!-- #page -->

<footer id="colophon" class="site-footer">
		<div class="site-info container-lg">
                
        <?php if ( get_field('logo_icon','option') ) : $image = get_field('logo_icon','option'); ?>
            <div id="logo_wrap" class="grid-box grid-box1">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </a>
            </div>
        <?php endif; ?>
        <div class="break grid-box2"></div>
        <div class="form grid-box grid-box3">
            <?php echo do_shortcode( '[ninja_form id=3]' ); ?>
        
        </div>

            <?php
                wp_nav_menu( array(
                    'theme_location' 	=> 'footer',
                    'menu_id'        	=> 'footer_menu',
                    'menu_class'        => 'footer-menu',
                    'container_id'	    => 'footer_menu_container',
                    'container_class'	=> 'footer-menu-container grid-box',
                ) );
            ?>
            <div class="footer-contact-info grid-box grid-box4">
                <div class="contact-left">
                    <?php if(get_field('phone','option')) : $phone = get_field('phone','option'); ?>
                <p><?php echo $phone; endif; ?></p>
                <?php if(get_field('email', 'option')) : $email = get_field('email','option'); ?>
                <p><?php echo $email;endif; ?></p>
                </div>
                <div class="contact-right">
                <?php if(get_field('address_line_one', 'option')) : $addressOne = get_field('address_line_one','option'); ?>
                <p><?php echo $addressOne; endif; ?></p>
                <?php if(get_field('address_line_two', 'option')) : $addressTwo = get_field('address_line_two','option'); ?>
                <p><?php echo $addressTwo; endif;
                ?></p>
                </div>
            </div>
            <div class="break grid-box5"><br></div>
            <div class="footer-social grid-box grid-box6"> 
                <?php echo do_shortcode('[social_icons]'); ?>
            </div>

			<div class="site-built grid-box grid-box6">
                <!-- <span>Site by <a href="https://smashcreative.com/" target="_blank"><img src="<?php //echo bloginfo('stylesheet_directory').'/smash/images/smash.png'; ?>"></a></span> --> &COPY; <?php bloginfo( 'name' ); ?>. All Rights Reserved. 
				<span> Site by <a href="https://smashcreative.com/" target="_blank"><img src="<?php echo bloginfo('stylesheet_directory').'/smash/images/smash-white.png'; ?>"></a></span>
			</div>
        </div><!-- .site-info -->
    
	</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
