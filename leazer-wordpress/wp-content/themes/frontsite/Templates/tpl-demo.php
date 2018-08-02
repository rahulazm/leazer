<?php

/**
 * Template Name: Demo Template
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>