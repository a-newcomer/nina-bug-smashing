<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nina_Magon
 */

get_header();
?>

	<div id="primary" class="pad-section container-lg content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found flex-col align-center justify-start" style="text-align: center;">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nina_magon' ); ?></h1>
				</header><!-- .page-header -->

				<section class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nina_magon' ); ?></p>

					<?php get_search_form(); ?>

				</section><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
