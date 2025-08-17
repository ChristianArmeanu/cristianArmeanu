<?php 

// About section
$aboutTitle = get_field('about_title');
$aboutContent = get_field('about_content');
$bgImage = get_field('background_image');

// Project Section
$projectTitle = get_field('project_title');
$projectContent = get_field('project_content');
$projectSubcontent = get_field('project_subcontent');

?>

<section id='<?php echo $block['id']; ?>' class='block--custom-block'>
    <div class="about-section" id="about-me" style="background-image: url('<?php echo $bgImage['url']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrapper">
                        <div class="title">
                            <h2><?php echo $aboutTitle; ?></h2>
                            <div class="custom-dashed-line" data-aos="fade"></div>
                        </div>
                        <div class="content">
                            <?php echo $aboutContent; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project-section" id="projects">
        <img class="right" src="<?php echo get_template_directory_uri(); ?>/assets/img/right.png" alt="<?php echo get_bloginfo('name'); ?>">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrapper">
                        <div class="title">
                            <h2><?php echo $projectTitle; ?></h2>
                            <div class="custom-dashed-line" data-aos="fade"></div>
                        </div>
                        <div class="content">
                            <?php echo $projectContent; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                    <div class="portfolio-item" data-bg="<?php echo esc_url($featured_image); ?>">
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
        <img class="left" src="<?php echo get_template_directory_uri(); ?>/assets/img/left.png" alt="<?php echo get_bloginfo('name'); ?>"> 

        <div class="subcontent">
            <p><?php echo $projectSubContent; ?></p>
        </div>
    </div>

</section>