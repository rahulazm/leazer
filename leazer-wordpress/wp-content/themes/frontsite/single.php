<?php get_header(); ?>
<section class="video">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <!--<div class="wrapper">-->
            <!--    	<div class="blog-left">-->

            <?php if (have_posts()) : ?>            

                <?php while (have_posts()) : the_post(); ?>

                   <div class="col-md-9">
                        <div class="blog-list blog-detail">
                            <?php the_post_thumbnail(); ?>
                            <div class="blog-list-content">
                                <div class="blog-content">
                                    <h3><?php the_title(); ?></h3>
                                    <h4 style="padding-top: 5px"><?php the_time('M d,Y');  ?></h4>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>      		

                <?php endwhile; ?>                 

            <?php else: ?>    

                <div class="error"><?php _e('Not found.'); ?></div> 

            <?php endif; ?>


        </div>
        <div class="content-right">        	
            <?php // get_sidebar(); ?>
        </div>
        <div class="clear"></div>
    </div>
    </section>
<?php get_footer(); ?>