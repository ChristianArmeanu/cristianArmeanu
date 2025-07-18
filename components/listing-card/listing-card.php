<?php
    [
        'title' => $title,
        'content' => $content,
        'image' => $image,
        'icon' => $icon,
        'style' => $style,
    ] = $item;
    $cta_array = $item['cta']['items'] ?: array();
?>
<!-- data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" -->

<div class='component--listing-card <?php echo $style; ?>'>
    <?php 

        echo '<div class="card--background">';
        echo ($image ? '<div class="card--image" style="background-image: url('. $image["url"] .');">'.($style == 'widget' && $title ? '<h3>'.$title.'</h3>' : '').'</div>' : '');
        echo '</div>';
        if($style != 'image'){
            echo '<div class="card--content">';
            
            echo ($icon && !$image ? '<img src="'. $icon['url'] .'" />' : '');
            if($style != 'widget'){
                echo ($title ? '<h3>'.$title.'</h3>' : '');
            }
            echo ($content ? '<p>'.$content.'</p>' : '');
            
            if(count($cta_array) > 0){
                echo '<div class="cta--holder">';
                foreach($cta_array as $cta){
                    includeComponent('cta', true, array( 'text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon'] ));
                }
                echo '</div>';
            }
            echo '</div>';
        }
    ?>
</div>