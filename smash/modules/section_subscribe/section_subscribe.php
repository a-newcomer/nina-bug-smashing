<?php
function smash_section_subscribe($args = null){
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $form = (!empty($args['form'])) ? $args['form'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;

    if($form){
    ?>
    <section id="subscribe_section">
        <div class="subscribe-section-wrapper flex justify-between">
            <?php if ( $image ) : ?>
                <div class="subscribe-section-image" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
            <?php endif; ?>
            <div class="subscribe-section-content flex-col align-center justify-center">
                <div class="subscribe-section-content-inner">
                    <?php if ( $subtitle ) : ?>
                        <div class="subscribe-section-subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $title ) : ?>
                        <div class="subscribe-section-title">
                            <?php echo $title; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $text ) : ?>
                        <div class="subscribe-section-text">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( $form ) : ?>
                        <div class="subscribe-section-form">
                            <?php echo $form; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
}