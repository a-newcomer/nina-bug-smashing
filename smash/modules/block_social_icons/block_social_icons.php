<?php

function smash_block_social_icons( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'header' => null,
        'titles' 		=> false,
        'class' => 'flex align-center justify-center'
    ), $atts);

    $ig = ($a['titles']) ? 'Instagram' : '';
    $tw = ($a['titles']) ? 'Twitter' : '';
    $fb = ($a['titles']) ? 'Facebook' : '';
    $pn = ($a['titles']) ? 'Pinterest' : '';
    $yt = ($a['titles']) ? 'Youtube' : '';
    $bl = ($a['titles']) ? 'Bloglovin' : '';
    
    $str = '';
        $str .= '<div class="social-icons '.$a['class'].'">';
            $str .= ($a['header']) ? '<span class="social-icons-header">'.$a['header'].'</span>' : '';
            if(get_field('instagram_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('instagram_link','option') . '" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i><span>'.$ig.'</span></a>';
            }
            if(get_field('twitter_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('twitter_link','option') . '" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span>'.$tw.'</span></a>';
            } 
            if(get_field('facebook_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('facebook_link','option') . '" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>'.$fb.'</span></a>';
            } 
            if(get_field('pinterest_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('pinterest_link','option') . '" target="_blank"><i class="fab fa-pinterest" aria-hidden="true"></i><span>'.$pn.'</span></a>';
            }
            if(get_field('youtube_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('youtube_link','option') . '" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i><span>'.$yt.'</span></a>';
            }
            if(get_field('blog_lovin_link','option')) {
                $str .= '<a class="social-icon" href="' . get_field('blog_lovin_link','option') . '" target="_blank"><i class="fas fa-heart" aria-hidden="true"></i><span>'.$bl.'</span></a>';
            }
        $str .= '</div>';
    return $str;
}
add_shortcode( 'social_icons', 'smash_block_social_icons' );