<?php
/**
 * Template Name: Forms Depot
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
                        <div class="form-depot-accordian">
                            <div class="accordion">
                                <?php
                                if (have_rows('add_forms_depot_repeater')):
                                    $inc= 1;
                                    while (have_rows('add_forms_depot_repeater')) : the_row();
                                        ?>
                                        <div class="accordion-section">
                                            <a class="accordion-section-title" href="#accordion-<?php echo $inc; ?>"><?php the_sub_field('rep_sub_main_forms_title'); ?><span class="accordian-plus">+</span></a>
                                            <div id="accordion-<?php echo $inc; ?>" class="accordion-section-content">  
                                                <?php the_sub_field('rep_sub_description'); ?>
                                            </div>
                                        </div>
                                        <?php
                                        $inc++;
                                    endwhile;
                                endif;
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>