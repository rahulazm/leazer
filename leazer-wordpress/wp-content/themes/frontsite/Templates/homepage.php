<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<script type="text/javascript">
function OpenInNewTab(url) {
  var win = window.open(url, '_blank', 'height=250,width=400');
}
</script>

<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
        <div class="main_bg" <?php
        $banner_background_image = get_field('banner_background_image');
        if (!empty($banner_background_image)):
            ?> style="background-image: url(<?php echo $banner_background_image['url']; ?>) "
             <?php endif; ?>>
            <div class="half_top"></div>
            <div class="banner">            
                <div class="bg"></div>
                <!--                <div class="overlay" style="background-image: url(images/BannerShade.png);"></div>-->
                <?php
                $logo_description = get_field('logo_description');
                if (!empty($logo_description)):
                    ?>
                    <h1><?php echo $logo_description; ?> </h1>             
                <?php endif; ?>

                <div class="banner_details">
                    <h2><?php
                        $banner_title = get_field('banner_title');
                        if (!empty($banner_title)):
                            ?>
                            <?php echo $banner_title; ?>          
                        <?php endif; ?></h2>
                    <p>
                        <?php
                        $banner_description = get_field('banner_description');
                        if (!empty($banner_description)):
                            ?>
                            <?php echo $banner_description; ?>           
                        <?php endif; ?>
                    </p>
                    <a href="<?php the_field('home_read_more_link'); ?>" class="read_more">
                        <?php
                        $banner_button_name = get_field('banner_button_name');
                        if (!empty($banner_button_name)):
                            ?>
                            <?php echo $banner_button_name; ?>           
                        <?php endif; ?>
                    </a>

                    <div class="down text-center index_down">
                        <a href="#s-image">
                            <?php
                            $banner_button_arrow = get_field('banner_button_arrow');
                            if (!empty($banner_button_arrow)):
                                ?>
                                <img src="<?php echo $banner_button_arrow['url']; ?>" alt="arrow">
                            <?php endif; ?>
                        </a>
                    </div>
                </div> 
                <!--                <div class="mm"></div>-->
            </div>


            <div class="erning_potential" id="s-image">            
                <div class="custom_overlay"></div>
                <div class="erning_potential_details">
                    <h2>	<?php
                        $about_section_title = get_field('about_section_title');
                        if (!empty($about_section_title)):
                            ?>
                            <?php echo $about_section_title; ?>           
                        <?php endif; ?></h2>
                    <p class="small_title">	<?php
                        $about_section_sub_title = get_field('about_section_sub_title');
                        if (!empty($about_section_sub_title)):
                            ?>
                            <?php echo $about_section_sub_title; ?>           
                        <?php endif; ?></p>

                    <ul class="list">
                        <?php if (get_field('about_section_description')): ?>
                            <?php
                            while (has_sub_field('about_section_description')):
                                $description = get_sub_field('description_notes');
                                ?>
                                <li><?php echo $description; ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>                   

                    <div class="earn_point text-center">
                        <h2>Earning Potential</h2>
                        <?php if (get_field('earning_potential_section')): ?>
                            <?php
                            while (has_sub_field('earning_potential_section')):
                                $earning_potential_image = get_sub_field('earning_potential_image');
                                $earning_potential_from = get_sub_field('earning_potential_from');
                                $earning_potential_to = get_sub_field('earning_potential_to');
                                $earning_potential_description = get_sub_field('earning_potential_description');
                                ?>
                                <div class="earn_part">
                                    <div class="earn_img">
                                        <img src="<?php echo $earning_potential_image['url']; ?>" alt="">
                                        <div class="earn_details">
                                            <?php if (!empty($earning_potential_from)) { 
                                                $linkText=($earning_potential_from == "Vacations")?"onClick=OpenInNewTab('https://player.vimeo.com/video/231203891?autoplay=1&amp;loop=1?iframe=true')":"";
                                            ?>
                                                <h3 <?php echo $linkText; ?>>
                                                    <?php
                                                    if ($earning_potential_from == "Vacations") {
                                                        ?><?php
                                                    } else {
                                                        ?> <sup>$</sup><?php
                                                    }
                                                    ?>
                                                    <?php echo $earning_potential_from; ?> 
                                                <?php } ?>
                                                <?php if (is_numeric($earning_potential_from)) { ?>
                                                    <sup>$</sup><?php echo $earning_potential_from; ?> 
                                                <?php } ?>
                                                <?php if (!empty($earning_potential_to)) { ?>
                                                    <span>to</span>
                                                    <sup>$</sup><?php echo $earning_potential_to; ?>
                                                <?php } ?>
                                            </h3>
                                        </div>
                                        <?php
                                        if ($earning_potential_from == "Vacations") {
                                            ?>
											
											<div id="player-wrapper">
													<iframe id="player" frameborder="0" width="640" height="360" src="https://player.vimeo.com/video/231203891?autoplay=0&amp;loop=1"></iframe>
											</div>
                                            <!--<iframe class="iframe_video" src="https://player.vimeo.com/video/231203891?autoplay=1&loop=1" frameborder="0"></iframe>-->

                                        <?php } ?>
                                    </div>
                                    <p><?php echo $earning_potential_description; ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>     
                    <div class="text-center"><a href="<?php the_field('earning_potential_button_link'); ?>" class="read_more">
                            <?php
                            $earning_potential_button_name = get_field('earning_potential_button_name');
                            if (!empty($earning_potential_button_name)):
                                ?>
                                <?php echo $earning_potential_button_name; ?>           
                            <?php endif; ?></a></div>
                </div>

                <?php
                $woman_earning_potential_image = get_field('woman_earning_potential_image');
                if (!empty($woman_earning_potential_image)):
                    ?>
                    <img src="<?php echo $woman_earning_potential_image['url']; ?>" alt="arrow" class="girl">
                <?php endif; ?>
            </div>
        </div>

        <section class="gallary">
            <?php if (get_field('earning_potential_section')): ?>
                <?php
                while (has_sub_field('gallery_section')):
                    $gallery_title = get_sub_field('gallery_title');
                    $gallery_image = get_sub_field('gallery_image');
                    $gallery_description = get_sub_field('gallery_description');
                    $gallery_button_link = get_sub_field('gallery_button_link');

                    $string = preg_replace('/\s+/', '', $gallery_title);
                    ?>
                    <div class="gallary_part">
                        <h2 class="<?php echo $string; ?>"><?php if (isset($gallery_title)) { ?><?php echo $gallery_title; ?><?php } ?></h2>
                        <img src="<?php echo $gallery_image['url']; ?>" alt="">
                        <?php if (!empty($gallery_description)) { ?>                           
                            <div class="overlay">
                                <div class="text">						
                                    <?php if (isset($gallery_description)) { ?><?php echo $gallery_description; ?><?php } ?>
                                    <a href="<?php if (isset($gallery_button_link)) { ?><?php echo $gallery_button_link; ?> <?php } ?>" class="read_more">Read More</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if (!empty($gallery_title) && count($gallery_title) % 2 == 0) { ?>}
                        <div class="clearfix"></div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>	
        </section>

        <section class="term" 
        <?php
        $term_and_whole_image = get_field('term_and_whole_image');
        if (!empty($term_and_whole_image)):
            ?> style="background: url(<?php echo $term_and_whole_image['url']; ?>) "
                 <?php endif; ?>>
            <div class="term_details">
                <?php
                $term_and_whole_life = get_field('term_and_whole_life');
                if (!empty($term_and_whole_life)):
                    ?>
                    <h2><?php echo $term_and_whole_life; ?></h2>
                <?php endif; ?>
            </div>
        </section>

        <section class="company_logo">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <?php if (get_field('company_details')): ?>
                            <?php
                            while (has_sub_field('company_details')):
                                $company_link = get_sub_field('company_link');
                                $company_logo = get_sub_field('company_logo');
                                $total = count($company_logo);
                                ?>

                                <div class="all_logo">
                                    <?php if (!empty($company_logo)) { ?>
                                        <a href="<?php echo $company_link; ?>">
                                            <img src="<?php echo $company_logo['url']; ?>" alt="logo">
                                        </a>
                                    </div>
                                <?php } ?>    
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row second_row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <?php if (get_field('company_details_2')): ?>
                            <?php
                            while (has_sub_field('company_details_2')):
                                $company_link = get_sub_field('company_link');
                                $company_logo = get_sub_field('company_logo');
                                $total = count($company_logo);
                                ?>

                                <div class="all_logo">
                                    <?php if (!empty($company_logo)) { ?>
                                        <a href="<?php echo $company_link; ?>">
                                            <img src="<?php echo $company_logo['url']; ?>" alt="logo">
                                        </a>
                                    </div>
                                <?php } ?>    
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </section>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>