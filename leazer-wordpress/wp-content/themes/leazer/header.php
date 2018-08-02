<!DOCTYPE html>
<html>
    <head>
        <!-- @ Meta Tags Starts -->
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="handheldfriendly" content="true" />
        <meta name="MobileOptimized" content="width" />
        <meta name="format-detection" content="telephone=no" />
        <meta http-equiv="Cache-control" content="no-cache" />
        <meta http-equiv="X-FRAME-OPTIONS" content="DENY" />
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Oswald" /> 
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
        <div id="page-container">
            <header>
                <div class="top full_width ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                $current_user = wp_get_current_user();
                                ?>
                                <ul class="full_width pull-right">
                                    <li>Welcome : <strong style="color:#fff;"><?php echo $current_user->user_login; ?></strong></li>
                                    <li class="login pull-right"><a href="<?php echo wp_logout_url( get_permalink(4) ); ?>">Logout</a></li>                                
                                </ul>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="bottom-header">
                    <div class="header-parts">
                        <div class="container">
                            <div class="row">
                                <div class="logo col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                    <a href="<?php echo get_site_url() . '/home'; ?>"><img src="<?php the_field('header_logo', 'option'); ?>" alt="LeazerLogo.png" /></a>
                                    <p class="logo-text-line"><?php the_field('site_slogan', 'option'); ?></p>
                                    <button id="my-icon" class="hamburger hamburger--collapse" type="button">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-2 col-xs-3">
                                    <nav class="primary-menu">
                                        <?php wp_nav_menu(array('theme_location' => 'main_navigation', 'menu_class' => '', 'container' => false)); ?>
                                    </nav>
                                    <nav id="device-menu">
                                        <?php wp_nav_menu(array('theme_location' => 'main_navigation', 'menu_class' => '', 'container' => false)); ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $banner_images = get_field('main_banner_image');
                    $page_banner_title = get_field('header_page_main_title');
                    $page_banner_sub_title = get_field('header_page_sub_title');
                    ?>
                    <?php
                    if (!empty($banner_images)) {
                        ?>
                        <img src="<?php the_field('main_banner_image'); ?>" alt="BannerImageHome.jpg" />
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/BannerImageHome.jpg" alt="BannerImageHome.jpg" />
                        <?php
                    }
                    ?>
                    <img class="banner-shadow" src="<?php echo get_template_directory_uri(); ?>/images/BannerShade.png" alt="BannerShade.png" />
                    <?php if (!empty($page_banner_title)) { ?>
                    <div class="page-title">
                        <h2><?php echo $page_banner_title; ?></h2>
                        <h1><?php echo $page_banner_sub_title; ?></h1>
                    </div>
                    <?php } ?>
                </div>
            </header>