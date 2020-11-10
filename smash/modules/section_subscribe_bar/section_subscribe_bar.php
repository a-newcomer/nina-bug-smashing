<?php 

function smash_section_subscribe_bar($args = null){
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $body = (!empty($args['body'])) ? $args['body'] : null;

    if($title && $body){ ?>
        <section id="subscribe_bar" class="flex align-center justify-center">
            <h3 class="subscribe-bar-title"><?php echo $title; ?></h3>
            <div class="subscribe-bar-body"><?php echo $body; ?></div>
        </section>
    <?php }
}