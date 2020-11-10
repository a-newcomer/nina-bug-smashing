<?php

function smash_section_featured_cats() {
    $terms = get_field('featured_categories','option');    
    if($terms) :
    ?>
        <section id="featured_cats">
            <div class="featured-cats-container flex align-center justify-center">
                <?php foreach( $terms as $term ): ?>
                    <a href="<?php echo get_term_link($term); ?>" class="featured-cat" style="background: url(<?php the_field('image', $term); ?>0 no-repeat center/cover;">
                        <div class="featured-cat-overlay"></div>
                        <div class="featured-cat-inner flex-col align-center justify-center">
                            <div>Latest In</div>
                            <div class="featured-cat-title"><?php echo $term->name; ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php
    endif;
}