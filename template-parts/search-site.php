<div class="archive-bg">
    <div class="site-search">
        <?php smash_block_custom_search(['form' => 'custom_search_form']); ?>
    </div>

    <div class="archive-items container-lg">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $p = get_post(get_the_ID());
            if($p){
                smash_block_post(['class' => 'archive-item', 'post' => $p]);
            } ?>
        <?php endwhile; ?>
    </div>

    <!-- Load More -->
    <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="alm-grid-loop-container" post_type="post" search="'.get_search_query().'" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
</div>