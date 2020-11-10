<?php
// Register and load the widget
function smash_shop_load_widget() {
    register_widget( 'smash_shop_widget' );
}
add_action( 'widgets_init', 'smash_shop_load_widget' );
 
// Creating the widget 
class smash_shop_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct( 
            // Base ID of your widget
            'smash_shop_widget', 
            
            // Widget name will appear in UI
            __('Smash Shop', 'smash_shop_widget_domain'), 
            
            // Widget description
            array( 'description' => __( 'Widget to showcase a shop.', 'smash_shop_widget_domain' ), ) 
        );
    }
    
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = $instance['title'];
    
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>

        <div class="shop-widget">
            <?php if ( get_field('title','widget_'.$this->id) ) : ?>
                <div class="shop-widget-title"><?php echo get_field('title','widget_'.$this->id); ?></div>
            <?php endif; ?>
            <div class="shop-widget-body">
                <?php if ( get_field('image', 'widget_'.$this->id) ) : $image = get_field('image', 'widget_'.$this->id); ?>
                    <div class="shop-widget-image" data-bgratio="1.33" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                <?php endif; ?>
                <?php if ( get_field('body', 'widget_'.$this->id) ) : ?>
                    <div class="shop-widget-text">
                        <?php echo get_field('body', 'widget_'.$this->id); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( get_field('cta', 'widget_'.$this->id) && get_field('cta_link', 'widget_'.$this->id) ) : ?>
                <a class="shop-widget-cta btn btn-tertiary" href="<?php echo get_field('cta_link', 'widget_'.$this->id); ?>">
                    <span><?php echo get_field('cta', 'widget_'.$this->id); ?></span>
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
} // Class smash_shop_widget ends here