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

    <header id="masthead" class="site-header">

        <div class="site-header-container">

            <div class="site-navigation-wrap flex align-center justify-center">
    
                <div class="header-block header-left">
                    <div class="header-block-inner flex align-center justify-start">
                        <?php if(function_exists('smash_nav_mobile')){
                            smash_nav_mobile();
                        } ?> 
                    </div>
                </div>
                
                <div class="header-block header-middle flex align-center justify-center">
                    <div class="header-block-inner flex-col align-center justify-center">
                        <?php if ( get_field('logo','option') ) : $image = get_field('logo','option'); ?>
                            <div id="logo_wrap" class="fixed">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ( get_field('logo_icon','option') ) : $image = get_field('logo_icon','option'); ?>
                            <div id="logo_wrap" class="scrolled">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
    
                <div class="header-block header-right">
                    <div class="header-block-inner flex align-center justify-end">
                        <?php if(function_exists('smash_nav_subscribe')){
                            smash_nav_subscribe(['cta' => get_field('subscribe_drawer_cta','option'), 'image' => get_field('subscribe_drawer_image','option'), 'title' => get_field('subscribe_drawer_title','option'), 'form' => get_field('subscribe_drawer_form','option')]);
                        } ?>
                    </div>
                </div>
    
            </div>
    
            <?php if(!is_front_page() && !is_page_template('page-main.php')){ ?>
                <?php
                if(is_home()){
                    $title = 'All Posts';
                } elseif(is_archive()) {
                    $title = get_the_archive_title();
                } elseif(is_page() || is_single()) {
                    $title = get_the_title();
                } else {
                    $title = '';
                }?>
                <div class="page-nav-wrap">
                    <div class="page-menu-toggle">
                        <div class="page-menu-toggle-inner">
                            <svg class="icon"><use xlink:href="#down-angle" /></svg>
                            <span><?php echo $title; ?></span>
                        </div>
                    </div>
                    <div class="page-nav-wrap-inner">
                        <?php if(is_home()){ $cats = get_terms(['taxonomy' => 'category', 'parent' => 0]); ?>
                            <div class="page-nav cat-nav flex-wrap align-end justify-end">
                                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item cat-nav-current">All</a>
                                <?php foreach($cats as $cat){
                                    echo '<a class="cat-nav-item" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                                } ?>
                            </div>
                        <?php } elseif(is_category()) {
                            $current_cat = get_queried_object();
                            $cats = (!empty(get_categories(['child_of' => $current_cat->term_id]))) ? get_categories(['child_of' => $current_cat->term_id]) : get_categories(['parent' => 0]);
                            $parent = get_queried_object()->category_parent;

                            if($parent){
                                $cats = get_categories(['child_of' => $parent]);
                                if($cats){ ?>
                                    <div class="page-nav cat-nav">
                                        <a class="cat-nav-latest cat-nav-item" href="<?php echo get_term_link($parent); ?>" class="cat-nav-latest">All</a>
                                        <?php foreach($cats as $cat){
                                            $is_current = '';
                                            if($cat == $current_cat){
                                                $is_current = 'cat-nav-current';
                                            }
                                            echo '<a class="cat-nav-item '.$is_current.'" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                                        } ?>
                                    </div>
                                <?php } ?>
                            <?php } elseif($cats) { ?>
                                <div class="page-nav cat-nav">
                                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item">All</a>
                                    <?php foreach($cats as $cat){
                                        echo '<a class="cat-nav-item" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                                    } ?>
                                </div>
                            <?php } ?>
                        <?php } elseif(is_singular('work')) { ?>
                            <?php $cats = get_terms(['taxonomy' => 'work_categories', 'parent' => 0]); ?>
                            <div class="page-nav cat-nav">
                                <?php foreach($cats as $cat){
                                    echo '<a class="cat-nav-item" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                                } ?>
                            </div>
                        <?php } elseif(is_page() && get_field('menu')) { ?>
                            <?php
                                wp_nav_menu( array(
                                    'menu' 	            => get_field('menu'),
                                    'menu_class'       	=> 'page_menu page-nav',
                                    'container_class'	=> 'page-menu-container',
                                ) );
                            ?>
                        <?php } elseif(is_single()) { $cats = get_the_category(); ?>
                            <div class="page-nav cat-nav flex-wrap align-end justify-end">
                                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item cat-nav-current">All</a>
                                <?php foreach($cats as $cat){
                                    echo '<a class="cat-nav-item" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                                } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    
    </header><!-- #masthead -->

    <div id="content" class="site-content">
    <?php smash_dot_nav(); ?>