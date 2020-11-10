<?php

function smash_block_share_icons($args = null) {
    $id = (!empty($args['post'])) ? $args['post'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $labels = (!empty($args['labels'])) ? $args['labels'] : false;
    $class = (!empty($args['class'])) ? $args['class'] : 'flex align-center justify-center';

    if($id){
    ?>
        <div class="share-icons flex align-center justify-center">
            <div id="share-<?php echo get_the_ID(); ?>" class="social-share">
                <div class="social-share-inner <?php echo $class; ?>">
                    <?php if($title){ ?>
                        <div class="social-share-title"><?php echo $title; ?></div>
                    <?php } ?>
                    <div class="share-icons-wrap fade">
                        <input class="image" type="hidden" value="<?php the_post_thumbnail_url(); ?>">
                        <input id="postURL" class="url" type="text" value="<?php the_permalink(); ?>">
                        <input class="title" type="hidden" value="<?php the_title(); ?>">
                        <button class="share s_pinterest btn-off"><i class="fab fa-pinterest-p" aria-hidden="true"></i><?php if($labels){ ?><span>Pin</span><?php } ?></button>
                        <button class="share share-last s_twitter btn-off"><i class="fab fa-twitter" aria-hidden="true"></i><?php if($labels){ ?><span>Tweet</span><?php } ?></button>
                        <button class="share s_facebook btn-off"><i class="fab fa-facebook-f" aria-hidden="true"></i><?php if($labels){ ?><span>Share</span><?php } ?></button>
                        <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php urlencode(the_permalink()); ?>"><i class="far fa-envelope" aria-hidden="true"></i><?php if($labels){ ?><span>Email</span><?php } ?></a></button>
                        <button class="share clipboard btn-off" onclick="copyToClipboard()">
                            <svg class="icon"><use xlink:href="#link" /></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}