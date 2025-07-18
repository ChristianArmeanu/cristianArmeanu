
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
                        <div class="footer-copyright">
                            <p>&copy; <?php echo date('Y'); ?> Cristian Armeanu. All rights reserved.</p>
                        </div>
    
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>