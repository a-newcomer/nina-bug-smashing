<?php

function smash_section_instagram($short_code = '') {
    if ( $short_code ) : ?>
        <section id="instagram_section" class="container-xl">
            <h2 class="section-header">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                Latest on Insta
            </h2>
            <?php if ( have_rows('instagram_feeds','option') ) : ?>
                <div class="flex-wrap align-start justify-center">
                    <?php while( have_rows('instagram_feeds','option') ) : the_row(); 
                    $handle = get_sub_field('handle');
                    $feed = get_sub_field('feed');
                    ?>
                        <div class="instagram-code">
                            <?php if($feed) {
                                echo do_shortcode($feed);
                            } ?>
                            <?php if($handle) {
                                echo '<a class="social-icon" href="https://www.instagram.com/' . $handle . '" target="_blank">Follow @' . $handle . '</a>';
                            } ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endif;
}