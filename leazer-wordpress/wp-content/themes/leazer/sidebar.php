<?php
$classes_title = get_field('classes_title', 'option');
$audio_title = get_field('audio_title', 'option');
$video_title = get_field('video_title', 'option');
$training_title = get_field('training_title', 'option');
$webinars = get_field('webinars', 'option');
?>
<div class="col-md-3 col-sm-4 classes-sidebar">
<h3>TLG University</h3>
<div class="search-form">
    <form class="search_form" action="<?php bloginfo('url'); ?>" method="get">
        <img class="img_search" src="<?php echo get_template_directory_uri(); ?>/images/trainingSearchIcon.png" alt="trainingSearchIcon.png" />
        <input type="text" class="input_search" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" />
    </form>
</div>
<div class="sidebar-widget">
    <?php if($classes_title)
    {?>
    <h4><?php echo $classes_title;?></h4>
    <?php } ?>
    
    <div class="side-menu">
        <ul>
            <?php
                if (have_rows('classes','option')):
                    $i=1;
                    while (have_rows('classes','option')) : the_row();
                        ?>
                        <li><a href="<?php the_sub_field('classes_link','option'); ?>#classes-training-<?php echo $i; ?>" data-toggle="tab" class="link-classes-training-<?php echo $i; ?>"><?php the_sub_field('classes_title','option'); ?></a></li>
                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
        </ul>
    </div>
</div>
<div class="sidebar-widget">
    <?php if($audio_title)
    {?>
    <h4><?php echo $audio_title;?></h4>
    <?php } ?>
    <div class="side-menu">
        <ul>
          <?php
                if (have_rows('audio_training','option')):
                    $i=1;
                    while (have_rows('audio_training','option')) : the_row();
                        ?>
                        <li><a href="<?php the_sub_field('audio_link','option'); ?>#audio-training-<?php echo $i; ?>"><?php the_sub_field('audio_title','option'); ?></a></li>
                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
        </ul>
    </div>
</div>
<div class="sidebar-widget">
    <?php if($video_title)
    {?>
    <h4><?php echo $video_title;?></h4>
    <?php } ?>
    <div class="side-menu">
        <ul>
           <?php
                if (have_rows('video_training','option')):
                    $i=1;
                    while (have_rows('video_training','option')) : the_row();
                        ?>
                        <li><a href="<?php the_sub_field('video_link','option'); ?>#video-training-<?php echo $i; ?><?php the_sub_field('section_video_link','option'); ?>"><?php the_sub_field('video_title','option'); ?></a></li>
                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
        </ul>
    </div>
</div>
<div class="sidebar-widget">
    <?php if($training_title)
    {?>
    <h4><?php echo $training_title;?></h4>
    <?php } ?>
    
    <div class="side-menu">
        <ul>
            <?php
                if (have_rows('training_documents','option')):
                    while (have_rows('training_documents','option')) : the_row();
                        ?>
                        <li><a href="<?php the_sub_field('trainning_link','option'); ?>"><?php the_sub_field('trainning_title','option'); ?></a></li>
                        <?php
                    endwhile;
                endif;
            ?>
        </ul>
    </div>
</div>
<div class="sidebar-widget">
    <div class="text-widget">
        <ul class="custommenu">
            <?php 
            $calender = get_field('calender', 'option');
            $webinar = get_field('webinars', 'option');
            ?>
            <li>
                <a href="<?php echo $calender;?>">CALENDER</a>
            </li>
            <li>
            <a href="<?php echo $webinars;?>">WEBINARS</a>
            </li>
        </ul>
    </div>
</div>
</div>