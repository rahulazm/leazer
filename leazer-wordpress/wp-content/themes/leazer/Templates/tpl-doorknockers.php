<?php
/**
 * Template Name: Door Knockers
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
            <div class="payinvoice-content width85">
                <h3 class="door-header">PURCHASE DOOR KNOCKERS</h3>
                <div class="row bill-form">
                <?php
                if (have_posts()) :
                while (have_posts() ) : the_post();
                the_content(); 
                endwhile;
                else :
                echo wpautop( 'Sorry, no posts were found' );
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>