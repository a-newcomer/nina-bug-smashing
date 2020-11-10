<?php
function smash_single_guides($post_id){
    $str = '';

    if(have_rows('guides', $post_id)) : 
        $str .= '<h2 class="post-guides-title">'.get_field('guides_title').'</h2>';
        while(have_rows('guides', $post_id)) : the_row();
            $id = get_row_index();
            $str .= '<div id="post-guide-'.$id.'" class="post-guide-row flex align-center justify-between">';
                if ( get_sub_field('image') ) {
                    $attachment_id = get_sub_field('image');
                    $size = "medium"; // (thumbnail, medium, large, full or custom size)
                    $str .= wp_get_attachment_image( $attachment_id, $size );
                }
                
                if ( get_sub_field('separator') ) :
                    $str .= '<div class="sep"></div>';
                endif;
                $str .= '<div class="guide-body">';
                    // $str .= '<div class="guide-count">'.$id.'.</div>';
                    if ( get_sub_field('title') ) :
                        $str .= '<div class="guide-title">'.get_sub_field('title').'</div>';
                    endif;
                    if ( get_sub_field('text') ) :
                        $str .= '<div class="guide-text">'.get_sub_field('text').'</div>';
                    endif;
                    if ( get_sub_field('cta') && get_sub_field('cta_link') ) :
                        $str .= '<a href="'.get_sub_field('cta_link').'" class="animate-right">'.get_sub_field('cta').'<svg class="icon"><use xlink:href="#right-arrow" /></svg></a>';
                    endif;
                $str .= '</div></div>';
        endwhile; 
    endif;

    echo $str;
}


function smash_single_guides_shortcode($atts, $content = null){
    $a = shortcode_atts( array(
        'id' 		=> ''
    ), $atts);

    $id = $a['id'];
    $rows = get_field('guides');
    $str = '';

    if(have_rows('guides')) : 
        while(have_rows('guides')) : the_row(); 
            $row = get_row_index();
            if($id == $row){
                $str .= '<div id="post-guide-'.$id.'" class="post-guide-row flex align-center justify-center">';
                    if ( get_sub_field('image') ) {
                        $attachment_id = get_sub_field('image');
                        $size = "medium"; // (thumbnail, medium, large, full or custom size)
                        $str .= wp_get_attachment_image( $attachment_id, $size );
                    }
                    
                    if ( get_sub_field('separator') ) :
                        $str .= '<div class="sep"></div>';
                    endif;
                    $str .= '<div class="guide-body">';
                    $str .= '<div class="guide-count">'.$row.'.</div>';
                        if ( get_sub_field('title') ) :
                            $str .= '<div class="guide-title">'.get_sub_field('title').'</div>';
                        endif;
                        if ( get_sub_field('text') ) :
                            $str .= '<div class="guide-text">'.get_sub_field('text').'</div>';
                        endif;
                        if ( get_sub_field('cta') && get_sub_field('cta_link') ) :
                            $str .= '<a href="'.get_sub_field('cta_link').'" class="animate-right">'.get_sub_field('cta').'<svg class="icon"><use xlink:href="#right-arrow" /></svg></a>';
                        endif;
                    $str .= '</div></div>';
            }
        endwhile; 
    endif;

    return $str;
}

add_shortcode( 'guide', 'smash_single_guides_shortcode' );