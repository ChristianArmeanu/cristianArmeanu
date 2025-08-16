<?php
    $type = get_field('type');
    $backgroundImage = get_field('background_image');
    $video = get_field('video');
    $slider = get_field('slider');
    $videoSlider = get_field('video_slider');
    $content = get_field('content');
    $cta_array = get_field('cta')['items'] ?: array();

?>

<?php if ($slider): ?>

    <section id='<?php echo $block['id']; ?>' class='block--hero <?php echo $type; ?>'  data-aos="fade">
        
            <div class="slider-1">
                <div class="layer">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <div class="content-wrapper">

                                    <?php echo $content; ?>

                                    <?php
                                        if (count($cta_array) > 0) {
                                            echo '<div class="cta--holder">';
                                            foreach ($cta_array as $cta)
                                                includeComponent('cta', true, array('text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon']));
                                            echo '</div>';
                                        }
                                    ?>

                                </div> 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    
            <div class='hero-slider'>
                <?php foreach ($slider as $slide): ?>
                    <?php $image = $slide['image']; ?>
                    
                    <div class="slider" <?php echo ($image ? 'style="background-image: url(' . $image['url'] . ');"' : ''); ?>></div>

                <?php endforeach; ?>
            </div>


    </section>
<?php endif; ?>

<?php if (!$slider && $type == 'image'): ?>
    <section id='<?php echo $block['id']; ?>' class='block--hero <?php echo $type; ?>' <?php echo ($backgroundImage ? 'style="background-image: url(' . $backgroundImage['url'] . ');"' : ''); ?> data-aos="fade">

        <div class="layer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="content-wrapper">

                            <?php echo $content; ?>
                            <?php
                            if (count($cta_array) > 0) {
                                echo '<div class="cta--holder">';
                                foreach ($cta_array as $cta)
                                    includeComponent('cta', true, array('text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon']));
                                echo '</div>';
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($type == 'video'): ?>
    <section id='<?php echo $block['id']; ?>' class='block--hero video' data-aos="fade">
    <div class="layer">

        <div class="video-wrapper">
            <?php if ($video): ?>
                <video autoplay muted loop playsinline>
                    <source src="<?php echo $video['url']; ?>" type="video/mp4">
                    <track src="<?php echo get_template_directory_uri(); ?>/assets/img/captions.vtt" kind="captions" srclang="en" label="English Captions">
                    Your browser does not support the video tag.
                </video>

            <?php endif; ?>
            <div class="content-wrapper">
                <div class="hero-content">
                    <?php echo $content; ?>
                </div>

                <?php
                    if (count($cta_array) > 0) {
                        echo '<div class="cta--holder">';
                        foreach ($cta_array as $cta)
                            includeComponent('cta', true, array('text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon']));
                        echo '</div>';
                    }
                ?>
            </div>

        </div>
    </div>
    </section>
<?php endif; ?>

<?php if ($type == 'video-slider'): ?>
    <section id='<?php echo $block['id']; ?>' class='block--hero video-slider' data-aos="fade">
        <div class="hero-slider">
            <?php foreach ($videoSlider as $slide): ?>
                <div class="slider-video">
                    <video autoplay muted loop>
                        <source src="<?php echo $slide['video_slide']['url']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="content-wrapper">
            <?php echo $content; ?>
            <?php
            if (count($cta_array) > 0) {
                echo '<div class="cta--holder">';
                foreach ($cta_array as $cta)
                    includeComponent('cta', true, array('text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon']));
                echo '</div>';
            }
            ?>
        </div>
    </section>
<?php endif; ?>
