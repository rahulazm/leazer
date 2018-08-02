<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>

     

<section class="protection" id="s-image">
</section>
<?php if (get_field('service_details')): ?>
    <?php
    $i = 1;
    while (has_sub_field('service_details')):
        $service_title = get_sub_field('service_title');
        $service_description = get_sub_field('service_description');
        $service_images = get_sub_field('service_images');
        $lang = get_sub_field('image_with_text_value');
        ?>
        <?php if (empty($lang)) { ?>
        <div>
            <section class="protection" id="service<?php echo $i; ?>">
                <div class="container">
                    <div class="row">
                        <div class="middle">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h2><?php echo $service_title; ?></h2>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <?php echo $service_description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="protection_bg" style="background-image: url(<?php echo $service_images['url']; ?>);">
                <div class="custom_overlay" style="background-image: url(<?php echo get_template_directory_uri();?>/images/BannerShade.png);"></div>
            </section>
        </div>
        <?php } else { ?>
        <div id="service<?php echo $i; ?>">
            <section class="protection">
                <div class="container">
                    <div class="row">
                        <div class="middle">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h2><?php echo $service_title; ?></h2>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <?php echo $service_description; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="protection_term protection_bg" style="background-image: url(<?php echo $service_images['url']; ?>);">
            <div class="custom_overlay" style="background-image: url(<?php echo get_template_directory_uri();?>/images/BannerShade.png);"></div>

            <?php echo $lang; ?>
        </section>
    </div>
    <?php } ?>
    <?php $i++; endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
