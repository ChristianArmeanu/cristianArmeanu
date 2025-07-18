<?php
    $backgroundImage = get_field('background_image') ? get_field('background_image')['sizes']['hero'] : false;
    $title = get_field('title');
    $content = get_field('content');
    $items = get_field('items');
    $style = get_field('style');
    $type = get_field('type');
  

?>
<section 
    id='<?php echo $block['id']; ?>' class='block--listing' 
    <?php if($backgroundImage): ?>
    style="background-image: url(<?php echo $backgroundImage; ?>"
    <?php endif; ?>
>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="listing--content" >
                    <?php echo $title ? '<h2>'.$title.'</h2>' : ''; ?>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="listing--wrapper <?php echo $type; ?>" >
                <?php
                    if($items):
                        foreach($items as $item){
                            $item['style'] = $style;
                            includeComponent('listing-card', true, array( 'item' => $item ));
            
                        }
                    endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</section>