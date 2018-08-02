<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
        <section class="contactform">
            <div class="container">
                <div class="row">
                    <div class="content-wrapper">
                        <div id="s-image" class="contact-content">
                            <div class="col-md-8 col-sm-8 center-block">

                               <?php the_content(); ?>

                            </div>

                            <div class="clearfix"></div>

                            <div class="contact-info col-md-offset-2 col-sm-offset-1 col-md-8 col-sm-10">
                                <div class="row">
                                    <div class="col-md-8 center-block">
                                        <div class="col-md-4 col-sm-4">
                                            <?php
                                            $phone_icon = get_field('phone_icon');
                                            if (!empty($phone_icon)):
                                                ?>
                                                <img src="<?php echo $phone_icon['url']; ?>"> 
                                            <?php endif; ?>
                                            <?php
                                            $phone_number = get_field('phone_number');
                                            if (!empty($phone_number)):
                                                ?>
                                                <p><a href="tel:<?php echo $phone_number; ?>" class="mail-link">P: <?php echo $phone_number; ?></a></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?php
                                            $fax_icon = get_field('fax_icon');
                                            if (!empty($fax_icon)):
                                                ?>
                                                <img src="<?php echo $fax_icon['url']; ?>">
                                            <?php endif; ?>
                                            <?php
                                            $fax_number = get_field('fax_number');
                                            if (!empty($fax_number)):
                                                ?>
                                                <p><a href="tel:<?php echo $fax_number; ?>" class="mail-link">F: <?php echo $fax_number; ?></a></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <?php
                                            $email_icon = get_field('email_icon');
                                            if (!empty($email_icon)):
                                                ?>
                                                <img src="<?php echo $email_icon['url']; ?>">
                                            <?php endif; ?>
                                            <?php
                                            $email = get_field('email');
                                            if (!empty($email)):
                                                ?>
                                                <p><a href="mailto:<?php echo $email; ?>" class="mail-link"><?php echo $email; ?></a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $contact_address = get_field('contact_address');
                                if (!empty($contact_address)):
                                    ?>
                                    <p class="contact-add"><?php echo $contact_address; ?></p>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-map">
            <?php
            $contact_map = get_field('contact_map');
            if (!empty($contact_map)):
                ?>
                <iframe src="<?php echo $contact_map; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>                 
<?php endif; ?>
<?php get_footer(); ?>