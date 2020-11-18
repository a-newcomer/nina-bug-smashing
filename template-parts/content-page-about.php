<span id="nmsc-section-2"></span>
<div class="video-block-outer ">
    <div class="about-inner container-xl">
        
        <section class="nm-video-outer nm-player">
            <!-- If this doesn't work, remove looping function as apparently browsers don't like it -->
            <video id="nm-about-video" poster="<?php the_field('video_poster') ?>" muted="true" loop="true" disablePictureInPicture="true" width="1200" height="800">
            
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
            <?php endif; ?>

            <div class="about-content">
              <span id="nmsc-section-3"></span>  
            </div>

        </section>
    </div>
</div>