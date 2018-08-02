<?php
/**
 * Template Name: Quote 911
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
                        <div class="quote-content">
                            <h2><?php the_field('quote_add_main_title'); ?></h2>
                            <h4><?php the_field('quote_sub_title'); ?></h4>
                            <img src="<?php the_field('quote_teliphone_image'); ?>" alt="help-phone.jpg" /><strong class="big-letters"><?php the_field('teliphone_content_and_number'); ?></strong>
                           <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>