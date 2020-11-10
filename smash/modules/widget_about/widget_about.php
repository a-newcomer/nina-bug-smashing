<?php
// Register and load the widget
function smash_about_load_widget() {
    register_widget( 'smash_about_widget' );
}
add_action( 'widgets_init', 'smash_about_load_widget' );
 
// Creating the widget 
class smash_about_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( 
            // Base ID of your widget
            'smash_about_widget', 
            
            // Widget name will appear in UI
            __('Smash About Me', 'smash_about_widget_domain'), 
            
            // Widget description
            array( 'description' => __( 'Widget to showcase a bio.', 'smash_about_widget_domain' ), ) 
        );
    }
    
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
    
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>

        <div class="about-widget double-border">
            <?php if ( get_field('image', 'widget_'.$this->id) ) : $image = get_field('image', 'widget_'.$this->id); ?>
                <div class="about-widget-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
            <?php endif; ?>
            <?php if ( get_field('title','widget_'.$this->id) ) : ?>
                <div class="about-widget-title"><?php echo get_field('title','widget_'.$this->id); ?></div>
            <?php endif; ?>
            <?php if ( get_field('sub_title', 'widget_'.$this->id) ) : ?>
                <div class="about-widget-sub-title">
                    <?php echo get_field('sub_title', 'widget_'.$this->id); ?>
                </div>
            <?php endif; ?>
            <?php if ( get_field('text', 'widget_'.$this->id) ) : ?>
                <div class="about-widget-text">
                    <?php echo get_field('text', 'widget_'.$this->id); ?>
                </div>
            <?php endif; ?>
            <?php if ( get_field('cta', 'widget_'.$this->id) && get_field('cta_link', 'widget_'.$this->id) ) : ?>
                <a class="about-widget-cta btn btn-primary animate-right" href="<?php echo get_field('cta_link', 'widget_'.$this->id); ?>">
                    <span><?php echo get_field('cta', 'widget_'.$this->id); ?></span>
                    <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                </a>
            <?php endif; ?>
        </div>

        <?php
        echo $args['after_widget'];
    }
            
    // Widget Backend 
    public function form( $instance ) {
        
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class smash_about_widget ends here