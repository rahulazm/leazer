<!DOCTYPE html>
<html>
    <head>
        <!-- @ Meta Tags Starts -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;">
        <meta name="apple-mobile-web-app-capable" content="yes" >
        <meta name="handheldfriendly" content="true">
        <meta name="MobileOptimized" content="width">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?php
            global $page, $paged;
            wp_title('-', true, 'right');
            bloginfo('name');
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'mytheme'), max($paged, $page));
            ?>
        </title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700|Oswald" /> 
        <link rel="icon" href="<?php the_field('favicon_icon', 'option'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
        <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
        <?php
        wp_enqueue_script('jquery');
        wp_head();
        ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div class="top full_width ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="full_width pull-right">
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
                                <li>
                                    <form action="<?php bloginfo('url'); ?>" method="get">
                                        <input type="text" id="search_box" name="s">                                        
                                        <a href="#" id="search_icon"><i class="fa fa-search" aria-hidden="true"></i></a>                                
                                    </form>
                                </li>
                                <li class="login pull-right"><a href="<?php echo get_site_url(); ?>/agent">log in</a></li>                                
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="clearfix"></div>
            <div class="logo">
                <a title="Logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php
                    $logo = get_field('header_logo', 'option');
                    if (!empty($logo)):
                        ?>
                        <img src="<?php echo $logo['url']; ?>" alt="Logo" title="Logo">
                    <?php endif; ?>
                </a></div>
            <nav id='cssmenu'>               
                <div id="head-mobile"></div>
                <div class="button"></div>
                <?php
                $args = array(
                    'container' => false,
                    'theme_location' => 'main_navigation_front',
                );
                wp_nav_menu($args);
                ?>  
            </nav>
        </header>
        <?php
        $slug = ( basename(get_permalink()) );
        if (is_post_type_archive('tribe_events')) {
            ?><style type="text/css">.extra {display: none;}</style>
            <section class="banner" <?php
            $banner_background_image = get_field('banner_background_image_', 3014);
            if (!empty($banner_background_image)):
                ?> style="background-image: url(<?php echo $banner_background_image['url']; ?>) "
                     <?php endif; ?>>  
                <div id="search_archive" class="half_top"></div>
                <?php
                $logo_description = get_field('logo_description_', 3014);
                if (!empty($logo_description)):
                    ?>
                    <h1><?php echo $logo_description; ?> </h1>             
                <?php endif; ?>

                <div class="banner_details">
                    <h2><?php
                        $banner_title = get_field('banner_title_', 3014);
                        if (!empty($banner_title)):
                            ?>
                            <?php echo $banner_title; ?>          
                        <?php endif; ?></h2>
                    <?php
                    $banner_description = get_field('banner_description_', 3014);
                    if (!empty($banner_description)):
                        ?>
                        <p>  <?php echo $banner_description; ?>  </p>
                    <?php endif; ?>
                    <?php
                    $slug = ( basename(get_permalink()) );
                    if ($slug == 'blog') {
                        ?>
                        <div class="search-blog text-center">
                        <!--<input type="text" name="search" placeholder="Type to search...">-->
                        </div>
                        <div class="down text-center blog_down">
                        <?php } elseif ($slug == 'contact') { ?>
                            <?php
                            $h_phone_number = get_field('phone_number');
                            if (!empty($h_phone_number)):
                                ?>
                                <a href="tel:<?php echo $h_phone_number; ?>" class="contphone"><?php echo $h_phone_number; ?></a>
                            <?php endif; ?>
                            <div class="down text-center blog_down">
                            <?php } elseif ($slug == 'events') { ?>
                                <div class="down text-center blog_down">
                                <?php } else { ?>
                                    <div class="down text-center ">
                                    <?php } ?>
                                    <a href="#s-image"><?php
                                        $banner_button_arrow = get_field('banner_button_arrow_');
                                        if (!empty($banner_button_arrow)):
                                            ?>
                                            <img src="<?php echo $banner_button_arrow['url']; ?>" alt="img">
                                        <?php endif; ?></a>
                                </div>
                            </div>
                            <div class="half_bottom"></div>
                            </section>
                        <?php } ?>
                        <?php if (!( is_home() || is_front_page() )) { ?>
                            <section class="banner extra" <?php
                            $banner_background_image = get_field('banner_background_image_');
                            if (!empty($banner_background_image)):
                                ?> style="background-image: url(<?php echo $banner_background_image['url']; ?>) "
                                     <?php else: ?>
                                        <?php
                                        if(is_search()){
                                            ?>
                                 style="background-image: url(<?php echo get_template_directory_uri() ?>/images/blogbannercomp.jpg)"
                                                
                                            <?php
                                        }else{
                                            ?>
                                                style="background-image: url(<?php echo get_template_directory_uri() ?>/images/quote_resource.jpg)"
                                            <?php
                                        }
                                        ?>
                                         
                                     <?php endif; ?> >
                                <div id="search_archive" class="half_top"></div>
                                <?php
                                $logo_description = get_field('logo_description_');
                                if (!empty($logo_description)):
                                    ?>
                                    <h1><?php echo $logo_description; ?> </h1>             
                                <?php endif; ?>

                                <div class="banner_details">
                                    <h2><?php
                                        $banner_title = get_field('banner_title_');
                                        if (!empty($banner_title)):
                                            ?>
                                            <?php echo $banner_title; ?>          
                                        <?php endif; ?></h2>
                                    <?php
                                    $banner_description = get_field('banner_description_');
                                    if (!empty($banner_description)):
                                        ?>
                                        <p>  <?php echo $banner_description; ?>  </p>
                                    <?php endif; ?>
                                    <?php
                                    $slug = ( basename(get_permalink()) );
                                    if ($slug == 'blog' || is_search()) {
                                        ?>
                                        <div class="search-blog text-center">
                                            <?php if (is_search()) { ?>
                                                <h2>BLOG</h2>
                                            <?php } ?>
                                            <?php dynamic_sidebar('search'); ?>
                                        </div>
                                        <div class="down text-center blog_down">
                                        <?php } elseif ($slug == 'contact') { ?>
                                            <?php
                                            $h_phone_number = get_field('phone_number');
                                            if (!empty($h_phone_number)):
                                                ?>
                                                <a href="tel:<?php echo $h_phone_number; ?>" class="contphone"><?php echo $h_phone_number; ?></a>
                                            <?php endif; ?>
                                            <div class="down text-center blog_down">
                                            <?php } elseif ($slug == 'events') { ?>
                                                <div class="down text-center blog_down">
                                                <?php } else { ?>
                                                    <div class="down text-center ">
                                                    <?php } ?>
                                                    <a href="#s-image"><?php
                                                        $banner_button_arrow = get_field('banner_button_arrow_');
                                                        if (!empty($banner_button_arrow)):
                                                            ?>
                                                            <img src="<?php echo $banner_button_arrow['url']; ?>" alt="img" height="20px">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="half_bottom"></div>
                                            </section>
                                        <?php } ?>
