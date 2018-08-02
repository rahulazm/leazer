<?php
/**
 * Template Name: Quote Center
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>            

    <?php while (have_posts()) : the_post(); ?>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="content-wrapper width90">
                        <div class="col-md-12 quote_title">
                            <h3>More Quote Tools</h3>
                            <span style="border-bottom:1px solid #ff822b; width: 100%;margin: 10px 0 20px 0;float: left;"></span>
                        </div>
                        <div class="col-md-9 quote-center-content">
                            <div id="tab1" class="tabcontent" style="display:block;">
                                <?php the_field('qc_tab_content'); ?>
                            </div>
                            <div id="tab2" class="tabcontent" style="display:none;">
                                <?php the_field('foresters_content'); ?>
                            </div>
                            <div id="tab3" class="tabcontent" style="display:none;">
                                <?php the_field('moo_content'); ?>
                            </div>
                            <div id="tab4" class="tabcontent" style="display:none;">
                                <?php the_field('transamerica_content'); ?>
                            </div>
                            <div id="tab5" class="tabcontent" style="display:none;">
                                <?php the_field('phoenix_content'); ?>
                            </div>
                            <div id="tab6" class="tabcontent" style="display:none;">
                                <?php the_field('fg_content'); ?>
                            </div>
                            <div id="tab7" class="tabcontent" style="display:none;">
                                <?php the_field('american_equity_content'); ?>
                            </div>
                            <div id="tab8" class="tabcontent" style="display:none;">
                                <?php the_field('great_western_content'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 quote-center-sidebar">
                            <div class="sidebar-widget">
                                <div class="side-menu">
                                    <ul>
                                        <?php
                                        $cfg_tab_name = get_field('cfg_tab_name');
                                        if (!empty($cfg_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab1')"><?php echo $cfg_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $foresters_tab_name = get_field('foresters_tab_name');
                                        if (!empty($foresters_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab2')"><?php echo $foresters_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $moo_tab_name = get_field('moo_tab_name');
                                        if (!empty($moo_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab3')"><?php echo $moo_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $transamerica_tab_name = get_field('transamerica_tab_name');
                                        if (!empty($transamerica_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab4')"><?php echo $transamerica_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $phoenix_tab_name = get_field('phoenix_tab_name');
                                        if (!empty($phoenix_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab5')"><?php echo $phoenix_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $fg_tab_name = get_field('fg_tab_name');
                                        if (!empty($fg_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab6')"><?php echo $fg_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $american_equity_tab_name = get_field('american_equity_tab_name');
                                        if (!empty($american_equity_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab7')"><?php echo $american_equity_tab_name; ?></a></li>
                                            <?php
                                        }
                                        $great_western_tab_name = get_field('great_western_tab_name');
                                        if (!empty($great_western_tab_name)) {
                                            ?>
                                            <li><a href="javascript:void(0)" onclick="openMyTab(event, 'tab8')"><?php echo $great_western_tab_name; ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<script>
    function openMyTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<?php get_footer(); ?>