<?php 

function smash_block_custom_search($args = null) {
    $form = (!empty($args['form'])) ? $args['form'] : 'custom_search_form_2';
    /* Temporarily use custom_search_form_2 to output the search form. */
    add_filter( 'get_search_form', $form );
    get_search_form();
    remove_filter( 'get_search_form', $form );
}