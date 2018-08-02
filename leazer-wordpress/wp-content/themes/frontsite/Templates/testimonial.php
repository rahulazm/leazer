<?php
/**
 * Template Name: Testimonial
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); 
            $testimonial_img = get_field('image_first');
            $testimonial_description = get_field('content_first');
            $testimonial_author = get_field('auther_first');
            $testimonial_loc = get_field('place');
            if(!empty($testimonial_img) && !empty($testimonial_description)){
    ?>

        <section class="testimonial_page" id="s-image">
            <div class="container">
                
                <div class="row">                    
                    <div class="first">                        
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="c_top">
                                <?php
                                if (!empty($testimonial_img)):
                                    ?>
                                    <div class="client"><img src="<?php echo $testimonial_img['url']; ?>" alt="img"></div>
                                <?php endif; ?>
                            </div> 
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="text">
                                <?php
                                if (!empty($testimonial_description)):
                                    ?>
                                    <?php echo $testimonial_description; ?>
                                <?php endif; ?>

                                <?php
                                if (!empty($testimonial_author)):
                                    ?>
                                    <h2><?php echo $testimonial_author; ?></h2> 
                                <?php endif; ?>

                                <?php
                                if (!empty($testimonial_loc)):
                                    ?>
                                    <span><?php echo $testimonial_loc; ?></span> 
                                <?php endif; ?>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            </section>
            <?php } ?>
            <?php
                $video_img = get_field('image');
                $video_link = get_field('video_url');
                if($video_img!="" && $video_link!=""){
            ?>
            <section class="testimonial_page c_video">
                <div class="container">
                    <div class="row">                    
                        <div class="first">      
                            
                            <div class="border-top one"></div>
                            <div class="col-md-8 col-md-offset-4 col-sm-12 col-xs-12">    
                                <div class="row">
                                    <div class="col-md-6 col-md-push-6 col-sm-12 col-xs-12">
                                        <div class="c_top">
                                            <div class="client"><img src="<?php echo $video_img['url']; ?>" alt="img"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-pull-6 col-sm-12 col-xs-12" style="right: 70%">                                                
                                        <div class="video_frame offset">
                                            <iframe src="<?php echo $video_link ?>"></iframe>
                                        </div>                                          
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>

            <section class="testimonial_page">
                <div class="container">
                    <?php
// check if the repeater field has rows of data
                    if (have_rows('testimonials')):
                        $i = 1;
                        // loop through the rows of data
                        while (have_rows('testimonials')) : the_row();
                            $testimonial_image = get_sub_field('testimonial_image');
                            $testimonial_desc = get_sub_field('testimonial_description');
                            $testimonial_auth = get_sub_field('testimonial_auther');
                            $testimonial_location = get_sub_field('location');
                            $i++;
                            if ($i % 2 == 0) {
                                ?>
                                <div class="row">                    
                                    <div class="first">
                                        <div class="border-top two"></div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="c_top"><div class="client"><img src="<?php echo $testimonial_image['url']; ?>" alt="img"></div></div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-xs-12">                    
                                            <div class="text">
                                                <?php echo $testimonial_desc; ?>
                                                <h2><?php echo $testimonial_auth; ?></h2>
                                                <span><?php echo $testimonial_location; ?></span>     
                                            </div>
                                        </div>                    
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="row">                    
                                    <div class="first">
                                        <div class="border-top three"></div>
                                        <div class="col-md-8 col-md-offset-4 col-sm-12  col-xs-12">    
                                            <div class="row">
                                                <div class="col-md-6 col-md-push-6 col-sm-12 col-xs-12">
                                                    <div class="c_top"><div class="client"><img src="<?php echo $testimonial_image['url']; ?>" alt="img"></div></div>
                                                </div>
                                                <div class="col-md-6 col-md-pull-6 col-sm-12 col-xs-12">                    
                                                    <div class="text offset">
                                                        <?php echo $testimonial_desc; ?>
                                                        <h2><?php echo $testimonial_auth; ?></h2>
                                                        <span><?php echo $testimonial_location; ?></span>  
                                                    </div>                                  
                                                </div>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        endwhile;
                    else :
                    // no rows found
                    endif;
                    ?>
                </div>
            </section>
            <?php
            $bottom_img = get_field('image_bottom');
            $bottom_content = get_field('content_bottom');
            ?>
            <section style="background-image: url(<?php echo $bottom_img['url']; ?>);" class="testimonial_banner">
                <div class="container">
                    <div class="row">                    
                        <div class="col-md-8 col-sm-8 col-xs-12 text-center center-block">
                            <?php echo $bottom_content; ?>
                           <div class="text-center"><a href="<?php echo get_site_url(); ?>/join-our-team" class="read_more">APPLY TODAY!</a></div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>                 
    <?php endif; ?>
    <?php get_footer(); ?>