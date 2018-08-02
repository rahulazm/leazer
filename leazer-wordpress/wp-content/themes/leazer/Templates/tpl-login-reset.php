<?php
/**
 * Template Name: Login Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- @ Meta Tags Starts -->
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="handheldfriendly" content="true" />
        <meta name="MobileOptimized" content="width" />
        <meta name="format-detection" content="telephone=no" />
        <meta http-equiv="Cache-control" content="no-cache" />
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
        <div class="container-fluid login_container">   
            <div class="row middle_content_box">
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-12">
                            <!--Start Of Login Pop Up -->
                            <div id="login_popup" class="login_content_box">
                                <div class="pop_up_logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/LeazerLogo.png" alt="LeazerLogo.png" />
                                    <p class="pop_up_logo_text logo-text-line">INSURING YOUR FUTURE YOUR FAMILY.<br/>PROVIDING PEACE OF MIND FOR YEARS TO COME.</p> 
                                </div>
                                <div class="login_popup_box">
                                    <div class="login_content">
                                        <h2>Hello </h2>
                                        <h2>Agent.</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <p>Sed laoreet scelerisque facilisis.</p>
                                    </div>

                                    <div class="login_form_content">
                                        <div id="login_box">
                                            <?php if (!is_user_logged_in()) { ?>
                                                <h3><?php the_field('login_page_main_title', 'option'); ?></h3>
                                                <p><?php the_field('login_page_description', 'option'); ?> <a href="<?php the_field('carrear_page_link', 'option'); ?>">Career Page.</a></p>
												<p>First time logging into the new portal? Reset your password <a id="go_to_fpwd" href="javascript:void(0)"> here</a>
												</p>

                                                <form id="login" action="login" method="post">
                                                    <p class="status"></p>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input id="user_login" value="<?php echo (isset($_POST['user_login']) ? htmlspecialchars($_POST['user_login']) : ''); ?>" type="text" name="log" placeholder="Username" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input id="user_pass" type="password" name="pwd" placeholder="Password" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 remember_me_login">
                                                            <label for="rememberme"><input name="rememberme" id="rememberme" value="false" <?php echo (isset($_POST['remember_me']) ? 'checked' : ''); ?>  type="checkbox"> Remember Me</label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 forgot_pwd">
                                                            <a id="go_to_fpwd1" href="javascript:void(0)">Forgot password?</a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 login_submit">
                                                            <input name="login-submit"  c="button button-primary button-large" value="Login" type="submit">
                                                        </div>
                                                    </div>
                                                    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                                                </form>
                                            <?php } else { ?>
                                                <?php 
                                                //wp_redirect('/home');
                                                ?>
                                                <a class="login_button" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
                                            <?php } ?>
                                        </div>

                                        <div id="forgor_password_box" style="display: none;">

                                            <h3>Reset Password</h3>
                                            <p><?php the_field('login_page_description', 'option'); ?> <a href="<?php the_field('carrear_page_link', 'option'); ?>">Career Page.</a></p>
                                            <form id="resetpass" action="" method="post">
                                                <p class="status_pass"></p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input name="email" id="email" value="" placeholder="Enter e-mail address" type="email"  required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 forgot_pwd">
                                                        <a id="back_to_login" href="javascript:void(0);">Go back to login</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 login_submit">
                                                        <input name="login-submit" class="button button-primary button-large" value="Reset password" type="submit">
                                                    </div>
                                                </div>
                                                <?php wp_nonce_field('ajax-reset-nonce', 'security_key'); ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Login Pop Up -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            
            jQuery("#rememberme").on('change', function () {
                if (jQuery(this).is(':checked')) {
                    jQuery(this).attr('value', 'true');
                } else {
                    jQuery(this).attr('value', 'false');
                }
            });

            jQuery(document).ready(function () {
                jQuery('#go_to_fpwd').click(function () {
                    jQuery('#forgor_password_box').slideToggle("slow");
                    jQuery('#login_box').hide();
                });
                jQuery('#go_to_fpwd1').click(function () {
                    jQuery('#forgor_password_box').slideToggle("slow");
                    jQuery('#login_box').hide();
                });
                jQuery('#back_to_login').click(function () {
                    jQuery('#login_box').slideToggle("slow");
                    jQuery('#forgor_password_box').hide();
                });
            });
        </script>
        <!-- @ Attach Scripts -->
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js" defer></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js" defer></script>
    </body>
    <!-- Content End  -->
</html>