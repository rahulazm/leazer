<?php
/**
 * Template Name: Home Page
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
            <div class="middle-menu">
                <?php if (have_rows('home_add_pages_links')): ?>
                    <ul>
                        <?php while (have_rows('home_add_pages_links')) : the_row(); ?>
                            <li><a href="<?php the_sub_field('rep_sub_page_link'); ?>"><?php the_sub_field('rep_sub_page_name'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="content-wrapper">
                        <div class="tlg-calender">
                            <h3><?php the_field('tlg_cal_main_title'); ?></h3>
                            <p><?php the_field('tlg_sub_title_sub_title'); ?></p>
                            <div class="event-lists">
                                <?php
                                $events = get_posts(array(
                                    'post_type' => 'espresso_events',
                                    'post_status' => 'publish',
                                    'order' => 'DESC',
                                    'posts_per_page' => 2
                                ));
                                ?>

                                <?php foreach ($events as $event): ?>
                                    <?php
                                    // print_r($event);
                                    $table = $wpdb->prefix . 'esp_datetime';
                                    $event_dates = $wpdb->get_row("SELECT * FROM " . $table . " WHERE EVT_ID=$event->ID");

                                    $start_date = date_create($event_dates->DTT_EVT_start);
                                    $end_date = date_create($event_dates->DTT_EVT_end);
                                    ?>
                                    <?php $featured_img_url = get_the_post_thumbnail_url($event->ID, 'full'); ?>
                                    <div class="homepage-event">
                                        <div class="event-image">
                                            <img src="<?php echo $featured_img_url; ?>" alt="events-1.jpg" />
                                            <div class="event-overlay">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/CalenderIcon.png" alt="CalenderIcon.png" />
                                                <span class="home-event-date"><?php echo date_format($start_date, 'd'); ?></span>
                                                <span class="home-event-month"><?php echo date_format($start_date, 'M'); ?></span>
                                                <span class="home-event-year"><?php echo date_format($start_date, 'Y'); ?></span>
                                            </div>
                                        </div>
                                        <div class="event-content">
                                            <h4><?php echo $event->post_title; ?></h4>
                                            <span><?php echo date_format($start_date, 'g:i a'); ?> - <?php echo date_format($end_date, 'g:i a'); ?></span>
                                            <div class="breaker"></div>
                                            <p class="event-excerpt"><?php echo substr($event->post_content, 0, 300); ?>(<a href="<?php echo get_permalink($event->ID); ?>">more…</a>)</p>
                                            <a class="view-button" href="<?php echo get_permalink($event->ID); ?>">View Details</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="monthly-leader-board">
                            <h3>Monthly Leader Board</h3>
                            <p>May 2017</p>
                            <div class="list-headers">
                                <h4>AGENT</h4>
                                <h4>AP</h4>
                                <h4>AP COUNT</h4>
                            </div>
                            <div class="home-agents-list">
                                <?php
                                if (have_rows('home_add_agents_repater')):
                                    $counter = 0;
                                    while (have_rows('home_add_agents_repater')) : the_row();
                                        ?>
                                        <div class="home-agent">
                                              <div class="home-count"><?php echo str_pad( $counter + 1, 2, 0, STR_PAD_LEFT); ?></div>
                                            <div class="home-agent-image"><img src="<?php the_sub_field('sub_rep_agent_photo'); ?>" alt="ThumnailHolder.png" /></div>
                                            <div class="home-agent-name"><?php the_sub_field('home_sub_rep_agent_name'); ?></div>
                                            <div class="home-agent-ap"><?php the_sub_field('home_rep_sub_agent_ap'); ?></div>
                                            <div class="home-agent-apcount"><?php the_sub_field('home_sub_rep_agent_count'); ?></div>
                                        </div>
                                        <?php
                                        $counter++;
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <div class="print-button">
                                <a target="_blanck" href="<?php the_field('print_my_leader_board_button_files'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/printer.png" alt="printer.png" />&nbsp;&nbsp;&nbsp;<?php the_field('print_my_leader_board_button_text'); ?></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>