<?php smash_block_hero(['post' => $post]) ?>
<section class="contact-wrapper container-lg">
    
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
            <div class="map-box" style="background: url('http://magon.test/wp-content/uploads/2020/10/nina-magon-location-image.png'), no-repeat center/cover;">
                <!-- <img src="/wp-content/uploads/2020/10/nina-magon-location-image.png" alt=""> -->
            </div>
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
            <div class="map-box" style="background: url('http://magon.test/wp-content/uploads/2020/10/nina-magon-location-image.png'), no-repeat center/cover;">
                <!-- <img src="/wp-content/uploads/2020/10/nina-magon-location-image.png" alt=""> -->
            </div>
        </section>
        
    </div>
    <script type='text/javascript' >

        jQuery(function($){
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
    <div class="careers-image" style="background: url(<?php the_post_thumbnail_url('large'); ?>) no-repeat center/cover;">
        <h2>Careers</h2>
        <hr class="x-short" />
    </div>
    <div class="careers-content">
        <p><?php the_content(); ?></p>
        <a href="#" ><button class="btn-primary nina-btn">Sample cta</button></a>

    </div>
</section>
