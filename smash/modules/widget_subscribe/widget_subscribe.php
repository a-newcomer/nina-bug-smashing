<?php
// Register and load the widget
function smash_subscribe_load_widget() {
    register_widget( 'smash_subscribe_widget' );
}
add_action( 'widgets_init', 'smash_subscribe_load_widget' );
 
// Creating the widget 
class smash_subscribe_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( 
            // Base ID of your widget
            'smash_subscribe_widget', 
            
            // Widget name will appear in UI
            __('Smash Subscribe', 'smash_subscribe_widget_domain'), 
            
            // Widget description
            array( 'description' => __( 'Widget to showcase subscribe.', 'smash_subscribe_widget_domain' ), ) 
        );
    }
    
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = $instance['title'];
    
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>

        <div class="subscribe-widget">
            <?php if ( get_field('title','widget_'.$this->id) ) : ?>
                <div class="subscribe-widget-title"><?php echo get_field('title','widget_'.$this->id); ?></div>
            <?php endif; ?>
            <?php if ( get_field('text', 'widget_'.$this->id) ) : ?>
                <div class="subscribe-widget-text">
                    <?php echo get_field('text', 'widget_'.$this->id); ?>
                </div>
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
} // Class smash_subscribe_widget ends here