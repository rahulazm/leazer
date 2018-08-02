<?php get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="content-wrapper">
                <div class="bill-me-content">

                    <?php if (have_posts()) : ?>            

                        <?php while (have_posts()) : the_post(); ?>

                            <div class="post-box">

                                <h2 class="title" style=" border-bottom: 1px solid hsl(25, 100%, 58%);
                                    color: hsl(25, 100%, 58%);
                                    font-size: 25px;
                                    font-weight: 400;
                                    margin-bottom: 0;
                                    margin-top: 5px;
                                    padding: 10px 0 15px;
                                    width: 100%;"><?php the_title(); ?></h2>

                                <p class="byline">Written by: <span><?php the_author_link(); ?></span> on <span><?php the_time(get_option('date_format')); ?></span></p>

                                <?php the_content(); ?>  

                                <div class="post-meta">Posted in <?php the_category(',') ?> | <?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?></div>
                            </div>

                            <div class="post-box">

                                <?php comments_template(); ?>

                            </div>            		

                        <?php endwhile; ?>                 

                    <?php else: ?>    

                        <div class="error"><?php _e('Not found.'); ?></div> 

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>