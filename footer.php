
</main>

        <footer data-aos="fade" data-aos-offset="-300">
        <img data-aos="slide-left"  data-aos-offset="-300" class="right" src="<?php echo get_template_directory_uri(); ?>/assets/img/right.png" alt="<?php echo get_bloginfo('name'); ?>"> 

            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-column">

                        <div class="footer-logo" data-aos="fade-down" data-aos-offset="-300">
                            <a href="<?php echo get_bloginfo('wpurl'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/new-logo.png" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                        </div>
                        <div class="socials" data-aos="fade-up" data-aos-offset="-300">
                            <div class="instagram">
                                <a aria-label="Instagram" href="https://www.instagram.com/cristian_armeanu/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="linkedin">
                                <a aria-label="LinkedIn" href="https://www.linkedin.com/in/cristian-armeanu-018b23230/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        <div class="email-address" data-aos="fade-up" data-aos-offset="-300">
                            <p>Let's work together!</p>
                            <a aria-label="Email" href="mailto:cristian@cristianarmeanu.com">cristian@cristianarmeanu.com</a>
                        </div>
                        <div class="footer-menu-wrapper" data-aos="fade-up" data-aos-offset="-300">
                            <?php wp_nav_menu(array('theme_location' => 'footer-primary', 'walker' => new MainMenuPrimary())); ?>

                        </div>
                        <div class="footer-copyright" data-aos="fade-up" data-aos-offset="-300">
                            <span>&copy; <?php echo date('Y'); ?> Cristian Armeanu. All rights reserved | Made with <span style="color:#e25555;">&hearts;</span></span>
                        </div>


                    </div>
                </div>
            </div>
        </footer>
        <div id="popup-overlay"></div>

        <div id="popup-enquiry">
            <button class="close-popup">X</button>
            <div class="popup-header">
                <h3>Let's Work Together</h3>
            </div>
            <?php echo do_shortcode('[forminator_form id="991"]'); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>