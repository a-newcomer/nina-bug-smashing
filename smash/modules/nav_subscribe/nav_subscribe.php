<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_subscribe_script', get_template_directory_uri() . '/smash/modules/nav_subscribe/nav_subscribe.js', array(), '1', true );
} );

function smash_nav_subscribe($args = null) {
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $form = (!empty($args['form'])) ? $args['form'] : null;

    if ($cta && $form) {
    ?>
        <div id="subscribe_nav_wrap">
            <a href="#" class="subscribe-nav-trigger subscribe-nav-trigger-open btn btn-secondary enquire-btn"><?php echo $cta; ?></a>
            <div id="subscribe_nav_bg"></div>
            <div class="subscribe-nav-outer" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                <div class="subscribe-nav-outer-inner">
                    <div class="subscribe-nav-trigger subscribe-nav-trigger-close">
                        <svg class="icon"><use xlink:href="#close" /></svg>
                        <span>Close</span>
                    </div>
                    <div class="subscribe-nav-inner flex-col align-center justify-start">
                        <div class="subscribe-nav-body flex-col align-center justify-start">
                            <?php if($title){ ?>
                                <h3 class="subscribe-nav-title"><?php echo $title; ?></h3>
                            <?php } ?>
                            <div class="subscribe-nav-form">
                                <?php echo $form; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}