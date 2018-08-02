<?php
/**
 * Template Name: Contact Us
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
                        <div class="contact-content">
                            <h4>How to reach us</h4>
                            <div class="contact-file-upload">
                                <?php 
                                $contact_us_file_1_title = get_field('contact_us_file_1_title');
                                $contact_us_file_1_source =get_field('contact_us_file_1_source');
                                ?>
                                <?php if(!empty($contact_us_file_1_title)){ ?>
                                <div class="left-div">
                                    <a href="<?php echo $contact_us_file_1_source; ?>">
                                        <div class="file-image"><img src="<?php echo get_template_directory_uri(); ?>/images/pdf-image.png" alt="pdf-image.png" /></div>
                                        <div class="file-name"><?php echo $contact_us_file_1_title; ?></div>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php 
                                $contact_us_file_2_title = get_field('contact_us_file_2_title');
                                $contact_us_file_source_2 =get_field('contact_us_file_source_2');
                                ?>
                                <?php if(!empty($contact_us_file_2_title)){ ?>
                                <div class="right-div">
                                    <a href="<?php echo $contact_us_file_source_2; ?>">
                                        <div class="file-image"><img src="<?php echo get_template_directory_uri(); ?>/images/pdf-image.png" alt="pdf-image.png" /></div>
                                        <div class="file-name"><?php echo $contact_us_file_2_title; ?></div>
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                            <div class="contact-form right-div">
                                <?php $contact_form = get_field('general_contact_us_form'); ?>
                                <?php echo do_shortcode($contact_form); ?>
                            </div>
                            <div class="contact-details left-div">
                               <?php the_field('general_content_details'); ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </div>
    <?php endwhile; ?>                 
<?php endif; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeQWmBdrpKqhpqfab8Bvo4oXsWGbiqdLc&callback=initMap" async defer></script>
<script type="text/javascript">
    function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?php the_field('contact_map_latitude') ?>, lng: <?php the_field('contact_longitude') ?>},
            zoom: 16,
            styles: [
                {
                    stylers: [
                        {hue: "#596b79"},
                        {saturation: "-50"},
                        {lightness: "0"},
                    ]
                },
                {featureType: "landscape", stylers: [
                        {hue: "#3f7644"},
                        {saturation: " -40 "},
                        {lightness: " 0 "},
                    ]
                },
                {featureType: "administrative", stylers: [
                        {hue: "#76723f"},
                        {saturation: " -40 "},
                        {lightness: " 0 "},
                    ]
                },
                {featureType: "road", stylers: [
                        {hue: "#c9aa78"},
                        {saturation: " -40 "},
                        {lightness: " 0 "},
                    ]
                },
                {featureType: "water", stylers: [
                        {hue: ""},
                        {saturation: ""},
                        {lightness: ""},
                    ]
                },
                {featureType: "poi", stylers: [
                        {hue: "#7a6d3d"},
                        {saturation: " -40 "},
                        {lightness: " 0 "},
                    ]
                },
            ]
        });
        var marker = new google.maps.Marker({
            position: {lat: 35.895756, lng: -78.647385},
            map: map
        });
        var icon = {
            company: {
                icon: 'http://localhost/leazer/images/company.png'
            }
        };
        var features = [{
                position: new google.maps.LatLng(35.895756, -78.647385),
                type: 'info'
            }];
        features.forEach(function (feature) {
            var marker = new google.maps.Marker({
                position: feature.position,
                icon: icon[feature.type].icon,
                map: map
            });
        });
    }
</script>
<?php get_footer(); ?>