<footer <?php
$footer_background_image = get_field('footer_background_image', 'option');
if (!empty($footer_background_image)):
    ?> style="background-image: url(<?php echo $footer_background_image['url']; ?>) "
    <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <?php
                $args = array(
                    'menu_class' => 'full_width footer_menu',
                    'theme_location' => 'footer_menu_front_1',
                );
                wp_nav_menu($args);
                ?>  
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <h4>Latest Blog Entries</h4>
                <?php
                $args = array('posts_per_page' => 2);
                $myposts = get_posts($args);

                foreach ($myposts as $blog) {
                    $blog_id = $blog->ID;
                    $blog_title = $blog->post_title;
                    $blog_content = $blog->post_content;
                    $blog_excerpt = $blog->post_excerpt;
                    $blog_date = $blog->post_date;
                    $blog_image = wp_get_attachment_image_src(get_post_thumbnail_id($blog_id), 'thumbnail');
                    ?>
                    <div class="blog full_width">
                        <?php
                        if (!empty($blog_image)) {
                            ?>
                            <img src="<?php echo $blog_image[0]; ?>" alt="img">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/demo-image6.jpg" alt="img">
                        <?php } ?>
                        <div class="blog_details">
                            <h5><?php echo $blog_title." ".date("m.j.y", strtotime($blog_date)); ?></h5>
                            <p><?php echo $blog_content; ?> </p>
                        </div>
                    </div>
                    <?php
                } wp_reset_query();
                ?>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <h4>Twitter Feed</h4>
                <?php dynamic_sidebar('twitter'); ?>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <h4>Say Hello</h4>
                <ul class="social_link full_width">
                    <li><?php
                        $contact_detail = get_field('contact_detail', 'option');
                        if (!empty($contact_detail)):
                            ?>
                            <a href="tel:<?php echo $contact_detail; ?>           
                           <?php endif; ?>"><img src="<?php echo get_template_directory_uri() . '/images/images/Phone Bug.png' ?>" alt="img"><?php
                               $contact_detail = get_field('contact_detail', 'option');
                               if (!empty($contact_detail)):
                                   ?>
                                   <?php echo $contact_detail; ?>           
                            <?php endif; ?></a></li>
                    <li><?php
                        $contact_number = get_field('contact_number', 'option');
                        if (!empty($contact_number)):
                            ?>
                            <a href="tel:<?php echo $contact_number; ?>           
                           <?php endif; ?>"><img src="<?php echo get_template_directory_uri() . '/images/images/Fax Bug.png' ?>" alt="img"><?php
                               $contact_number = get_field('contact_number', 'option');
                               if (!empty($contact_number)):
                                   ?>
                                   <?php echo $contact_number; ?>           
                            <?php endif; ?></a></li>
                    <li><?php
                        $contact_mail = get_field('contact_mail', 'option');
                        if (!empty($contact_mail)):
                            ?>
                            <a href="mailto:<?php echo $contact_mail; ?>           
                           <?php endif; ?>"><img src="<?php echo get_template_directory_uri() . '/images/images/Email Bug.png' ?>" alt="img"><?php
                               $contact_mail = get_field('contact_mail', 'option');
                               if (!empty($contact_mail)):
                                   ?>
                                   <?php echo $contact_mail; ?>           
                            <?php endif; ?></a></li>
                    <li><img src="<?php echo get_template_directory_uri() . '/images/images/Location Bug.png' ?>" alt="img">
                        <span><a target="_blank" href="https://www.google.co.in/maps/place/The+Leazer+Group/@35.894677,-78.6492905,17z/data=!3m1!4b1!4m5!3m4!1s0x89ac5802e75313df:0x4524a97d7ed0f79!8m2!3d35.8946727!4d-78.6471018?hl=en"><?php
                            $contact_address = get_field('contact_address', 'option', false, false);
                            if (!empty($contact_address)):
                                ?>
                                <?php echo $contact_address; ?>           
                            <?php endif; ?></a></span></li>
                </ul>                        
            </div>
        </div>
    </div>

    <div class="full_width privacy">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $args = array(
                        'menu_class' => 'full_width footer_menu',
                        'theme_location' => 'footer_menu_fornt_2',
                    );
                    wp_nav_menu($args);
                    ?>  
                </div>
            </div>
        </div>
    </div>

    <div class="bottom full_width">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <?php
                    $copyright = get_field('footer_copyright_detials', 'option');
                    if (!empty($copyright)):
                        ?>
                        <span><?php echo $copyright; ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <?php
                    $devlopedby = get_field('footer_development_detials', 'option');
                    if (!empty($devlopedby)):
                        ?>
                        <span><?php echo $devlopedby; ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <ul class="pull-right">
                        <?php
                        $facebook = get_field('facebook', 'option');
                        if (!empty($facebook)):
                            ?>
                            <li><a target="_blank" href="<?php echo $facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php
                        $twitter = get_field('twitter', 'option');
                        if (!empty($twitter)):
                            ?>
                            <li><a target="_blank" href="<?php echo $twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php
                        $vimeo = get_field('vimeo', 'option');
                        if (!empty($vimeo)):
                            ?>
                            <li><a target="_blank" href="<?php echo $vimeo; ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php
                        $instagram = get_field('instagram', 'option');
                        if (!empty($instagram)):
                            ?>
                            <li><a target="_blank" href="<?php echo $instagram; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--<script type="text/javascript">
jQuery(function ($) {
$('a[href*="#"]:not([href="#"])').click(function () {
if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
var target = $(this.hash);
target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
if (target.length) {
$('html, body').animate({
scrollTop: target.offset().top
}, 1000);
return false;
}
}
});
});
</script>-->
<script>
    jQuery(document).ready(function ($) {
        $("#search_icon").click(function () {
             $('#search_box').toggle('medium', function() {
                  if ($(this).is(':visible'))
                  $(this).css('display','inline-block');
             });  
        });
    });
</script>
<script>
    jQuery(document).ready(function ($)
    {
        function setredirectlink() {
            var lst1 = geturlpara(1, "");
            var lst2 = geturlpara(2, lst1);
            
            if (lst2 == "events_page" && (lst1 == "list" || lst1 == "month" || lst1 == "today"))
            {
                var pos = jQuery("#content").offset().top;
                $('body, html').animate({scrollTop: pos});
            }
        }
        function geturlpara(cnt, pretext) {
            var urlpart = (window.location.href).split("/");
            //console.log(urlpart);
            var lst = urlpart[(urlpart.length - cnt)];
            console.log(lst.charAt(0));
            if (lst == "" || lst == pretext || lst.charAt(0) == "?") {
                cnt = cnt + 1;
                return geturlpara(cnt, pretext);
            } else {
                return lst;
            }
        }
        setredirectlink()
    });
</script>
<?php wp_footer(); ?>
</body>
</html>
