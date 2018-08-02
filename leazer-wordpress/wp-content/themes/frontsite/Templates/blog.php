<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>


        <section class="blog-section" id="s-image">
            <div class="container">
                <div class="content-wrapper">
                    <div id="blogcontnt" class="blog-content">

                        <!--                        <div class="row text-center">-->
                        <?php
                        $arg = array('posts_per_page' => 6);
                        $blogs = get_posts($arg);
                        $i = 1;
                        foreach ($blogs as $blogb) {
                            $ablog_id = $blogb->ID;
                            $ablog_title = $blogb->post_title;
                            $ablog_content = $blogb->post_content;
                            $ablog_date = $blogb->post_date;
                            $ablog_image = wp_get_attachment_image_src(get_post_thumbnail_id($ablog_id), 'thumbnail');
                            if ($i % 3 == 1) {
                                echo '<div class="row text-center">';
                            }
                            $i++;
                            ?>
                            <div class="col-sm-4">
                                <div class="blog-thumbnail">
                                    <?php
                                    if (!empty($ablog_image)) {
                                        ?>
                                        <img src="<?php echo $ablog_image[0]; ?>" alt="Lights">
                                    <?php } else { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/demo-image6.jpg" alt="img">
                                    <?php } ?>
                                    <div class="blog-text-block">
                                        <div class="blog-left">
                                            <span class="first"><?php echo date("M", strtotime($ablog_date)); ?></span>
                                            <span class="second"><?php echo date("j", strtotime($ablog_date)); ?></span>
                                            <span class="third"><?php echo date("Y", strtotime($ablog_date)); ?></span>
                                        </div>
                                        <div class="blog-right">
                                            <?php 
                                            $categories = get_the_category($blogb->ID);
                                            ?>
                                            <p class="blog-cat"><a href="#"><?php echo $categories[0]->cat_name; ?></a></p>
                                            <p class="blog-name"><a href="<?php echo get_permalink($ablog_id); ?>"><?php echo $ablog_title; ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i % 3 == 1) {
                                echo '</div>';
                            }
                            ?>
                            <?php
                        } wp_reset_query();
                        ?>
                        <!--</div>-->
                        <div class="more-blog text-center">
                            <a href="<?php the_field('search_archive_button_link'); ?>">Search Archive</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>                 
<?php endif; ?>
<?php get_footer(); ?>