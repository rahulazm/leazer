<?php
/**
 * Template Name: TLG Leads
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="content-wrapper">
                        <div class="leads-content width80">
                            <div class="col-md-7 imgwrapper">
                                <img src="<?php the_field('tlg_add_left_image'); ?>" alt="leads-images.png" />
                            </div>
                            <div class="col-md-5 contwrapper">
                                <h3><?php the_field('tlg_main_right_content_title'); ?></h3>
                                <strong><?php the_field('tlg_right_content_sub_title'); ?></strong>
                                <?php the_field('tlg_main_right_content'); ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="leads-options-accordian">
                                <h4><?php the_field('tlg_mortgage_main_title'); ?></h4>
                                <div class="accordion">
                                    <?php
                                    if (have_rows('tlg_tlg-mortgage_add_repeater')):
                                        $inc = 1;
                                        while (have_rows('tlg_tlg-mortgage_add_repeater')) : the_row();
                                            ?>
                                            <div class="accordion-section">
                                                <a class="accordion-section-title" href="#accordion-<?php echo $inc; ?>"><span class="accordian-plus">+</span> <img src="<?php the_sub_field('rep_sub_mor_title_icon'); ?>" alt="diamondIcon.png" /> <?php the_sub_field('rep_sub_mor_main_title'); ?></a>
                                                <div id="accordion-<?php echo $inc; ?>" class="accordion-section-content">
                                                    <?php the_sub_field('rep_sub_mor_description'); ?>
                                                </div><!--end .accordion-section-content-->
                                            </div><!--end .accordion-section-->
                                            <?php
                                            $inc++;
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="lead-guidelines">
                                <h4><?php the_field('leade_cradit_main_title'); ?></h4>
                                <?php the_field('main_lead_cradit_content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>