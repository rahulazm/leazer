<?php
/**
 * Template Name: Audio Training
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
                            <?php
                            if (have_rows('add_audio_category')):
                                $i = 1;
                                while (have_rows('add_audio_category')) : the_row();
                                    ?>
                                    <div class="audio-subject" id="audio-training-<?php echo $i; ?>">
                                        <p class="subject-title"><?php the_sub_field('add_sub_rep_audio_category_name'); ?></p>
                                        <?php
                                        if (have_rows('rep_add_category_audios')):

                                            while (have_rows('rep_add_category_audios')) : the_row();
                                                ?>
                                                <div class="subject-audio">
                                                    <img src="<?php the_sub_field('rep_sub_audio_cover_image'); ?>" alt="audio-subject.jpg" />
                                                    <div class="audio-box">
                                                        <h4><span><?php the_sub_field('sub_rep_audio_title'); ?></span><?php the_sub_field('rep_sub_audio_author'); ?></h4>
                                                        <audio controls="controls">
                                                            <source src="<?php the_sub_field('rep_sub_add_audion_file'); ?>" type="audio/mpeg" />
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        <a class="audio-downbtn" href="<?php the_sub_field('rep_sub_add_audion_file'); ?>" download>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/audio-download-icon.png" alt="<?php echo get_template_directory_uri(); ?>/images/audio-download-icon.png"/>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                            endif;
                            ?>
                        </div>
                        <?php get_sidebar(); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>