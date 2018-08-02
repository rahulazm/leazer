<?php
/**
 * Template Name: Calender
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
                        <div class="col-md-9 col-sm-8">
                            <div class="calender_sec">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-10 small_padd_calendar">
                                            <div class="calen_div cal1">

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-10 small_padd_calendar">
                                            <div class="calen_blogs_sec" id="message">
                                                <img id="ajax_loading" src="<?php echo get_template_directory_uri(); ?>/images/89.gif" style="display:block;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php get_sidebar(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 
<?php endif; ?>
<script>
    jQuery(document).ready(function () {
        var calendars = {};
        var eventArray1;
        var thisMonth = moment().format('YYYY-MM');
        function democall(paraEventArray)
        {
            var theCalendarInstance = jQuery('.cal1').clndr();
            theCalendarInstance.setEvents(paraEventArray);
        }

        /* AJAX call for the get current month events begin */
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        var current_full_date = new Date();

        var current_month = monthNames[current_full_date.getMonth()];
        var current_year = current_full_date.getFullYear();

        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'ajax_get_event', //calls wp_ajax_nopriv_ajaxlogin
                'month': current_month,
                'year': current_year,
            },
            success: function (data) {
                jQuery('#message').html(data.data.data);
                /* Create array for the fill calander date begin  */
                var arr = data.data.fulldate;
                var eventArray1 = [];
                $.each(arr, function (index, value) {
                    eventArray1.push({'date': value});
                });
                /* Create array for the fill calander date begin  */
                jQuery('.cal1').clndr({
                    events: eventArray1});
                democall(eventArray1);
            }
        });
        /* AJAX call for the get current month events begin */

        calendars.clndr1 = jQuery('.cal1').clndr({
            //events: eventArray,
            clickEvents: {
                click: function (target) {
                    console.log('Cal-1 clicked: ', target);
                },
                today: function () {
                    console.log('Cal-1 today');
                },
                nextMonth: function () {
                    jQuery("#ajax_loading").show();
                    /* Get Next Month Data Ajax Call */
                    var next_month = jQuery("#currentmonth").data("month");
                    var next_year = jQuery("#currentmonth").data("year");

                    jQuery.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: {
                            'action': 'ajax_get_event', //calls wp_ajax_nopriv_ajaxlogin
                            'month': next_month,
                            'year': next_year,
                        },
                        success: function (data) {
                            jQuery('#message').html(data.data.data);
                            /* Create array for the fill calander date begin  */
                            var arr = data.data.fulldate;
                            var eventArray1 = [];
                            $.each(arr, function (index, value) {
                                eventArray1.push({'date': value});
                            });
                            /* Create array for the fill calander date begin  */
                            jQuery('.cal1').clndr({
                                events: eventArray1});
                            democall(eventArray1);
                        }
                    });
                },
                previousMonth: function () {

                    /* Get Next Month Data Ajax Call */
                    var next_month = jQuery("#priviousmonth").data("month");
                    var next_year = jQuery("#priviousmonth").data("year");

                    jQuery.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: {
                            'action': 'ajax_get_event', //calls wp_ajax_nopriv_ajaxlogin
                            'month': next_month,
                            'year': next_year,
                        },
                        success: function (data) {
                            jQuery('#message').html(data.data.data);
                            /* Create array for the fill calander date begin  */
                            var arr = data.data.fulldate;
                            var eventArray1 = [];
                            $.each(arr, function (index, value) {
                                eventArray1.push({'date': value});
                            });
                            /* Create array for the fill calander date begin  */
                            jQuery('.cal1').clndr({
                                events: eventArray1});
                            democall(eventArray1);
                        }
                    });
                },
                onMonthChange: function () {
                    console.log('Cal-1 month changed');
                },
                nextYear: function () {
                    console.log('Cal-1 next year');
                },
                previousYear: function () {
                    console.log('Cal-1 previous year');
                },
                onYearChange: function () {
                    console.log('Cal-1 year changed');
                },
                nextInterval: function () {
                    console.log('Cal-1 next interval');
                },
                previousInterval: function () {
                    console.log('Cal-1 previous interval');
                },
                onIntervalChange: function () {
                    console.log('Cal-1 interval changed');
                }
            },
            multiDayEvents: {
                singleDay: 'date',
                endDate: 'endDate',
                startDate: 'startDate'
            },
            showAdjacentMonths: true,
            adjacentDaysChangeMonth: true
        });
    });
</script>
<?php get_footer(); ?>