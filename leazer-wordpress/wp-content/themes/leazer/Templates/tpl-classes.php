<?php
/**
 * Template Name: Classes
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="content-wrapper">
                <div class="col-md-9 col-sm-8 classes-content">
                    <?php
                    $video = get_field('tla_video');
                    $tab1 = get_field('tlg_orientation');
                    $tab2 = get_field('foresters_training');
                    $tab3 = get_field('phoenix_training');

                    $tab1content = get_field('tlg_courses');
                    $tab2content = get_field('foresters_courses');
                    $tab3content = get_field('phoenix_courses');
                    ?>

                    <ul class="nav nav-tabs">
                        <?php if ($tab1) { ?>
                            <li class="tab1 active"><a data-toggle="tab" href="#classes-training-1"><?php echo $tab1; ?></a></li>
                        <?php } if ($tab2) { ?>
                            <li class="tab2"><a data-toggle="tab" href="#classes-training-2"><?php echo $tab2; ?></a></li>
                        <?php } if ($tab3) { ?>
                            <li class="tab3"><a data-toggle="tab" href="#classes-training-3"><?php echo $tab3; ?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div id="classes-training-1" class="tab-pane fade in active">
                            <?php if ($video) { ?>
                                <iframe width="100%" height="400" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
                            <?php } ?>
                            <?php echo do_shortcode('[wpcourse course="3" module_desc="true" show_title="true" show_desc="true" /]'); ?>
                        </div>
                        <div id="classes-training-2" class="tab-pane fade">
                            <?php echo do_shortcode('[wpcourse course="1" module_desc="true" show_title="true" show_desc="true" /]'); ?>
                        </div>
                        <div id="classes-training-3" class="tab-pane fade">
                            <?php echo do_shortcode('[wpcourse course="2" module_desc="true" show_title="true" show_desc="true" /]'); ?>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){

       $(".link-classes-training-1").on("click",function(){
            $(".tab1").attr('class', "tab1 active");
            $(".tab3").attr('class', "tab3 inactive");
            $(".tab2").attr('class', "tab2 inactive");
        });

        $(".link-classes-training-2").on("click",function(){
            $(".tab1").attr('class', "tab1 inactive");
            $(".tab3").attr('class', "tab3 inactive");
            $(".tab2").attr('class', "tab2 active");
        });

        $(".link-classes-training-3").on("click",function(){
            $(".tab1").attr('class', "tab1 inactive");
            $(".tab2").attr('class', "tab2 inactive");
            $(".tab3").attr('class', "tab3 active");
        });
    });
</script>
<?php get_footer(); ?>