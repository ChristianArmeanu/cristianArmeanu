<?php 

    $type = get_field('type');
    $bgColor = get_field('background_color');
    $items = get_field('items');
    $content = get_field('content');
    $title = get_field('title');
?>

<section id='<?php echo $block['id']; ?>' class='block--intro <?php echo $type; ?>' data-aos="fade">
    <div class="container">
        <div class="bg-color <?php echo $bgColor; ?>">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrapper">
                        <?php if($title): ?>
                            <h2 data-aos="fade-up"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if($content) : ?>
                            <?php echo $content; ?>
                        <?php endif; ?>
                    </div>
                    <?php if($type == 'skills') : ?>
                        <div class="skills-wrapper">
                            <ul>
                                <?php foreach($items as $item): ?>
                                    <li class="skill-item" data-aos="fade-up"><?php echo $item['skill']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>   
                </div>
            </div>
        </div>
    </div>
</section>