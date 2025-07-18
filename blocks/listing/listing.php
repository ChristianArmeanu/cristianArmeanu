<?php
    $content = get_field('content');
?>
<section id='<?php echo $block['id']; ?>' class='block--listing'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($content): ?>
                    <div class="content-wrapper">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <div class="listing-wrapper">
                    <?php
                        $args = array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => -1
                        );

                        $query = new WP_Query($args);

                        $delay = 0;

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();

                                $id = get_the_ID();
                                $title = get_the_title();
                                $description = get_field('description', $id);
                                $url = get_field('url', $id);
                                $content = get_the_content();
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        ?>

                            <div class="portfolio-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                                <div class="project-bg">
                                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                                        <div class="portfolio-item-inner">
                                            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($title); ?>">
                                            <div class="portfolio-content">
                                                <strong><?php echo wp_kses_post($content); ?></strong>
                                                <h3><?php echo $title; ?></h3>
                                                <p class="description"><?php echo $description; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                            $delay += 100; // crește delay-ul cu 100ms per item
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>