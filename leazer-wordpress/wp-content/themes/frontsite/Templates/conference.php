<?php
/**
 * Template Name: Conference
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            
    <?php while (have_posts()) : the_post(); ?>
        <section class="registration_main" id="s-image">
            <div class="registration_top">
                <div class="regi_left">
                    <?php
                    $left_side_conference_image = get_field('left_side_conference_image');
                    if (!empty($left_side_conference_image)):
                        ?>
                        <img src="<?php echo $left_side_conference_image['url']; ?>" alt="desc">
                    <?php endif; ?>
                    <div class="left_Rcontent">
                        <h3><?php
                            $left_side_conference_title = get_field('left_side_conference_title');
                            if (!empty($left_side_conference_title)):
                                ?>
                                <?php echo $left_side_conference_title; ?>           
                            <?php endif; ?></h3>
                        <p> <?php
                            $left_side_conference_sub_title = get_field('left_side_conference_sub_title');
                            if (!empty($left_side_conference_sub_title)):
                                ?>
                                <?php echo $left_side_conference_sub_title; ?>           
                            <?php endif; ?> <span> <?php
                                $left_side_conference_description = get_field('left_side_conference_description');
                                if (!empty($left_side_conference_description)):
                                    ?>
                                    <?php echo $left_side_conference_description; ?>           
                                <?php endif; ?></span></p>
                    </div>
                </div>
                <div class="regi_center">
                    <p>The Leazer Group will be hosting their 2018 Winter Conference at the Raleigh Marriott Crabtree, January 26th& 27th! This event is designed to coach and train agents to help them grow professionally and personally and becoming an agent of change.  From this event you will be given the tools to help increase your sales with product knowledge, tips from all of our top producers, be coached and trained by the TLG leaders, building an agency and most importantly associating with Art Leazer, Kimberly Narretto, Tom Brown and many more!</p>
                </div>
                <div class="regi_right">
                    <div class="inner_regi">
                        <?php
                        $right_side_conference_image = get_field('right_side_conference_image');
                        if (!empty($right_side_conference_image)):
                            ?>
                            <img src="<?php echo $right_side_conference_image['url']; ?>" alt="desc">
                        <?php endif; ?>
                        <div class="right_Rcontent">
                            <h3><?php
                                $right_side_conference_title = get_field('right_side_conference_title');
                                if (!empty($right_side_conference_title)):
                                    ?>
                                    <?php echo $right_side_conference_title; ?>           
                                <?php endif; ?></h3>
                            <p><?php
                                $right_side_conference_sub_title = get_field('right_side_conference_sub_title');
                                if (!empty($right_side_conference_sub_title)):
                                    ?>
                                    <?php echo $right_side_conference_sub_title; ?>           
                                <?php endif; ?><br><?php
                                $right_side_conference_description = get_field('right_side_conference_description');
                                if (!empty($right_side_conference_description)):
                                    ?>
                                    <?php echo $right_side_conference_description; ?>           
                                <?php endif; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="registration_bottom">
                        <div  class="regi_title">REGISTRATION</div>
                        <?php if (get_field('registration_detail')): ?>
                            <?php
                            $i = 0;
                            while (has_sub_field('registration_detail')):
                                $registration_icon_image = get_sub_field('registration_icon_image');
                                $registration_title = get_sub_field('registration_title');
                                $registration_sub_title = get_sub_field('registration_sub_title');
                                $registration_description_title = get_sub_field('registration_description_title');
                                $registration_link=get_sub_field('registration_link_new');
                                $i++;
                                ?>
                                <?php if ($i % 2 != 0) { ?>
                                    <div class="regi_box odd">
                                    <?php } else { ?>
                                        <div class="regi_box even">
                                        <?php } ?>
                                        <div class="regi_color"><img src="<?php echo $registration_icon_image['url']; ?>">
                                        </div>
                                        <div class="regi_innertitle">
                                            <h2><?php echo $registration_title; ?></h2>
                                            <p><?php echo $registration_sub_title; ?></p>
                                            <p><a href="<?php echo $registration_link; ?>" class="read_more" target="new">register today</a></p>

                                        </div>
                                        <div class="regi_inner">
                                            <ul>
                                                <li><?php echo $registration_description_title; ?></li>
                                                <?php
                                                while (has_sub_field('registration_details')):
                                                    $registration_description_details = get_sub_field('registration_description_details');
                                                    ?>
                                                    <li><?php echo $registration_description_details; ?></li>
                                                <?php endwhile; ?>
                                            </ul>
                                            
                                        </div>
                                         
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                            <!--<a href="#" class="read_more">register today</a>-->
                        </div>

                    </div>
                </div>
        </section>
        <section class="venue_main" style="background: url('<?php echo get_template_directory_uri(); ?>/images/front1.png') no-repeat center;">
        <!-- <section class="venue_main">-->
            <div class="container">
                <div class="col-md-9 center-block">
                    <?php
                    $venue_title = get_field('venue_title');
                    if (!empty($venue_title)):
                        ?>
                        <h2><?php echo $venue_title; ?></h2>
                    <?php endif; ?>

                    <?php
                    $venue_description = get_field('venue_description');
                    if (!empty($venue_description)):
                        ?>
                        <?php echo $venue_description; ?>
                    <?php endif; ?>
                    <a href="<?php
                    $venue_book_now_link = get_field('venue_book_now_link');
                    if (!empty($venue_book_now_link)):
                        ?>
                        <?php echo $venue_book_now_link; ?>
                       <?php endif; ?>" class="read_more">Book now</a>
                </div>
            </div>
        </section>
        <section class="orange_bg">
            <div class="container">
                <div class="col-md-12">
                    <div class="orange_txt"><?php
                        $venue_address = get_field('venue_address');
                        if (!empty($venue_address)):
                            ?>
                            <?php echo $venue_address; ?>
                        <?php endif; ?> <a href="tel:<?php $venue_contact_info = get_field('venue_contact_info');
                if (!empty($venue_contact_info)):
                            ?><?php echo $venue_contact_info; ?>
                               <?php endif; ?>"><?php
                               $venue_contact_info = get_field('venue_contact_info');
                               if (!empty($venue_contact_info)):
                                   ?>
                                <?php echo $venue_contact_info; ?>
        <?php endif; ?></a> 
                    </div>
                </div>
        </section>
        <section class="map_section">
            <iframe src="<?php $venue_address_map = get_field('venue_address_map');
        if (!empty($venue_address_map)): ?><?php echo $venue_address_map; ?><?php endif; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
    <?php endwhile; ?>                 
<?php endif; ?>
<?php get_footer(); ?>