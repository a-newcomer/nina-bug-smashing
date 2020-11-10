<?php 
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_faq_script', get_template_directory_uri() . '/smash/modules/section_faq/section_faq.js', array(), '1', true );
} );

function smash_section_faq($args = null){
    $title = (!empty($args['title'])) ? $args['title'] : 'Frequently Asked Questions';
    $cta = (!empty($args['cta'])) ? $args['cta'] : 'Ask Your Question';
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    
    if(have_rows('faqs')) : ?>

        <section id="faq-module">
            <div class="page-faq-header">
                <div class="page-faq-header-inner container-lg">
                    <h2 class="page-faq-title"><?php echo $title; ?></h2>
                    <a href="<?php echo $link; ?>" class="page-faq-cta animate-right"><?php echo $cta; ?></a>
                </div>
            </div>
            <div class="page-faq-wrapper container-lg">
                <?php 
                $rows = get_field('faqs');
                $row_count = count($rows);
                if($row_count % 2 == 0) {
                    $row_half = $row_count / 2;
                } else {
                    $row_half = round($row_count / 2);
                }
                $loop_index = 0;
                while(have_rows('faqs')) : the_row('faqs'); 

                    if($loop_index == 0) {
                        echo '<div id="faq-col-1" class="faq-col toggle-wrap">';
                    } 

                    if($loop_index == $row_half) {
                        echo '</div><div id="faq-col-2" class="faq-col">';
                    } ?>

                    <div class="faq-item toggle-block">
                        <h4 class="faq-title toggle-trigger flex align-center justify-between">
                            <span><?php the_sub_field('question'); ?></span>
                            <svg class="icon"><use xlink:href="#down-angle" /></svg>
                        </h4>
                        <div class="faq-text toggle-item">
                            <p><?php the_sub_field('answer'); ?></p>
                        </div>
                    </div>

                    <?php if($loop_index >= $row_count) {
                        echo '</div>';
                    } ?>

                <?php 
                $loop_index++;
                endwhile; ?>

            </div>
        </section>

    <?php endif;
}