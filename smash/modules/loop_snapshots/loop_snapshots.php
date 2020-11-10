<?php

function smash_loop_snapshots($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $extras = (array_key_exists('extras', $args)) ? $args['extras'] : false;
    $a = (!empty($args['args'])) ? $args['args'] : null;
    $lp = new WP_Query($a);

    if($lp->have_posts()) : ?>
        <section id="snapshots_loop">
            <div class="snapshots-wrapper container-xl">
                <div class="snapshots-header">
                    <div class="snapshots-title-wrap">
                        <?php if($title){ ?>
                            <h2 class="snapshots-title"><?php echo $title; ?></h2>
                        <?php } ?>
                    </div>
                    <?php if($cta && $link){ ?>
                        <a href="<?php echo $link; ?>" class="snapshots-cta animate-right">
                            <?php echo $cta; ?>
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    <?php } ?>
                </div>
                <div class="snapshots-inner">
                    <?php while($lp->have_posts()) : $lp->the_post(); ?>
                        <?php 
                        $p = get_post(get_the_ID());
                        if($p){ 
                            smash_block_snapshot(['extras' => $extras, 'snapshot' => $p]); 
                        } ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_query();
}