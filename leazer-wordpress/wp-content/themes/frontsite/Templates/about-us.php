<?php
/**
 * Template Name: About Us
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

	<?php while (have_posts()) : the_post(); ?>


		<section class="erning_potential about_agent">            
			<div class="custom_overlay"></div>
			<div class="container">
				<div class="row">
					<div class="agent">
						<div class="col-md-6 col-sm-6 col-xs-12">     
							<?php
							$about_image = get_field('about_image');
							if (!empty($about_image)):
								?>
								<img src="<?php echo $about_image['url']; ?>" alt="img">
							<?php endif; ?>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 agent">                        
							<div class="agent_details">
								<?php
								$about_content = get_field('about_us');
								if (!empty($about_content)):
									?>
									<?php echo $about_content; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div> 

		</section>

		<section class="about_founder" id="s-image">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h2>About the founder Art Leazer</h2>
						<div class="about_founder_img">
							<?php
							$founder_image = get_field('founder_image');
							if (!empty($founder_image)):
								?>
								<img src="<?php echo $founder_image['url']; ?>" alt="img" class="img-circle center-block">
							<?php endif; ?>
						</div>
						<?php
						$about_founder = get_field('about_founder', false, false);
						if (!empty($about_founder)):
							?>
							<p class="center-block"><?php echo $about_founder; ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="video">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-9 col-xs-12">
						<?php the_content(); ?>
						<div class="video_frame full_width">
							<?php
							$link = get_field('video_link');
							if (!empty($link)):
								?>
								<iframe id="video" src="<?php echo $link; ?>"></iframe>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="asidebar full_width">
							<ul class="full_width">
								<li class="twitter"><span class="twitter_icon"><i class="fa fa-twitter"></i></span><a href="#">Follow art</a></li>
								<li class="facebook"><span class="facebook_icon"><i class="fa fa-facebook"></i></span><a href="#">Add Art to your friend list</a></li>
								<li class="linkedin"><span class="linkedin_icon"><i class="fa fa-linkedin"></i></span><a href="#">Connect with Art</a></li>
							</ul>

							<div class="blog full_width">
								<?php
								$args = array('posts_per_page' => 3);
								$myposts_about = get_posts($args);
								foreach ($myposts_about as $blog_about) {
									$blog_id_about = $blog_about->ID;
									$blog_title_about = $blog_about->post_title;
									$blog_content_about = $blog_about->post_content;
									$blog_excerpt_about = $blog_about->post_excerpt;
									$blog_date_about = $blog_about->post_date;
									$blog_image_about = wp_get_attachment_image_src(get_post_thumbnail_id($blog_id_about), 'thumbnail');
									?>
									<div class="blog_part">
										<?php
										if (!empty($blog_image_about)){
											?>
											<img src="<?php echo $blog_image_about[0]; ?>" alt="img">
											<?php } else { ?>
											<img src="http://192.168.0.114/leazer/wp-content/uploads/2017/11/demo-image6.jpg" alt="img">
											<?php } ?>
											<h4><?php echo $blog_title_about; ?> </h4>
										</div>
										<?php
									} wp_reset_query();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>     
		<?php endwhile; ?>                 
	<?php endif; ?>
	<?php get_footer(); ?>
	