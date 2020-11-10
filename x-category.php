<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main">
        
            <?php if ( have_posts() ) : ?>
            
                <section id="archive_page">
                    <header class="container-xl page-header">
                        <?php the_archive_title( '<h1 class="page-title cat-title">', '</h1>' ); ?>			
                    </header><!-- .page-header -->

                    <?php
                    $cats = get_categories(['child_of' => $cat]);
                    $current_cat = get_queried_object();
                    $parent = get_queried_object()->category_parent;

                    if($parent){
                        $cats = get_categories(['child_of' => $parent]);
                        if($cats){ ?>
                            <div class="cat-nav container-lrg">
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
                        <div class="cat-nav container-lrg">
                            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="cat-nav-item">All</a>
                            <?php foreach($cats as $cat){
                                echo '<a class="cat-nav-item" href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
                            } ?>
                        </div>
                    <?php } ?>

                    <div class="archive-bg">

                        <div class="archive-items container-lg">

                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php $p = get_post(get_the_ID());
                                if($p){
                                    smash_block_post(['class' => 'archive-item', 'post' => $p]);
                                } ?>
                            <?php endwhile; ?>

                        </div>

                        <!-- Load More -->
                        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="archive-items container-lg" post_type="post" category="'.$current_cat->slug.'" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
                    </div>
                </section>


            <?php else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
