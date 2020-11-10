<?php
// add_action( 'wp_enqueue_scripts', function(){
//     wp_enqueue_script( 'more_posts_script', get_template_directory_uri() . '/smash/modules/more_posts/more_posts.js', array(), '1', true );
// } );

function smash_section_more_posts($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : 'Keep On Reading';
    $label = (!empty($args['label'])) ? $args['label'] : null;
    $loopArgs = (!empty($args['args'])) ? $args['args'] : ['post_type' => 'post', 'posts_per_page' => 3];
    $isSingular = (!empty($args['isSingular'])) ? $args['isSingular'] : false;
    $num = $loopArgs['posts_per_page'];
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;

	if($isSingular) {
        global $post;
        $myPosts = [];
        $current_post = $post; // remember the current post
        for($i = 1; $i <= $num; $i++) :
            $post = get_previous_post(); // this uses $post->ID
            setup_postdata($post); 
            if($post){
                array_push($myPosts, $post);
            }
        endfor;

        if($myPosts){ ?>
            <div id="more_posts">
				<section id="posts-grid" class="container-xl">
                    <div class="next-up-header">
                        <div class="post-grid-title-wrap">
                            <?php if($label){ ?>
                                <h5 class="post-grid-label brush-bg"><?php echo $label; ?></h5>
                            <?php } ?>
                            <div class="post-grid-title"><?php echo $title; ?></div>
                        </div>
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="next-up-cta animate-right">
                            View All Posts
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    </div>
					<div class="next-up-posts archive-items flex-wrap align-start justify-center">
                        <?php foreach($myPosts as $post) : setup_postdata($post); ?>
                            <?php $p = get_post(get_the_ID());
                            if($p){
                                smash_block_post(['class' => 'archive-item', 'post' => $p]);
                            } ?>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
				</section>
			</div>
        <?php } ?>
	<?php } else {
		$lp = new WP_Query($loopArgs);

		if($lp->have_posts()) :
        ?>
			<div id="more_posts">
				<section id="posts-grid" class="container-xl">
                    <div class="next-up-header">
                        <div class="post-grid-title-wrap">
                            <?php if($label){ ?>
                                <h5 class="post-grid-label brush-bg"><?php echo $label; ?></h5>
                            <?php } ?>
                            <div class="post-grid-title"><?php echo $title; ?></div>
                        </div>
                        <?php if($cta && $link){ ?>
                            <a href="<?php echo $link ?>" class="next-up-cta animate-right">
                                <?php echo $cta; ?>
                                <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                            </a>
                        <?php } ?>
                    </div>
					<div class="next-up-posts archive-items flex-wrap align-start justify-center">
                        <?php while($lp->have_posts()) : $lp->the_post() ?>
                            <?php $p = get_post(get_the_ID());
                            if($p){
                                smash_block_post(['class' => 'archive-item', 'post' => $p]);
                            } ?>
                        <?php endwhile; ?>
                    </div>
				</section>
			</div>
		<?php
		endif;
		wp_reset_query();
		wp_reset_postdata();
	}

}