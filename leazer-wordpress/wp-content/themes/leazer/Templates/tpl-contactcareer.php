<?php
/**
 * Template Name: Career Contact
 *
 * @package WordPress
 * @subpackage Theme_name
 * @since Theme_name 1.0
 */
?>
<?php
get_header();

$cfg = get_field('cfg');
$cfg_content = get_field('cfg_content');

$foresters = get_field('foresters');
$forester_content = get_field('forester_content');

$moo = get_field('moo');
$moo_content = get_field('moo_content');

$transamerica = get_field('transamerica');
$transamerica_content = get_field('transamerica_content');

$phoenix = get_field('phoenix');
$phoenix_content = get_field('phoenix_content');

$fg = get_field('f&g');
$fg_content = get_field('f&g_content');

$american_equity = get_field('american_equity');
$american_equity_content = get_field('american_equity_content');

$great_western = get_field('great_western');
$great_western_content = get_field('great_western_content');
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="content-wrapper width90">
                <div class="col-md-12 carrier-contact-content">
                    <h4>Click through the tabs on the left for specific carrier information or click the link below to download a PDF of all Leazer Group Carrier contact information.</h4>
                    <a href="<?php echo get_template_directory_uri(); ?>/images/TLGCarrierContactInfo.pdf" class="downbtn" download>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/downloadIcon-orange.png" alt="downloadIcon-orange.png">DOWNLOAD<span>Size: 500 KB&nbsp;&nbsp;&nbsp;Format: PDF</span>
                    </a>
                    
                </div>
                <div class="col-md-9 col-sm-8 carrier-contact-content">
                    <div id="tab1" class="tabcontent" style="display:block;">
                        <?php
                        if ($cfg_content) {
                            echo $cfg_content;
                        }
                        ?>
                    </div>
                    <div id="tab2" class="tabcontent" style="display:none;">
                        <?php
                        if ($forester_content) {
                            echo $forester_content;
                        }
                        ?>
                    </div>
                    <div id="tab3" class="tabcontent" style="display:none;">
                        <?php
                        if ($moo_content) {
                            echo $moo_content;
                        }
                        ?>
                    </div>
                    <div id="tab4" class="tabcontent" style="display:none;">
                        <?php
                        if ($transamerica_content) {
                            echo $transamerica_content;
                        }
                        ?>
                    </div>
                    <div id="tab5" class="tabcontent" style="display:none;">
                        <?php
                        if ($fg_content) {
                            echo $fg_content;
                        }
                        ?>
                    </div>
                    <div id="tab6" class="tabcontent" style="display:none;">
                        <?php
                        if ($phoenix_content) {
                            echo $phoenix_content;
                        }
                        ?>

                    </div>
                    <div id="tab7" class="tabcontent" style="display:none;">
                        <?php
                        if ($american_equity_content) {
                            echo $american_equity_content;
                        }
                        ?>
                    </div>
                    <div id="tab8" class="tabcontent" style="display:none;">
                        <?php
                        if ($great_western_content) {
                            echo $great_western_content;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 quote-center-sidebar car-sidebar">
                    <div class="sidebar-widget">
                        <div class="side-menu">
                            <ul>
                                <li><a class="tab" onclick="openCity(event, 'tab1')"><?php
                                        if ($cfg) {
                                            echo $cfg;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab2')"><?php
                                        if ($foresters) {
                                            echo $foresters;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab3')"><?php
                                        if ($moo) {
                                            echo $moo;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab4')"><?php
                                        if ($transamerica) {
                                            echo $transamerica;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab5')"><?php
                                        if ($fg) {
                                            echo $fg;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab6')"><?php
                                        if ($phoenix) {
                                            echo $phoenix;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab7')"><?php
                                        if ($american_equity) {
                                            echo $american_equity;
                                        }
                                        ?></a></li>
                                <li><a class="tab" onclick="openCity(event, 'tab8')"><?php
                                        if ($great_western) {
                                            echo $great_western;
                                        }
                                        ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            //tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        //evt.currentTarget.className += " active";
    }
</script>

<script>
jQuery(document).ready(function($) {
$(".tab").click(function () {
    $(".tab").removeClass("active1");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active1");   
});
});
</script>
<style>
    .active1{
        background-color: #3F3F3F !important;
        color:#FFF !important;
    }
</style>
<?php get_footer(); ?>