<?php
/**
 * Template Name: Video Training
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
                    <div class="content-wrapper width85">
                        <div class="col-md-9 col-sm-8">
                            <?php
                            if (have_rows('video_training_category_repeater')):
                                $i = 1;
                                while (have_rows('video_training_category_repeater')) : the_row();
                                    ?>
                                    <div class="video-subject" id="video-training-<?php echo $i; ?>">
                                        <p class="subject-title"><?php the_sub_field('video_taining_category_name'); ?></p>
                                        <?php
                                        if (have_rows('video_training_add_category_videos_repeater')):
                                            while (have_rows('video_training_add_category_videos_repeater')) : the_row();
                                                ?>
                                                <div class="subject-video">                                                   
                                                    <iframe width="560" height="315" src="<?php the_sub_field('vt_sub_video_link'); ?>" frameborder="0" allowfullscreen></iframe>
                                                    <h4><?php the_sub_field('vt_sub_video_title'); ?></h4>
                                                    <?php $pass = get_sub_field('vt_sub_video_password'); ?>
                                                    <span class="video-code"><?php if (!empty($pass)) { ?>(code: <?php echo $pass; ?>)<?php } ?></span>
                                                    <span class="video-time" id="embed"></span>                                
                                                    <div class="clearfix"></div>
                                                    <?php the_sub_field('vt_sub_video_description'); ?>
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
  <script>
        var videoUrl = 'http://www.vimeo.com/7100569';
        var endpoint = 'http://www.vimeo.com/api/oembed.json';
        var callback = 'embedVideo';
        var url = endpoint + '?url=' + encodeURIComponent(videoUrl) + '&callback=' + callback + '&width=640';
        
        function embedVideo(video) {    
            document.getElementById('embed').innerHTML = unescape(video.duration);
        }
        // This function loads the data from Vimeo
        function init() {
            var js = document.createElement('script');
            js.setAttribute('type', 'text/javascript');
            js.setAttribute('src', url);
            document.getElementsByTagName('head').item(0).appendChild(js);
        }
        // Call our init function when the page loads
        window.onload = init;
    </script>
<?php endif; ?>
<?php get_footer(); ?>