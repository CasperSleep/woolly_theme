<div class="form-wrap">
    <label>
        <input type="checkbox" name="<?= $args['metabox_name']; ?>[highlight]" value="1" <?php checked( $args['options']->highlight ) ?> />
        Highlight Article
    </label>
</div>
<div class="form-wrap">
    <label>Background Color</label>
    <input type="text" class="color-picker" name="<?= $args['metabox_name']; ?>[color]" value="<?= esc_attr($args['options']->color); ?>">
</div>