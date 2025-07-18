<?php
    $bgColor = get_field('bg_color') ?: 'platinum';
    $content = get_field('content');
    $image = get_field('image') ?: false;
    $flip_content = get_field('flip_content');
    $cta_array = get_field('cta')['items'];



?>
<section id='<?php echo $block['id']; ?>' class='block--content <?php echo ($flip_content ? 'flex-row-reverse' : ''); ?> <?php echo $additional_class; ?>'>

    <div class="grid--container <?php echo $classes; ?>" data-bgcolor="<?php echo $bgColor; ?>">

        <?php if($image): ?> 
        <div class="image <?php echo $classes_2; ?>" data-bgcolor="<?php echo $bgColor; ?>" style="background-image: url(<?php echo ($image ? $image['sizes']['large'] : ''); ?>);"></div>
        <?php endif; ?>

        

        <div class="container">
            <div class="row d-flex">

                <div class="col-12">
                    <div class="content--wrapper">
                        <?php 
                            echo $content;

                            if($cta_array):
                                if(count($cta_array) > 0):
                                    echo '<div class="cta--holder '.$classes_3.'">';
                                    foreach($cta_array as $cta):
                                        includeComponent('cta', true, array( 'text' => $cta['cta_text'], 'url' => $cta['cta_url'], 'icon' => $cta['cta_icon'] ));
                                    endforeach;
                                    echo '</div>';
                                endif;
                            endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>