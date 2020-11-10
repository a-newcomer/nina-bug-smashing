<?php

function smash_under_header_block($args = null) {
    $header = (!empty($args['header'])) ? $args['header'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    ?>
    <section class="header-block-content" id="black-header-block">
        <?php if($header){ ?>
            <h2><?php echo "$header"; ?></h2>
        <?php } ?>
        <?php if($header && $text){ ?>
            <hr class="short">
        <?php } ?>
        <?php if($text){ ?>
            <h6><?php echo "$text"; ?></h6>
        <?php } ?>
    </section>

<?php    
}
