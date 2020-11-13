<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nina_Magon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( get_field('favicon','option') ) : $image = get_field('favicon','option'); ?>
        <link rel="shortcut icon" href="<?php echo $image['url']; ?>" />
    <?php endif; ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kristen_nassif' ); ?></a>
    <input type="hidden" name="site_section" value="site-search" />

	<div id="waypoint"></div>

    <header id="masthead" class="landing site-header">

        <div class="site-header-container">

            <div class="site-navigation-wrap flex align-center justify-center">
    
                <div class="header-block header-left">
                    <div class="header-block-inner flex align-center justify-start">
                        <?php if(function_exists('smash_nav_mobile')){
                            //smash_nav_mobile();
                        } ?> 
                    </div>
                </div>
                
                <div class="header-block header-middle flex align-center justify-center">
                    <div class="header-block-inner flex-col align-center justify-center">
                        
                    </div>
                </div>
    
                <div class="header-block header-right">
                    <div class="header-block-inner flex align-center justify-end">

                    </div>
                </div>
    
            </div>
        
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">