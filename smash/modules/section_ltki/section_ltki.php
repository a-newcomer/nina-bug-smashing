<?php

function smash_section_ltki($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $feed = (!empty($args['feed'])) ? $args['feed'] : null;
    $mobile = (!empty($args['mobile'])) ? $args['mobile'] : null;

    if($feed && $mobile){ ?>
        <section id="ltki_wrapper">
            <div class="ltki-container container-xl">
                <div class="ltki-header">
                    <div class="ltki-header-col">
                        <?php if($title){ ?>
                            <h3 class="ltki-title"><?php echo $title; ?></h3>
                        <?php } ?>
                        <?php if($subtitle){ ?>
                                <h3 class="ltki-subtitle"><?php echo $subtitle; ?></h3>
                        <?php } ?>
                    </div>
                    <?php if(get_field('instagram_handle','option') && get_field('instagram_link','option')){ ?>
                        <a href="<?php echo get_field('instagram_link','option'); ?>" class="ltki-handle"><?php echo '@'.get_field('instagram_handle','option'); ?></a>
                    <?php } ?>
                </div>
                <?php if($feed){ ?>
                    <div class="ltki-feed">
                        <?php echo $feed; ?>
                    </div>
                <?php } ?>
                <?php if($mobile){ ?>
                    <div class="ltki-feed-mobile">
                        <?php echo $mobile; ?>
                    </div>
                <?php } ?>
                <?php if($cta && $link){ ?>
                    <a href="<?php echo $link; ?>" class="ltki-cta animate-right">
                        <span><?php echo $cta; ?></span>
                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                    </a>
                <?php } ?>
            </div>
        </section>
    <?php }
}