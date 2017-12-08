<?php
$items = $args['items'];
//echo '<pre>';
//var_dump($items);
//echo '</pre>';
?>
<div class="row pinned-wrapper">
    <div class="pinned-container">
<?php
if( isset($items['top']) && !empty($items['top'])) :
    $href ='';
    if(isset($items['top']['link'])) {
        $href = $items['top']['link'];
    } elseif( isset($items['top']['pinned_post'])) {
        $href = get_permalink($items['top']['pinned_post']);
    } ?>
    <div class="col-xs-12 col-sm-4">
        <div class="pinned-item">
            <div class="pinned-thumb">
                <a href="<?= $href; ?>">
                    <img src="<?= $items['top']['image_url'] ?>">
                </a>
            </div>
            <div class="pinned-intro">
                <div>
                    <h2 class="entry-title">
                        <?php if($href) : ?>
                            <a style="color: inherit;" href="<?= $href ?>"><?= esc_html($items['top']['header']) ?></a>
                        <?php else : ?>
                            <?= esc_html($items['top']['header']) ?>
                        <?php endif; ?>
                    </h2>
                </div>
                <div class="entry-subtitle">
                    <?= esc_html($items['top']['subhead']) ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
if( (isset($items['left']) && !empty($items['left'])) || (isset($items['right']) && !empty($items['right'])) ) : ?>
        <?php if(isset($items['left']) && !empty($items['left'])) :
            $href ='';
            if(isset($items['left']['link'])) {
                $href = $items['left']['link'];
            } elseif( isset($items['left']['pinned_post'])) {
                $href = get_permalink($items['left']['pinned_post']);
            } ?>
            <div class="col-xs-12 col-sm-4">
                <div class="pinned-item">
                    <div class="pinned-thumb">
                        <a href="<?= $href; ?>">
                            <img src="<?= $items['left']['image_url'] ?>" width="100%">
                        </a>
                    </div>
                    <div class="pinned-intro">
                        <div>
                            <h2 class="entry-title">
                                <?php if($href) : ?>
                                    <a style="color: inherit;" href="<?= $href ?>"><?= esc_html($items['left']['header']) ?></a>
                                <?php else : ?>
                                    <?= esc_html($items['left']['header']) ?>
                                <?php endif; ?>
                            </h2>
                        </div>
                        <div class="entry-subtitle">
                            <?= esc_html($items['left']['subhead']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($items['right']) && !empty($items['right'])) :
            $href ='';
            if(isset($items['right']['link'])) {
                $href = $items['right']['link'];
            } elseif( isset($items['right']['pinned_post'])) {
                $href = get_permalink($items['right']['pinned_post']);
            } ?>
            <div class="col-xs-12 col-sm-4">
                <div class="pinned-item">
                    <div class="pinned-thumb">
                        <a href="<?= $href; ?>">
                            <img src="<?= $items['right']['image_url'] ?>" width="100%">
                        </a>
                    </div>
                    <div class="pinned-intro">
                        <div>
                            <h2 class="entry-title">
                                <?php if($href) : ?>
                                    <a style="color: inherit;" href="<?= $href ?>"><?= esc_html($items['right']['header']) ?></a>
                                <?php else : ?>
                                    <?= esc_html($items['right']['header']) ?>
                                <?php endif; ?>
                            </h2>
                        </div>
                        <div class="entry-subtitle">
                            <?= esc_html($items['right']['subhead']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php
endif;
?>
    </div>
</div>
