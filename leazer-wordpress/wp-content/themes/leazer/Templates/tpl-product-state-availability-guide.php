<?php
/**
 * Template Name: Product State Availability Guide
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
                        <p class="note-line"><?php the_field('psag_page_main_title'); ?></p>
                        <?php
                        if (have_rows('add_guide_repeater')):
                            $inc = 0;
                            while (have_rows('add_guide_repeater')) : the_row();
                                $rep_sub_guide_title = get_sub_field('rep_sub_guide_title');
                                $rep_sub_guide_description = get_sub_field('rep_sub_guide_description');
                                $rep_sub_guide_image = get_sub_field('rep_sub_guide_image');
                                
                                $attachment_id = get_sub_field('rep_sub_guide_file');
                                $url = wp_get_attachment_url($attachment_id);
                                $title = get_the_title($attachment_id);
                                $path_info = pathinfo(get_attached_file($attachment_id));

                                $filesize = filesize(get_attached_file($attachment_id));
                                $filesize = size_format($filesize, 2);
                                $rep_sub_guide_file = get_sub_field('rep_sub_guide_file');
                                if (($inc % 2) == 0) {
                                    ?>
                                    <div class="product-state-list-items">
                                        <div class="product-state-column-image">
                                            <img src="<?php echo $rep_sub_guide_image; ?>" alt="product-state-1.jpg" />
                                        </div>
                                        <div class="product-state-column-content">
                                            <h4><?php echo $rep_sub_guide_title; ?></h4>
                                            <?php echo $rep_sub_guide_description; ?>
                                            <div class="download-div">
                                                <a class="viewbtn" href="<?php echo $url; ?>">View</a>
                                                <span>or</span>
                                                <div class="download-details">
                                                    <a class="downloadbtn" href="<?php echo $url; ?>" download><img src="<?php echo get_template_directory_uri(); ?>/images/downloadIcon.png" alt="downloadIcon.png" />Download</a>
                                                    <span class="download-file-details">Size: <?php echo $filesize; ?>&nbsp;&nbsp;&nbsp;Format: <?php echo strtoupper($path_info['extension']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="product-state-list-items">
                                        <div class="product-state-column-image hidden-md hidden-sm hidden-lg">
                                            <img src="<?php echo $rep_sub_guide_image; ?>" alt="product-state-1.jpg" />
                                        </div>
                                        <div class="product-state-column-content">
                                            <h4><?php echo $rep_sub_guide_title; ?></h4>
                                            <?php echo $rep_sub_guide_description; ?>
                                            <div class="download-div">
                                                <a class="viewbtn" href="<?php echo $url; ?>">View</a>
                                                <span>or</span>
                                                 <div class="download-details">
                                                    <a class="downloadbtn" href="<?php echo $url; ?>" download><img src="<?php echo get_template_directory_uri(); ?>/images/downloadIcon.png" alt="downloadIcon.png" />Download</a>
                                                    <span class="download-file-details">Size: <?php echo $filesize; ?>&nbsp;&nbsp;&nbsp;Format: <?php echo strtoupper($path_info['extension']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-state-column-image hidden-xs">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-state-2.jpg" alt="product-state-2.jpg" />
                                        </div>
                                    </div>
                                    <?php
                                }
                                $inc++;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>