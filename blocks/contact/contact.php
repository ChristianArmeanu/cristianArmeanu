<?php 
    $content = get_field('content');
    $form = get_field('form');
    $type = get_field('type');
    $title = get_field('title');
?>

<section id='<?php echo $block['id']; ?>' class='block--contact <?php echo $type; ?>'>
    <div class="container">
        <div class="row">
            <?php if($type == 'default') : ?>
            <div class="col-12">
                <?php if($title) : ?>
                    <div class="title" data-aos="fade-down">
                        <h2><?php echo $title; ?></h2>
                        <div class="custom-dashed-line" data-aos="fade"></div>
                    </div>
                <?php endif; ?>
                <?php if( $content ) : ?>
                    <div class="content" data-aos="fade-up" data-aos-duration="1000">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php if( $form ) : ?>
                    <div class="form" data-aos="fade-up" data-aos-duration="1000">
                        <?php echo $form; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php elseif($type == 'contact-page') : ?> 
                <div class="col-12 col-md-12 col-lg-6">
                    <?php if( $content ) : ?>
                        <div class="content" data-aos="fade-up" data-aos-duration="1000">
                            <?php echo $content; ?>

                            <div class="socials">
                                <h3>Follow me on social media</h3>
                                <div class="social-icons">

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
                            </div>
                            <div class="email-address">
                                <p>Let's work together!</p>
                                <a href="mailto:cristian@cristianarmeanu.com">cristian@cristianarmeanu.com</a>
                            </div>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <?php if( $form ) : ?>
                        <div class="form" data-aos="fade-up" data-aos-duration="1000">
                            <?php echo $form; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>