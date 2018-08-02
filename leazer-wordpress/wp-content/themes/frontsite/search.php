<?php get_header(); ?>
<p>&nbsp;</p>
<h2 style="color:#000;padding-bottom:15px;font-size:26px;margin-top:12px;">Search Results for - <i><?php echo $_GET['s']; ?></i></h2>
<?php $i = 0; ?>
<?php if (have_posts()) : ?>   
    <div class="row text-center">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-sm-4">
                    <div class="blog-thumbnail">
                        <?php
                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail('full');
                        } else {
                            ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/demo-image6.jpg" alt="img">
                        <?php } ?>
                        <div class="blog-text-block">
                            <div class="blog-left">
                                <span class="first"><?php the_time('M'); ?></span>
                                <span class="second"><?php the_time('j'); ?></span>
                                <span class="third"><?php the_time('Y'); ?></span>
                            </div>
                            <div class="blog-right">
                                <?php
                                if (get_post_type(get_the_ID()) == 'post') {
                                    $ID_post = get_the_ID();
                                    $categories = get_the_category($ID_post);
                                    ?>
                                    <p class="blog-cat"><a href="#"><?php echo $categories[0]->cat_name; ?></a></p>
                                    <?php
                                }
                                ?>
                                <p class="blog-name"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>  
        </div>  
    </div>

    <div class="pager">
        <?php
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
        wp_reset_query();
        ?>
    </div>               
    <div class="clear"></div>
<?php else: ?>    
    <div class="error"><?php _e('Not found.'); ?></div> 
<?php endif; ?>
<?php get_footer(); ?>