<!-- * * * * THIS IS CURRENTLY UNFINISHED * * * * -->
<!-- <?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'vimeo-script',  get_template_directory_uri().'/smash/js/vimeo-player.js', array(), '20151215', true );
        wp_enqueue_script( 'video-about-script', get_template_directory_uri(). '/smash/js/video-about.js', array('vimeo-script'), '20151215', true );
} ); ?> -->

<?php function smash_block_video_player() { ?>

    <div class="video-block-outer ">
        <div class="about-inner container-xl">

            
        <div class="nm-video-outer nm-player">

            <video id="nm-about-video" poster="<?php the_field('video_poster') ?>" loop muted width="1200" height="800">
            
                <source id="webm-source" src="<?php the_field('video_loop_webm') ?>" type="video/webm" width="1200">
                <source id="mp4-source" src="<?php the_field('video_loop_mp4') ?>" type="video/mp4">
                You need to add  a video, or your browser doesn't support HTML5 video.
                
                
                
            </video>
            <?php if ( get_field('vimeo_link') ) : $iframe = get_field('vimeo_link');

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replace HTML to reudce branding and distractions.
                    $params = array(
                        'rel'       => 0,
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1,
                        'modestbranding' => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    
                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0" id="nm-about-frame" allowfullscreen';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe); 
                    ?>
                
                    <div class="iframe-container" id="iframe-container">
                        <?php echo  $iframe ?>
                    </div>
                    <!-- the below script is now enqueued in smash.php at about line 75 -->
                    <!-- <script src="https://player.vimeo.com/api/player.js"></script>              -->
                    <?php endif; ?>
        </div>
        
                <div class="about-content">
                    
                </div>
            </div>
        </div>
    </div>
<?php } ?>
