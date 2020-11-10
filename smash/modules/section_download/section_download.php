<?php 

function smash_section_download(){
    ?>
        <section id="download">
            <div class="download-container flex align-center justify-center">
                <?php if ( get_field('download_image','option') ) : ?>
                    <div class="download-image" data-bgratio="1" style="background: url(<?php the_field('download_image','option'); ?>) no-repeat center/cover;"></div>
                <?php endif; ?>
                <div class="download-body">
                    <?php if ( get_field('download_title','option') ) : ?>
                        <h2 class="download-title">
                            <?php echo get_field('download_title','option'); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ( get_field('download_text','option') ) : ?>
                        <div class="download-text">
                            <?php echo get_field('download_text','option'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_field('download_cta','option') && get_field('download_cta_link','option') ) : ?>
                        <a href="<?php echo get_field('download_cta_link','option'); ?>" class="btn btn-primary download-cta"><?php echo get_field('download_cta','option'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="download-bg flex align-center">
                <div class="download-bg-inner"></div>
            </div>
        </section>
    <?php
}