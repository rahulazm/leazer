<?php
/**
 * Template Name: Bill Me Later Enrollment
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
                        <div class="bill-me-content">
                            <?php the_content(); ?>
                            <div class="special-box">
                                <?php the_field('page_bill_policy_message'); ?>
                            </div>
                            <div class="bill-form-text">
                                <?php the_field('page_bill_bill_details'); ?>
                            </div>
                            <div class="row bill-form">
                                <?php $form_shortcode = get_field('bill_page_bill_form_short_code'); ?>
                                <?php echo do_shortcode($form_shortcode); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<style>
    .bill-form .col-sm-6 > span{display: inline;}
</style>
<?php get_footer(); ?>