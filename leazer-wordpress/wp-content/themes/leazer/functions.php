<?php

include("functions/inc_include.php");

add_action('template_redirect', 'check_login_user', 20);

function check_login_user() {
    if (!is_page(4)) {
        if (!is_user_logged_in()) {
            $url = get_permalink(4);
            wp_redirect($url);
        }
    }
}

function my_page_template_redirect() {
    if (is_page(4) && is_user_logged_in()) {
        wp_redirect(home_url('/home/'));
        die;
    }
}

add_action('template_redirect', 'my_page_template_redirect');

add_filter('show_admin_bar', '__return_false');

/* Ajax Login Code Begin */

function ajax_login_init() {

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery'));
    wp_enqueue_script('ajax-login-script');
    $login_after_redirect_link = get_field('login_after_redirect_link_', 'option');
    wp_localize_script('ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => $login_after_redirect_link,
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');
}

add_action('init', 'ajax_login_init');

function ajax_login() {

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
    $remember = (isset($_POST['rememberme']) && $_POST['rememberme'] == 'true') ? true : false;
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = $remember;
    $user = get_user_by('login', $info['user_login']);

    // this is commented to fix agent login issue
    /*
    if ($user && in_array('administrator', (array) $user->roles)) {
        echo json_encode(array('loggedin' => false, 'message' => ('<span style="color:red !important;">Invalid credentials</span>')));
    }*/

     if($user_signon = wp_signon($info, false)){
        if (is_wp_error($user_signon)) {
            echo json_encode(array('loggedin' => false, 'message' => __('<span style="color:red !important;">Invalid credentials.</span>')));
        } else {
            
            wp_set_auth_cookie($user->ID, $remember);
            echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...')));
        }
    }
    die();
}
/* Ajax Login Code End */



/* Reset Password Script Begin */
/* Ajax Login Code Begin */

function ajax_reset_password_init() {
    wp_register_script('ajax-reset-script', get_template_directory_uri() . '/assets/js/reset-pass-ajax.js', array('jquery'));
    wp_enqueue_script('ajax-reset-script');
    wp_localize_script('ajax-reset-script', 'ajax_reset_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'loadingmessage' => __('Sending user info, please wait...')
    ));
    add_action('wp_ajax_nopriv_ajaxresetpass', 'ajax_reset_pass');
}

add_action('init', 'ajax_reset_password_init');

function ajax_reset_pass() {
    check_ajax_referer('ajax-reset-nonce', 'security');
    $user_email = $_POST['email'];

    $user = get_user_by('email', $user_email);
    if ($user) {
        $user_id = $user->ID;
        $new_password = wp_generate_password();
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Leazer Group <info@leazeragency.com');
        $body = 'Your New Password is: ' . $new_password;
        $sent_message = wp_mail($user_email, 'New Password', $body, $headers);
        if ($sent_message) {
            wp_set_password($new_password, $user_id);
            echo json_encode(array('usercheck' => true, 'message' => __('Please check inbox for new password.')));
        } else {
            echo json_encode(array('usercheck' => false, 'message' => __('Please Try again later.')));
        }
    } else {
        echo json_encode(array('usercheck' => false, 'message' => __('<span style="color:red !important;">Email id does not match with records in our system.</span>')));
    }
    die();
}

/* Get all events AJax start */
add_action('wp_ajax_ajax_get_event', 'get_all_event_data');
add_action('wp_ajax_nopriv_ajax_get_event', 'get_all_event_data');

function get_all_event_data() {
    $month = $_POST['month'];
    $date = date_parse($month);
    $current_month = $date['month'];
    $year = $_POST['year'];
    global $wpdb;
    $table = $wpdb->prefix . 'esp_datetime';

    $event_post_id = $wpdb->get_results("SELECT EVT_ID FROM " . $table . " WHERE MONTH(DTT_EVT_start) = " . $current_month . " AND YEAR(DTT_EVT_start)=" . $year . "");
    //print_r($event_post_id);die();
    if (!empty($event_post_id)) {
        $post_ids = array();
        foreach ($event_post_id as $post_event) {
            $post_ids[] = $post_event->EVT_ID;
        }
        $args = array(
            'post_type' => 'espresso_events',
            'post__in' => $post_ids
        );
        $posts = get_posts($args);

        $output = '';
        $fulldate = array();
        foreach ($posts as $e_post) {

            $event_post = $wpdb->get_row("SELECT * FROM " . $table . " WHERE EVT_ID=$e_post->ID");
            $start_date = date_create($event_post->DTT_EVT_start);
            $end_date = date_create($event_post->DTT_EVT_end);
            $output.='<div class="calen_blog_row">';
            $output.='<div class="calen_blog_date">';
            $output.='<div class="calen_blog_day">';
            $output.='' . date_format($start_date, 'd') . '';
            $output.='</div>';
            $output.='<div class="calen_blog_month">';
            $output.='OCT';
            $output.='</div>';
            $output.='<div class="calen_blog_year">';
            $output.='2017';
            $output.='</div>';
            $output.='</div>';
            $output.='<div class="calen_blog_cont_sec">';
            $output.='<div class="calen_blog_title">';
            $output.='<a href="' . get_permalink($e_post->ID) . '"><h2>' . $e_post->post_title . '</h2></a>';
            $output.='</div>';
            $output.='<div class="calen_blog_content">';
            $output.='<section>' . $e_post->post_content . '</section>';
            $output.='</div>';
            $output.='<div class="calen_blog_time">';
            $output.='<i class="fa fa-clock-o" aria-hidden="true"></i> ' . date_format($start_date, 'g:i a') . ' - ' . date_format($end_date, 'g:i a') . '';
            $output.='</div>';
            $output.='</div>';
            $output.='</div>';
            $fulldate[] = date_format($start_date, 'Y-m-d');
        }
        $response = array('success' => true, 'data' => $output, 'fulldate' => $fulldate);
        wp_send_json_success($response);
    } else {
        $response = array('error' => true, 'data' => 'Event Not Found on this month');
        wp_send_json_success($response);
    }
    wp_die();
}

function get_last_three_cource() {
    global $wpdb;
    $c_table = $wpdb->prefix . 'wpcw_courses';
    $event_post = $wpdb->get_row("SELECT * FROM " . $c_table . " WHERE EVT_ID=$e_post->ID");
}

add_filter('gform_enable_field_label_visibility_settings', '__return_true');
