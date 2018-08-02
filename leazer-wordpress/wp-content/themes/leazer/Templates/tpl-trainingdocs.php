<?php
/**
 * Template Name: General Documents
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="content-wrapper">
                <div class="col-md-9 col-sm-8 training-doc-content">
                    <?php
                    if (have_rows('add_files_repeater')):
                        while (have_rows('add_files_repeater')) : the_row();
                            ?>
                            <h3 class="inventory-sheets-title">
                                <?php
                                $main_page_title_line = get_sub_field("main_page_title_line");
                                if (!empty($main_page_title_line)) {
                                    echo $main_page_title_line;
                                }
                                ?>
                            </h3>
                            <div class="inventory-lists">
                                <?php
                                if (have_rows('add_training_files')):
                                    while (have_rows('add_training_files')) : the_row();
                                        ?>
                                        <div class="inventory-list-item">
                                            <h4>
                                                <?php the_sub_field('training_title') ?>
                                            </h4>
                                            <?php the_sub_field('rep_sub_description'); ?>
                                            <?php
                                            $attachment_id = get_sub_field('rep_sub_file_attachment');
                                            $url = wp_get_attachment_url($attachment_id);
                                            $title = get_the_title($attachment_id);
                                            $path_info = pathinfo(get_attached_file($attachment_id));
                                            $filesize_aa = filesize(get_attached_file($attachment_id));
                                            $filesize = size_format($filesize_aa, 2);
                                            ?>
                                            <?php
                                            if(!empty($attachment_id)){
                                            ?>
                                            <div class="download-div">
                                                <a class="viewbtn" href="<?php echo $url; ?>">View</a>
                                                <span>or</span>
                                                <div class="download-details">
                                                    <a class="downloadbtn" href="<?php echo $url; ?>" download><img src="<?php echo get_template_directory_uri(); ?>/images/downloadIcon.png" alt="downloadIcon.png" />Download</a>
                                                    <span class="download-file-details">Size: <?php echo $filesize; ?>&nbsp;&nbsp;&nbsp;Format: <?php echo strtoupper($path_info['extension']); ?></span>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>