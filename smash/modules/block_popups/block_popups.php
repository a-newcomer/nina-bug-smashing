<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_popups_script', get_template_directory_uri() . '/smash/modules/block_popups/block_popups.js', array(), '1', true );
} );

function smash_block_popups() {
    if(have_rows('custom_popups','option')) : while(have_rows('custom_popups','option')) : the_row('custom_popups','option');
        $disable = get_sub_field('disable_popup','option');
        $cookie = get_sub_field('use_cookie','option');
        $show = get_sub_field('show_after','option');
        $expire = get_sub_field('expire_after','option');
        $type = get_sub_field('type','option');
        $classes = get_sub_field('popup_classes','option');
        $pages = (get_sub_field('restrict_to_type','option') == 'page') ? get_sub_field('restrict_to_page') : get_sub_field('restrict_to_category','option');

        if(!$disable){
            if($pages && in_array(get_queried_object_id(), $pages)){ ?>
                <aside id="popup-modal-<?php echo get_row_index(); ?>" class="modal popup-modal <?php echo $classes; ?>" <?php if($cookie && $show && $expire){ echo 'data-cookie='.$cookie.' data-show='.$show.' data-expire='.$expire; } ?> data-trigger="<?php the_sub_field('popup_trigger_class','option'); ?>">
                    <div id="popup-modal-box" class="modal-box">
                        <div id="popup-close">
                            <svg class="icon"><use xlink:href="#close" /></svg>
                        </div>
                        <div id="popup-modal-inner" class="modal-inner">
                                <?php if ( $type == 'image' && get_sub_field('popup_image','option') ) : $image = get_sub_field('popup_image','option'); ?>
                                    <img class="popup-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                <?php endif; ?>
                                <?php if ( get_sub_field('popup_text','option') ) : ?>
                                    <div class="popup-text">
                                        <?php echo get_sub_field('popup_text','option'); ?>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </aside>
    <?php 
            } elseif(empty($pages)) { ?>
                <aside id="popup-modal-<?php echo get_row_index(); ?>" class="modal popup-modal <?php echo $classes; ?>" <?php if($cookie && $show && $expire){ echo 'data-cookie='.$cookie.' data-show='.$show.' data-expire='.$expire; } ?> data-trigger="<?php the_sub_field('popup_trigger_class','option'); ?>">
                    <div id="popup-modal-box" class="modal-box">
                        <div id="popup-close">
                            <svg class="icon"><use xlink:href="#close" /></svg>
                        </div>
                        <div id="popup-modal-inner" class="modal-inner">
                                <?php if ( get_sub_field('popup_image','option') ) : $image = get_sub_field('popup_image','option'); ?>
                                    <img class="popup-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                <?php endif; ?>
                                <?php if ( get_sub_field('popup_text','option') ) : ?>
                                    <div class="popup-text">
                                        <?php echo get_sub_field('popup_text','option'); ?>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </aside>
            <?php }
        }
    endwhile; endif;
}