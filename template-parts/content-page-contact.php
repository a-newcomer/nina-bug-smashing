<?php smash_block_hero(['post' => $post]) ?>
<section class="contact-wrapper container-lg">
    <div class="contact-body">
        <?php if( have_rows('locations_tabs') ): ?>
            <ul class="contact-tabs">
                <?php $i = 1; while ( have_rows('locations_tabs' ) ) : the_row(); ?>
                <?php echo '<li class="contact-tab-link" data-tab="tab-' . $i . '">' . get_sub_field( "location_city" ) . '</li>';
                $i++;
                endwhile; ?>
            </ul>
            <?php  $i = 1;
            while ( have_rows('locations_tabs') ) : the_row(); ?>
                <?php echo '<div class="contact-tab-content" id="tab-' . $i . '">'; ?>
                <div class="contact-box">
                    <div class="contact-text">
                        <h4><strong><?php the_sub_field( "location_city" ); ?></strong></h4>
                        <p><?php the_sub_field( "location_text" ); ?></p>
                    </div>
                    <div class="contact-info">
                        <div class="info-inner">
                            <h6><?php the_sub_field( "location_phone" ); ?></h6>
                            <h6><?php the_sub_field( "location_email" ); ?></h6>
                            <h6><?php the_sub_field( "handle" ); ?></h6>
                        </div>
                        <div class="address">
                            <h6><?php the_sub_field( "address_line_1" ); ?></h6>
                            <h6><?php the_sub_field( "address_line_2" ); ?></h6>
                        </div>
                        <div class="open-time">
                            <h6><?php the_sub_field( "opening_days" ); ?></h6>
                            <h6><?php the_sub_field( "opening_hours" ); ?></h6>
                        </div>
                    </div> <!-- end contact-info -->
                </div> 
                    <?php $backgroundImg = get_sub_field('location_map'); ?>
                <div class="map-box" style="background: url('<?php echo $backgroundImg['url']; ?>') no-repeat center/cover;">

                <!-- <img src="/wp-content/uploads/2020/10/nina-magon-location-image.png" alt=""> -->

                </div> 
                <?php echo '</div>' ?>
            <?php $i++;
            endwhile; ?>
        <?php else :
            echo '<h5>No Contact Locations Yet</h5>';
        endif; ?>
    </div> <!-- end contact-body? -->
    <script type='text/javascript' >
        jQuery(function($){
            $('li.contact-tab-link').first().addClass('active');
            $('#tab-1').addClass('active');
            $('ul.contact-tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('ul.contact-tabs li').removeClass('active');
            $('.contact-tab-content').removeClass('active');

            $(this).addClass('active');
            $("#"+tab_id).addClass('active');
            })
        });
     </script>
    
</section><!-- end of contact-wrapper -->

<section class="careers-wrapper">
    <?php $careersbgImg = get_field('careers_image'); ?>
    <div class="careers-image" style="background: url(<?php echo $careersbgImg['url']; ?>) no-repeat center/cover;">
        <div class="shade">
        <h2>Careers</h2>
        <hr class="x-short" />
        </div>
        
    </div>
    <div class="careers-content">
        <p><?php the_content(); ?></p>
        <a href="<?php the_field( "careers_link" ); ?>" class="btn-primary btn-nina" >
            <span><?php the_field( "careers_button_text" ); ?></span>
            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
        </a>
    </div>
</section>
