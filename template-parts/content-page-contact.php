<?php smash_block_hero(['post' => $post]) ?>
<section class="contact-wrapper container-lg">
    <!-- 
        my acf fields
        locations_tabs - repeater tab
        location_city
        location_text
        location_phone
        location_email
        handle
        address_line_1
        address_line_2
        opening_days
        opening_hours
        location_map
     -->
     <div class="contact-body">
        <ul class="contact-tabs">
            <?php if( have_rows('locations_tabs') ):
                $i = 1;
                while ( have_rows('locations_tabs' ) ) : the_row(); ?>
                <?php echo '<li class="contact-tab-link" data-tab="tab-' . $i . '">' . get_sub_field( "location_city" ) . '</li>';
                $i++;
                endwhile; ?>
        </ul>
            <?php  $i = 1;
                while ( have_rows('locations_tabs') ) : the_row(); ?>
                <?php echo '<section class="contact-tab-content" id="tab-' . $i . '">'; ?>
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
                <?php echo '</section>' ?>
                <?php $i++;
                endwhile; ?>
     </div> <!-- end contact-body? -->
                <?php else :
                echo '<h5>No Contact Locations Yet</h5>';
                endif; ?>

    <!-- hard-coded layout
    <div class="contact-body">
        <ul class="contact-tabs">
            <li class="contact-tab-link active" data-tab="tab-1">Houston</li>
            <li class="contact-tab-link" data-tab="tab-2">San Francisco</li>
        </ul>
        <section class="contact-tab-content active" id="tab-1">
            <div class="contact-box">
                <div class="contact-text">
                    <h4><strong>Houston</strong></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="contact-info">
                    <div class="info-inner">
                        <h6>713.722.0511</h6>
                        <h6>info@ninamagon.com</h6>
                        <h6>@ninamagon.com</h6>
                    </div>
                    <div class="address">
                        <h6>1200 Blalock Suite 213,</h6>
                        <h6>Houston, TX 77055</h6>
                    </div>
                    <div class="open-time">
                        <h6>Mon - Fri</h6>
                        <h6>8:30am - 5:30pm</h6>
                    </div>
                </div>
            </div>
            <div class="map-box" style="background: url('http://magon.test/wp-content/uploads/2020/10/nina-magon-location-image.png'), no-repeat center/cover;">  -->

                <!-- <img src="/wp-content/uploads/2020/10/nina-magon-location-image.png" alt=""> -->

            <!-- </div>
        </section>
        <section class="contact-tab-content flex-col" id="tab-2">
            <div class="contact-box">
                <div class="contact-text">
                    <h4><strong>San Francisco</strong></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="contact-info">
                    <div class="info-inner">
                        <h6>713.722.0511</h6>
                        <h6>info@ninamagon.com</h6>
                        <h6>@ninamagon.com</h6>
                    </div>
                    <div class="address">
                        <h6>1200 Somewhere Suite 213,</h6>
                        <h6>San Francisco,CA 77055</h6>
                    </div>
                    <div class="open-time">
                        <h6>Mon - Thu</h6>
                        <h6>9:30am - 6:30pm</h6>
                    </div>
                </div>
            </div>
            <div class="map-box" style="background: url('http://magon.test/wp-content/uploads/2020/10/nina-magon-location-image.png'), no-repeat center/cover;"> -->
                <!-- <img src="/wp-content/uploads/2020/10/nina-magon-location-image.png" alt=""> -->

            <!-- </div>
        </section> -->
        
    <!--</div> end contact-body -->
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
        <a href="<?php the_field( "careers_link" ); ?>" >
            <button class="btn-primary nina-btn flex-row justify-center align-center">
                <h5><?php the_field( "careers_button_text" ); ?></h5>
                <svg class="icon"><use xlink:href="#right-arrow" /></svg>
            </button>
        </a>

    </div>
</section>
