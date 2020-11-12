<?php
/**
 * Template Name: Gift Guide
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nina_Magon
 */

get_header();
?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'guide' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; ?>

		</main><!-- #main -->
    </div><!-- #primary -->
    
    <?php if(function_exists('smash_section_more_posts')){
        smash_section_more_posts([
            'title' => 'explore more', 
            'cta' => 'View All Posts', 
            'link' => get_permalink( get_option( 'page_for_posts' ) ), 
            'args' => ['post_type' => 'post', 'posts_per_page' => 3],
            'isSingular' => true
        ]);
    } ?>

<?php
// get_sidebar();
get_footer();
