<?php
/**
 * Template name: Home
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

get_header('landing');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page'); ?>>
	
    <?php  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
    <div class="entry-header hero-img" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">

        <a href="<?php the_field('entry_link'); ?>">
            <div class="logo-holder">

                <?php $logoImage = get_field('full_logo');
                if($logoImage) { ?>
                    <img src="<?php echo $logoImage['url']; ?>" alt="<?php echo $logoImage['alt'];?>">
                <?php } ?>
            </div>
            <?php if(get_the_title()) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else { 
                $description = get_bloginfo('description');
                if ( $description ) {
                    echo '<h1 class="entry-title">' . $description . '</h1>';
                }
            } ?>
        </a>
    </div><!-- .entry-header -->

</article><!-- #post-number.front-page ?> -->

<?php

get_footer('landing');