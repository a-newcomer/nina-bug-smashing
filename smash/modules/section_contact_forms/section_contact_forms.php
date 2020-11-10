<?php 
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_contact_forms_script', get_template_directory_uri() . '/smash/modules/section_contact_forms/section_contact_forms.js', array(), '1', true );
} );

add_shortcode( 'smash_section_contact_forms', function ( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'title' => 'Get In Touch',
        'text' => '',
        'social' => false
    ), $atts);
    $title = $a['title'];
    $text = $a['text'];
    $social = $a['social'];
    $str = '';
    
    $str .= '<div class="contact-form-wrap container-md">
    <div id="contact-form-wrapper">';
        if ( $title ) :
            $str .= '<h3 class="contact-form-title">'.$title.'</h3>';
        endif;
        if ( $text ) :
            $str .= '<div class="contact-form-text">'.$text.'</div>';
        endif;
        if ( have_rows('forms','option') ) :
            while( have_rows('forms','option') ) : the_row();
                if(get_row_index() == 1){
                    $show = 'show-form';
                } else {
                    $show = '';
                }
                $str .= '<div id="contact-form-'.get_row_index().'" class="contact-form '.$show.'">'.get_sub_field('form','option').'</div>';
            endwhile;
        endif;
        if ( $social ) :
            $str .= '<div class="contact-social">
                <h4 class="contact-social-header">Connect</h4>
                <div class="contact-social-inner flex align-center justify-center">';
                    if(get_field('instagram_link','option')) {
                        $str .= '<a class="social-icon" href="'.get_field('instagram_link','option').'" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>';
                    }; 
                
                    if(get_field('twitter_link','option')) {
                        $str .= '<a class="social-icon" href="'.get_field('twitter_link','option').'" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>';
                    }; 
                    
                    if(get_field('facebook_link','option')) {
                        $str .= '<a class="social-icon" href="'.get_field('facebook_link','option').'" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>';
                    }; 
                
                    if(get_field('pinterest_link','option')) {
                        $str .= '<a class="social-icon" href="'.get_field('pinterest_link','option').'" target="_blank"><i class="fab fa-pinterest" aria-hidden="true"></i></a>';
                    }; 
                $str .= '</div>
            </div>';
        endif;
    $str .= '</div>
</div>';

return $str;
});

function smash_section_contact_forms($title = 'Get In Touch', $text = '', $social = false) {
    ?>
        <div class="contact-form-wrap container-md">
            <div id="contact-form-wrapper">
                <?php if ( $title ) : ?>
                    <h3 class="contact-form-title">
                        <?php echo $title; ?>
                    </h3>
                <?php endif; ?>
                <?php if ( $text ) : ?>
                    <div class="contact-form-text">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
                <?php if ( have_rows('forms','option') ) : ?>
                    <?php while( have_rows('forms','option') ) : the_row(); ?>
                        <?php if(get_row_index() == 1){
                            $show = 'show-form';
                        } else {
                            $show = '';
                        } ?>
                        <div id="contact-form-<?php echo get_row_index(); ?>" class="contact-form <?php echo $show; ?>">
                            <?php the_sub_field('form','option'); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if ( $social ) : ?>
                    <div class="contact-social">
                        <h4 class="contact-social-header">Connect</h4>
                        <div class="contact-social-inner flex align-center justify-center">
                            <?php 
                            if(get_field('instagram_link','option')) {
                                echo '<a class="social-icon" href="' . get_field('instagram_link','option') . '" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>';
                            }; 
                            ?>
                            <?php 
                            if(get_field('twitter_link','option')) {
                                echo '<a class="social-icon" href="' . get_field('twitter_link','option') . '" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>';
                            }; 
                            ?>
                            <?php 
                            if(get_field('facebook_link','option')) {
                                echo '<a class="social-icon" href="' . get_field('facebook_link','option') . '" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>';
                            }; 
                            ?>
                            <?php 
                            if(get_field('pinterest_link','option')) {
                                echo '<a class="social-icon" href="' . get_field('pinterest_link','option') . '" target="_blank"><i class="fab fa-pinterest" aria-hidden="true"></i></a>';
                            }; 
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
}