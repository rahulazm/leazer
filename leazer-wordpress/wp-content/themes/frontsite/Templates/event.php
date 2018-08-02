<?php
/**
 * Template Name: Event
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
      

<section class="calender">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 center-block">
                <div class="find_event">
                    <img src="images/event.png" alt="img">
                </div>
                <div class="event_calender">
                    
              </div>
          </div>
      </div>
  </div>
</section>

<?php endwhile; ?>                 
<?php endif; ?>

<?php get_footer(); ?>