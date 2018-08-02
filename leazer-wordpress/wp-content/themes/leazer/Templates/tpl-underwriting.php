<?php
/**
 * Template Name: Underwriting Tools
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
                    <div class="content-wrapper">
                        <div class="form-depot-accordian">
                            <div class="accordion">
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-1">Mortgage Protection<span class="accordian-plus">+</span></a>
                                    <div id="accordion-1" class="accordion-section-content">  
                                        <p>
                                            <a href="https://leazergroup.com/mp-grid/" target="_blank" rel="noopener">Mortgage Protection Grid Access</a>
                                            <br/>
                                            <br/>
                                            <a href="https://agentportal.leazergroup.com/wp-content/uploads/2015/12/Phoenix-Diabetic-Underwriting.pdf" target="_blank" rel="noopener">Phoenix Diabetic Underwriting Guide</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-2">Build Underwriting Tool<span class="accordian-plus">+</span></a>
                                    <div id="accordion-2" class="accordion-section-content">
                                        <p>Build Grid Access: <a target="_blank" href="https://leazergroup.com/underwriting-build-grid/">Build Underwriting Grid</a></p>
                                    </div>
                                </div>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-3">Final Expense<span class="accordian-plus">+</span></a>
                                    <div id="accordion-3" class="accordion-section-content">
                                        <p>Final Expense Grid Access: <a target="_blank" href="https://leazergroup.com/final-expense-grid">Final Expense Grid</a></p>
                                    </div>
                                </div>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-4">Annuity<span class="accordian-plus">+</span></a>
                                    <div id="accordion-4" class="accordion-section-content">
                                        <p><a target="_blank" href="https://leazergroup.com/annuity-grid/">Annuity Guide</a></p>
                                    </div>
                                </div>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-5">Product Pocket Guide<span class="accordian-plus">+</span></a>
                                    <div id="accordion-5" class="accordion-section-content">
                                        <p><a target="_blank" href="https://leazergroup.com/pocket-guide/">Product Pocket Guide</a></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>                 

<?php endif; ?>
<?php get_footer(); ?>