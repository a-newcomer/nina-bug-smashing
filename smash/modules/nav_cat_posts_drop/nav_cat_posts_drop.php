<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_cat_posts_drop_script', get_template_directory_uri() . '/smash/modules/nav_cat_posts_drop/nav_cat_posts_drop.js', array(), '1', true );
} );


function smash_posts_drop($menu_id = '', $item_id = ''){
    $numbers[] = get_post_meta( $item_id, '_menu_item_object_id', true );
    foreach( $numbers as $cat){
        $str = '';
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'cat' => $cat
        ];

        $loop = new WP_Query($args);
        if($loop->have_posts()) : 
            $str .= '<section id="posts-drop-'.$cat.'" class="posts-drop" data-drop-item="'.$cat.'">
                <div class="dropdown-banner-wrapper">
                    <div class="dropdown-block dropdown-block-left">
                        <div class="drop-sub-cats">';
                            $term = get_term($cat);
                            $str .= '<span class="drop-nav-header">'.$term->name.'</span>';

                            $subs = get_terms(array('taxonomy' => 'category', 'child_of' => $cat));

                            foreach($subs as $sub){
                                $str .= '<a class="cat-item" href="'.get_term_link($sub->term_id).'">'.$sub->name.'</a>';
                            }

                            // $str .= get_terms(array('child_of' => $cat, 'title_li' => '', 'show_option_none' => ''));
                            
                            $str .= '<div class="dropdown-search">';
                                add_filter( 'get_search_form', 'custom_search_form_2' );
                                $str .= get_search_form(false);
                                remove_filter( 'get_search_form', 'custom_search_form_2' );
                            $str .= '</div>
                        </div>
                    </div>';

                    $str .= '<div class="dropdown-block dropdown-block-right flex align-start justify-between">';
                        while($loop->have_posts()) : $loop->the_post();
                        GLOBAL $post;
                            $str .= '<a class="drop-post" href="'.get_the_permalink().'">';
                            $str .= get_the_post_thumbnail($post, 'tall');
                            $str .= '<div class="drop-post-title-outer">
                                    <div class="drop-post-title-inner">';
                                    $str .= '<div class="drop-post-title">'.get_the_title().'</div>
                                    </div>
                                </div>
                            </a>';
                        endwhile;
                    $str .= '</div>
                </div>
            </section>';
        endif;

        // wp_reset_query();

        return $str;
    }
}


/*****************
*
* posts_drop SHORTCODE
*
*****************/
add_shortcode( 'posts_drop', function ( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'menu-id' 		=> '',
        'item-id'       => ''
    ), $atts);
    $menu_name = $a['menu-id'];
    $menu_item = $a['item-id'];
    
    // GET THE IDS OF MENU ITEMS
    // if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] )) {
    //     $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    //     $menu_items = wp_get_nav_menu_items($menu->term_id);
    // }
    // GET THE POST IDS OF THE MENU ITEMS
    // foreach ( $menu_items as $menu_item ) {
    //     $numbers[] = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );
    // }
    
    // 
    $numbers[] = get_post_meta( $menu_item, '_menu_item_object_id', true );

    // BUILD LIST OF POSTS FROM MENU ITEM POST IDS
    foreach( $numbers as $cat){
        $str = '';
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 4,
            'cat' => $cat
        ];

        $loop = new WP_Query($args);
        if($loop->have_posts()) : 
            $str .= '<section id="posts-drop-'.$cat.'" class="posts-drop" data-drop-item="'.$cat.'">
                <div class="dropdown-banner-wrapper">
                    <div class="dropdown-block dropdown-block-left">
                        <div class="drop-sub-cats">';
                            $term = get_term($cat);
                            $str .= '<span class="drop-nav-header">'.$term->name.'</span>';

                            $subs = get_terms(array('child_of' => $cat, 'title_li' => '', 'show_option_none' => ''));
                            return $subs;

                            foreach($subs as $sub){
                                $str .= '<a href="'.get_term_link($sub->term_id).'">'.$sub->name.'</a>';
                            }

                            // $str .= get_terms(array('child_of' => $cat, 'title_li' => '', 'show_option_none' => ''));
                            
                            $str .= '<div class="dropdown-search">';
                                // $str .= the_widget( 'WP_Widget_Search');
                                // add_filter( 'get_search_form', 'custom_search_form_2' );
                                // $str .= get_search_form();
                                // remove_filter( 'get_search_form', 'custom_search_form_2' );
                            $str .= '</div>
                        </div>
                    </div>';

                    $str .= '<div class="dropdown-block dropdown-block-right">';
                        while($loop->have_posts()) : $loop->the_post();
                        GLOBAL $post;
                            $str .= '<a class="drop-post" href="'.get_the_permalink().'">';
                            $str .= get_the_post_thumbnail($post, 'tall');
                            $str .= '<div class="drop-post-title-outer">
                                    <div class="drop-post-title-inner">';
                                    $str .= '<div class="drop-post-title">'.get_the_title().'</div>
                                    </div>
                                </div>
                            </a>';
                        endwhile;
                    $str .= '</div>
                </div>
            </section>';
        endif;

        // wp_reset_query();

        return $str;
    }
    
});


