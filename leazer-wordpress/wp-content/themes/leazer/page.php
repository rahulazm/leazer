<?php get_header();?>
<div id="content" class="container">
	<div class="wrapper">
    	<div class="content-left">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            	<h2 class="title"><?php the_title(); ?></h2>  
            	<?php the_content(); ?>  
            <?php endwhile; else: ?>    
            	<div class="error"><?php _e('Not found.'); ?></div> 
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
</div><!-- EOF : content ID -->
<?php get_footer(); ?>