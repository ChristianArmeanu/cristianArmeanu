
</main>

        <footer>

            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-column">

                        <div class="footer-logo">
                            <a href="<?php echo get_bloginfo('wpurl'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cristian-logo-white.png" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                        </div>
                        <div class="socials">
                            <div class="instagram">
                                <a href="https://www.instagram.com/cristian_armeanu/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="linkedin">
                                <a href="https://www.linkedin.com/in/cristian-armeanu-018b23230/" target="_blank" rel="noopener noreferrer" class="links">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        <div class="email-address">
                            <p>Let's work together!</p>
                            <a href="mailto:cristian@cristianarmeanu.com">cristian@cristianarmeanu.com</a>
                        </div>
                        <div class="footer-copyright">
                            <span>&copy; <?php echo date('Y'); ?> Cristian Armeanu. All rights reserved | Made with <span style="color:#e25555;">&hearts;</span></span>
                        </div>


                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>