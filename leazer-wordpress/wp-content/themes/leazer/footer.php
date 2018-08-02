<footer>
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">  
                    <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'footer-menu', 'container' => false)); ?>
                    <p>
                        <?php
                        $privacy_page_text = get_field('privacy_page_text', 'option');
                        $privacy_page_link = get_field('privacy_page_link', 'option');
                        $terms_page_text = get_field('terms_page_text', 'option');
                        $terms_page_link = get_field('terms_page_link', 'option');
                        ?>
                        <?php if (!empty($privacy_page_text)) { ?>
                        <span><a href="<?php echo $privacy_page_link; ?>"><?php echo $privacy_page_text; ?></a></span>
                        <?php } ?>
                        <?php if (!empty($terms_page_text)) { ?>
                        <span><a href="<?php echo $terms_page_link; ?>"><?php echo $terms_page_text; ?></a></span>
                        <?php } ?>
                    </p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <?php $blog_setting = get_field('footer_latest_blog_option_disable', 'option'); ?>
                    <?php if ($blog_setting == 1) { ?>
                    <div class="footer-blog-entries">
                        <h4><?php the_field('footer_latest_blog_title', 'option'); ?></h4>
                        <?php
                        $args = array('numberposts' => '2', 'order' => 'DESC');
                        $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) {
                            $blog_img = get_the_post_thumbnail_url($recent['ID']); 
                            ?>
                            <div class="blog-entry">
                                <div class="blog-featured-image">
                                    <img src="<?php echo $blog_img; ?>" alt="blog-entry-footer-1.png" />
                                </div>
                                <div class="blog-text">
                                    <h5><?php echo substr($recent['post_title'], 0, 20); ?> (<?php echo get_the_date('d.m.y'); ?>)</h5>
                                    <p><?php echo substr($recent['post_content'], 0, 50) . '...'; ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php } ?>
                    <div class="social-links">
                        <ul>
                            <?php
                            if (have_rows('add_social_icon_repeater', 'option')):
                                while (have_rows('add_social_icon_repeater', 'option')) : the_row();
                                    ?>
                                    <li><a href="<?php the_sub_field('icon_link', 'option'); ?>"><img src="<?php the_sub_field('icon_image', 'option'); ?>" alt="twitter-link.png" /></a></li>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <?php
                    $twiiter_setting = get_field('twitter_feed_disable', 'option');
                    if ($twiiter_setting == 1) {
                        ?>
                        <div class="twitter-feed">
                            <h4><?php the_field('twitter_feed_main_title', 'option'); ?></h4>
                            <a class="twitter-timeline" href="<?php the_field('twitter_feed_url', 'option'); ?>" data-tweet-limit="2" data-width="300" data-height="200" data-cards="hidden" data-chrome="noheader nofooter"> </a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>Say Hello</h4>
                        <?php
                        $footer_phone_number = get_field('footer_phone_number', 'option');
                        $footer_fax_number = get_field('footer_fax_number', 'option');
                        $footer_email = get_field('footer_email_id', 'option');
                        $footer_address = get_field('footer_address', 'option');
                        ?>
                        <?php if (!empty($footer_phone_number)) { ?>
                        <img class="foot-image" src="<?php echo get_template_directory_uri(); ?>/images/phone_bug.png" alt="phone-link.png" />
                        <p class="details"><a class="tel:<?php echo $footer_phone_number; ?>"><?php echo $footer_phone_number; ?></a></p>
                        <?php } ?>
                        <?php if (!empty($footer_fax_number)) { ?>
                        <img class="foot-image" src="<?php echo get_template_directory_uri(); ?>/images/fax_bug.png" alt="fax.png" />
                        <p class="details"><a href="tel:<?php echo $footer_fax_number; ?>"><?php echo $footer_fax_number; ?></a></p>
                        <?php } ?>
                        <?php if (!empty($footer_phone_number)) { ?>
                        <img class="foot-image" src="<?php echo get_template_directory_uri(); ?>/images/email_bug.png" alt="email-link.png" />
                        <p class="details"><a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a></p>
                        <?php } ?>
                        <?php if (!empty($footer_address)) { ?>
                        <img class="foot-image" src="<?php echo get_template_directory_uri(); ?>/images/location_bug.png" alt="location.png" />
                        <p class="details"><?php echo $footer_address; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <p class="copyright"><?php the_field('copyright_content', 'option') ?></p>
                <ul class="bottom-footer-social">
                    <?php
                    if (have_rows('add_social_icon_repeater_copy','option')):
                        while (have_rows('add_social_icon_repeater_copy','option')) : the_row();
                            ?>
                            <li><a href="<?php the_sub_field('icon_link','option'); ?>"><img src="<?php the_sub_field('icon_image','option'); ?>" alt="footer-fb.png" /></a></li>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
</div><!-- EOF : main ID -->
<?php wp_footer(); ?>
</body>
</html>