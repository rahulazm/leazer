<?php
/**
 * Template Name: Team
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>

        
        <section class="erning_potential about_agent team">            
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 center-block">
                        <?php
                        $conternt = get_the_content();
                        if (!empty($conternt)) {
                            ?>
                            <p><?php echo $conternt; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>            
            </section>

            <section class="term_gallary" id="s-image">            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 no_space">
                            <?php
// check if the repeater field has rows of data
                            if (have_rows('gallery_section')):
                            // loop through the rows of data
                                while (have_rows('gallery_section')) : the_row();
                                    $gallery_image = get_sub_field('back_ground_image');
                                    $gallery_i_image = get_sub_field('icon_image');
                                    $gallery_dec = get_sub_field('image_content', FALSE, false);
                                    ?>
                                    <div class="inner_gallary">
                                        <a href="#">
                                            <img src="<?php echo $gallery_image['url']; ?>" alt="img">
                                            <div class="gallary_text">
												<div class="gal_inner_image">
                                                <img src="<?php echo $gallery_i_image['url']; ?>" alt="img">
												</div>
                                                <p><?php echo $gallery_dec; ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                endwhile;
                            else :
                        // no rows found
                            endif;
                            ?>
                        </div>                    
                    </div>
                </div>            
            </section>        

            <section class="agent_testimonial">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <div class="testimonial_video">
                                <?php
                                $video_url = get_field('video_url');
                                if (!empty($video_url)):
                                    ?>
                                    <iframe src="<?php echo $video_url; ?>"></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <?php
                            $Image = get_field('testimonial_image');
                            if (!empty($Image)):
                                ?>
                                <div class="test_img" style="background-image:url(<?php echo $Image['url']; ?>);width: 400px;height: 500px">
                                <?php endif; ?>

                                <div class="test_details">
                                    <?php
                                    $t_title = get_field('testimonial_title_team');
                                    if (!empty($t_title)):
                                        ?>
                                        <h2 style="color: #000000;font-size: 28px;"><?php echo $t_title; ?></h2>
                                    <?php endif; ?>

                                    <?php
                                    $t_content = get_field('testimonial_content_team',false,false);
                                    //if (!empty($t_content)):
                                        ?>
                                        <p>
                                            <?php echo $t_content; ?>
                                        </p>
                                    <?php// endif; ?>

                                    <?php
                                    $t_autj = get_field('testimonial_auther_team');
                                    if (!empty($t_autj)):
                                        ?>
                                        <span class="full_width text-center"><?php echo $t_autj; ?></span>
                                    <?php endif; ?>
                                    <div class="text-center"><a href="#" class="read_more" style="background-color: #4FCBD9">read more</a></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>

            <section class="agent_testimonial">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <div class="testimonial_video">
                                <?php
                                $video_url_2 = get_field('video_url_2');
                                if (!empty($video_url)):
                                    ?>
                                    <iframe src="<?php echo $video_url_2; ?>"></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <?php
                            $Image = get_field('testimonial_image_2');
                            if (!empty($Image)):
                                ?>
                                <div class="test_img" style="background-image:url(<?php echo $Image['url']; ?>);width: 400px;height: 500px">
                                <?php endif; ?>

                                <div class="test_details">
                                    <?php
                                    $t_title = get_field('testimonial_title_team_2');
                                    if (!empty($t_title)):
                                        ?>
                                        <h2 style="color: #000000;font-size: 28px"><?php echo $t_title; ?></h2>
                                    <?php endif; ?>

                                    <?php
                                    $t_content2 = get_field('testimonial_content_team_2',false,false);
                                    //if (!empty($t_content2)):
                                        ?>
                                        <p>
                                            <?php echo $t_content2; ?>
                                        </p>
                                    <?php //endif; ?>

                                    <?php
                                    $t_autj = get_field('testimonial_auther_team_2');
                                    if (!empty($t_autj)):
                                        ?>
                                        <span class="full_width text-center"><?php echo $t_autj; ?></span>
                                    <?php endif; ?>
                                    <div class="text-center"><a href="#" class="read_more" style="background-color: #4FCBD9">read more</a></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
            <section class="agent_testimonial">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <div class="testimonial_video">
                                <?php
                                $video_url_3 = get_field('video_url_3');
                                if (!empty($video_url_3)):
                                    ?>
                                    <iframe src="<?php echo $video_url_3; ?>"></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 no_space">
                            <?php
                            $Image = get_field('testimonial_image_3');
                            if (!empty($Image)):
                                ?>
                                <div class="test_img" style="background-image:url(<?php echo $Image['url']; ?>);width: 400px;height: 500px">
                                <?php endif; ?>

                                <div class="test_details">
                                    <?php
                                    $t_title = get_field('testimonial_title_team_3');
                                    if (!empty($t_title)):
                                        ?>
                                        <h2 style="color: #000000;font-size: 28px"><?php echo $t_title; ?></h2>
                                    <?php endif; ?>

                                    <?php
                                    $t_content3 = get_field('testimonial_content_team_3',false,false);
                                    //if (!empty($t_content)):
                                        ?>
                                        <p>
                                            <?php echo $t_content3; ?>
                                        </p>
                                    <?php // endif; ?>

                                    <?php
                                    $t_autj = get_field('testimonial_auther_team_3');
                                    if (!empty($t_autj)):
                                        ?>
                                        <span class="full_width text-center"><?php echo $t_autj; ?></span>
                                    <?php endif; ?>
                                    <div class="text-center"><a href="#" class="read_more" style="background-color: #4FCBD9">read more</a></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>


            <section class="agent_application">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2>Agent application</h2>
                            <?php
                            $form = get_field('form_name');
                            if (!empty($form)):
                                ?>
                                <?php echo $form;  ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </section>     
<script>
jQuery(document).ready(function($) {
    $("input[name=input_8]").on( "change", function() {
         var test = $(this).val();
      if(test == 'Yes'){
        $("#field_1_10 label").show();
        $("#input_1_10").show();
        $("#field_1_10 .ginput_container_select").show();
      }else{
        $("#field_1_10 label").hide();
        $("#input_1_10").hide();
        $("#field_1_10 .ginput_container_select").hide();
      }  
    } );
});
</script>
        <?php endwhile; ?>                 
    <?php endif; ?>
    <?php get_footer(); ?>