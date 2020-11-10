<?php
/*****************
*
* FLEX_ROW SHORTCODE
*
*****************/
function row_shortcode( $atts, $content = null ) {
    return '<div class="flex_row">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'flex_row', 'row_shortcode' );

/*****************
*
* block SHORTCODE
*
*****************/
function block_shortcode( $atts, $content = null ) {
    return '<div class="flex_row_block">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'block', 'block_shortcode' );