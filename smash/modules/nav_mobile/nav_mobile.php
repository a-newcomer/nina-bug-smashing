<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_mobile_script', get_template_directory_uri() . '/smash/modules/nav_mobile/nav_mobile.js', array(), '1', true );
} );

function smash_nav_mobile() {
    ?>
        <div id="mobile_nav_wrap">
            <svg class="mobile-nav-trigger mobile-nav-trigger-open icon">
                <use xlink:href="#burger" />
            </svg>
            <div id="mobile_nav_bg"></div>
            <div class="mobile-nav-outer">
                <div class="mobile-nav-outer-inner">
                    <div class="mobile-nav-trigger mobile-nav-trigger-close">
                        <svg class="icon"><use xlink:href="#close" /></svg>
                        <span>Close</span>
                    </div>
                    <div class="mobile-nav-inner flex-col align-center justify-start">
                        <div class="mobile-nav-body flex-col align-center justify-start">
                            <div id="mobile_menu_container">
                                <?php if ( have_rows('menu_links','option') ) : ?>
                                    <ul id="mobile_menu" class="menu-items-inner flex-col align-start justify-start selected">
                                        <?php while( have_rows('menu_links','option') ) : the_row(); ?>
                                            <?php
                                            $linkIndex = get_row_index();
                                            $label = (get_sub_field('label','option')) ? get_sub_field('label','option') : null;
                                            $link = (get_sub_field('link','option')) ? get_sub_field('link','option') : '#';
                                            $isHeader = get_sub_field('is_header');
                                            $sublinks = (get_sub_field('links','option')) ? get_sub_field('links','option') : null;
                                            ?>
        
                                            <li>
                                                <?php if($isHeader && $label){ ?>
                                                    <label class="menu-item nav-block-trigger nav-image-trigger first-label nav-back" data-show="sub-1-<?php echo $linkIndex; ?>" data-menu-image="menu_image_<?php echo $linkIndex . '_1'; ?>">
                                                        <span><?php echo $label; ?></span>
                                                    </label>
                                                <?php } else { ?>
                                                    <a class="menu-item" href="<?php echo $link; ?>">
                                                        <?php echo $label; ?>
                                                    </a>
                                                <?php } ?>
        
                                                <?php if ( have_rows('sub_links','option') ) : ?>
                                                    <ul id="sub-1-<?php echo $linkIndex; ?>" class="sub-links">
                                                        <li>
                                                            <label class="nav-block-trigger nav-back" data-show="mobile_menu">
                                                                <svg class="icon"><use xlink:href="#arrow-left" /></svg>
                                                                <span><?php echo $label; ?></span>
                                                            </label>
                                                        </li>
                                                        <?php while( have_rows('sub_links','option') ) : the_row(); 
                                                            $sublinkIndex = get_row_index(); 
                                                            $otype = (get_sub_field('image','option')) ? 'div' : 'a href="'.get_sub_field('link','option').'"';
                                                            $ctype = (get_sub_field('image','option')) ? 'div' : 'a';
                                                        ?>
                                                            <li>
                                                                <<?php echo $otype; ?> class="menu-item nav-image-trigger" data-menu-image="menu_image_<?php echo $linkIndex . '_' . $sublinkIndex; ?>">
                                                                    <?php echo get_sub_field('label','option'); ?>
                                                                </<?php echo $ctype; ?>>
                                                            </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
        
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if ( have_rows('menu_links','option') ) : ?>
                    <div class="menu-images-wrapper">
                        <?php while( have_rows('menu_links','option') ) : the_row(); $imageIndex = get_row_index(); ?>
                            <?php if ( have_rows('sub_links','option') ) : ?>
                                <?php while( have_rows('sub_links','option') ) : the_row(); 
                                    $subImageIndex = get_row_index(); 
                                    $cta = (get_sub_field('cta','option')) ? get_sub_field('cta','option') : null;
                                    $link = (get_sub_field('link','option')) ? get_sub_field('link','option') : null;
                                    $image = (get_sub_field('image','option')) ? get_sub_field('image','option') : null;
                                    if($image && $link && $cta){ ?>
                                        <div id="menu_image_<?php echo $imageIndex . '_' . $subImageIndex; ?>" class="menu-image" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
                                            <div class="menu-image-inner">
                                                <?php if($cta && $link){ ?>
                                                    <a href="<?php echo $link; ?>" class="btn-tertiary btn-nina">
                                                        <span><?php echo $cta; ?></span>
                                                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>

    <?php
}