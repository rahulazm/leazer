<?php
/**
 * Template Name: TLG-2, TLG-3 and RW Inventory Sheets
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
                        <h3 class="inventory-sheets-title">CLICK ON THE LINK BELOW TO ACCESS THE TLG-2, TLG-3 AND RW LEAD INVENTORY</h3>
                        <div class="inventory-lists">
                            <?php
                            if (have_rows('add_files_repeater')):
                                while (have_rows('add_files_repeater')) : the_row();
                                    ?>
                                    <div class="inventory-list-item">
                                        <h4><?php the_sub_field('rep_sub_main_service_title') ?></h4>
                                        <?php the_sub_field('rep_sub_description'); ?>
                                        <?php
                                        $attachment_id = get_sub_field('rep_sub_file_attachment');
                                        $url = wp_get_attachment_url($attachment_id);
                                        $title = get_the_title($attachment_id);
                                        $path_info = pathinfo( get_attached_file( $attachment_id ) );
                                        
                                        $filesize = filesize( get_attached_file( $attachment_id ) );
                                        $filesize = size_format($filesize, 2);
                                        
                                        ?>
                                        <div class="download-div">
                                            <a class="viewbtn" href="<?php echo $url; ?>">View</a>
                                            <span>or</span>
                                            <div class="download-details">
                                                <a class="downloadbtn" href="<?php echo $url; ?>" download><img src="<?php echo get_template_directory_uri(); ?>/images/downloadIcon.png" alt="downloadIcon.png" />Download</a>
                                                <span class="download-file-details">Size: <?php  echo $filesize;  ?>&nbsp;&nbsp;&nbsp;Format: <?php echo strtoupper($path_info['extension']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>