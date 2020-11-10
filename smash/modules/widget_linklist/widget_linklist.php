<?php
// Register and load the widget
function smash_linklist_load_widget() {
    register_widget( 'smash_linklist_widget' );
}
add_action( 'widgets_init', 'smash_linklist_load_widget' );
 
// Creating the widget 
class smash_linklist_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( 
            // Base ID of your widget
            'smash_linklist_widget', 
            
            // Widget name will appear in UI
            __('Smash Linklist', 'smash_linklist_widget_domain'), 
            
            // Widget description
            array( 'description' => __( 'Widget to showcase a linklist.', 'smash_linklist_widget_domain' ), ) 
        );
    }
    
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = $instance['title'];
    
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>

        <div class="linklist-widget double-border">
            <?php if ( get_field('title','widget_'.$this->id) ) : ?>
                <div class="linklist-widget-title"><?php echo get_field('title','widget_'.$this->id); ?></div>
            <?php endif; ?>
            <?php if ( have_rows('links', 'widget_'.$this->id) ) : ?>
                <div class="linklist-widget-links flex-col align-center justify-start">
                    <?php while( have_rows('links', 'widget_'.$this->id) ) : the_row(); ?>
                        <a href="<?php the_sub_field('link', 'widget_'.$this->id); ?>" class="linklist-widget-link"><?php the_sub_field('label', 'widget_'.$this->id); ?></a>
                    <?php endwhile; ?>
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
} // Class smash_linklist_widget ends here