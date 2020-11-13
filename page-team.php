<?php
/**
 * Template name: Team
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('team'); ?>>
	<!-- The bg-position of the below header image has been changed in the SCSS to resemble the design - remove if you want to edit photo. -->
    <?php smash_block_hero(['post' => $post]) ?>

    <!-- now add the block of text under the header-->
    <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
    <main>
    <span id="nmsc-section-2"></span>
        <section class="team-container container-lg">

            <?php

            // check if the repeater field has rows of data
            if( have_rows('team_members') ):

                // loop through the rows of data
                while ( have_rows('team_members') ) : the_row();
                //echo var_dump(get_sub_field('image'));
                    // display a sub field value ?>
                    <div class="team-block flex-col justify-center align-center">
                        <?php if(get_sub_field('image')) : $image = get_sub_field('image'); endif; ?>
                            <div class="img-box" data-bgratio="1.5" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                            <div class="team-shade">
                                <div class="team-shade-inner">
                                    <p><?php if(get_sub_field('full_description')) : $full_description = get_sub_field('full_description'); endif; ?>
                                    <p><?php echo $full_description; ?></p></p></div>
                                </div>
                            </div>
                            <div class="text-box flex-col justify-center align-center">
                                <?php if(get_sub_field('position')) : $position = get_sub_field('position'); endif; ?>
                                    <h5><?php echo $position; ?></h5>
                                <?php if(get_sub_field('name')) : $name = get_sub_field('name'); endif; ?>
                                <h4><?php echo $name; ?></h4>
                                <?php if(get_sub_field('teaser_description')) : $teaser_description = get_sub_field('teaser_description'); endif; ?>
                                <p><?php echo $teaser_description; ?></p>
                                <div class="plus">+</div>
                            </div>
                    </div>
                <?php endwhile;

            else :

                // no rows found

            endif;

            ?>

        </section><!-- End services-container -->
        <span id="nmsc-section-3"></span>
    </main>
</article><!-- #post-<?php the_ID(); ?> -->
<script type="text/javascript">
    jQuery(function($){
        let blocks = $('.team-block');
        blocks.each(function(){
            let _ = $(this);
            let shade = _.find('.team-shade');
            let plus = _.find('.plus');
            plus.click(function(){
                shade.fadeToggle();
            })
        })
    })
    // console.log('team page script loaded')
    // const pics = document.querySelectorAll('.team-block');
    // const pluses = document.querySelectorAll('.plus');
    // const overlays =  document.querySelectorAll('.team-shade');
    //     Array.from(overlays).forEach(ol => {
    //         //const plus = document.querySelector('.plus');
    //         //var overlay =  document.querySelector('.team-shade');
    //         ol.addEventListener('click', function(e) {
    //         // this.classList.add('overlay');
    //             if(this.style.opacity == 1) {
    //                 this.style.opacity = 0;
    //             } else if (this.style.opacity == 0){
    //                 this.style.opacity = 1;
    //             }

    //         })

    //     })
</script>
<?php
get_footer();
