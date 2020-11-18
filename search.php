<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nina_Magon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>
        
            <div id="archive_page">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        /* translators: %s: search query. */
                        printf( esc_html__( 'Search Results for: %s', 'nina_magon' ), '<span>' . get_search_query() . '</span>' );
                        ?>
                    </h1>
                </header><!-- .page-header -->

                <?php 
                $search_refer = $_GET['site_section'];
                if ($search_refer == 'product-search') { 
                    get_template_part( 'template-parts/search', 'shop' );
                } elseif ($search_refer == 'site-search') { 
                    get_template_part( 'template-parts/search', 'site' ); 
                } ?>

            </div>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
