<?php
/**
 * Template Name: Webinars
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
                        <h3>TLG WEBINARS</h3>
                        <?php
                        $events = get_posts(array(
                            'post_type' => 'espresso_events',
                            'post_status' => 'publish',
                            'order' => 'ASC'
                        ));
                        ?>
                        <div class="webinars-list">
                            <?php if ($events): ?>
                                <?php global $wpdb; ?>
                                <?php foreach ($events as $event): ?>
                                    <?php
                                    $table = $wpdb->prefix . 'esp_datetime';
                                    $event_dates = $wpdb->get_row("SELECT * FROM " . $table . " WHERE EVT_ID=$event->ID");
                                    $start_date = date_create($event_dates->DTT_EVT_start);
                                    $end_date = date_create($event_dates->DTT_EVT_end);
                                    ?>
                                    <?php $featured_img_url = get_the_post_thumbnail_url($event->ID, 'full'); ?>
                                    <div class="webinars-list-items">
                                        <img src="<?php echo $featured_img_url; ?>" alt="events-1.jpg">
                                        <div class="webinar-overlay">
                                            <div class="webinar-overlay-content">
                                                <span class="date"><?php echo date_format($start_date, 'd M Y'); ?></span>
                                                <div class="breaker"></div>
                                                <h4><?php echo $event->post_title; ?></h4>
                                                <span class="time"><?php echo date_format($start_date, 'g:i a'); ?> - <?php echo date_format($end_date, 'g:i a'); ?></span>
                                                <a class="view-webinar-btn" href="<?php echo get_permalink($event->ID); ?>">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>