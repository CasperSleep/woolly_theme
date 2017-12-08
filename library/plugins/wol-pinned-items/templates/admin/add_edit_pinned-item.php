<div>
    <form>
        <input type="hidden" name="item[type]" value="<?= $args['type'] ?>">
        <div class="row">
            <label for="header">Header</label>
            <input type="text" placeholder="Header" name="item[header]" id="header" value="<?= esc_attr($args['item']['header']?:'') ?>">
        </div>
        <div class="row">
            <label for="subhead">Subhead</label>
            <input type="text" placeholder="Subhead" name="item[subhead]" id="subhead" value="<?= esc_attr($args['item']['subhead']?:'') ?>">
        </div>
        <div class="row">
            <label>Image</label>
            <div class="img-container">
                <input type="hidden" name="item[image]" class="upload_image_id" value="<?= $args['item']['image']?:'' ?>">
                <img src="<?= $args['item']['image_url']?:'http://via.placeholder.com/200x125&text=image' ?>" width="200" height="125">
                <button class="upload_image_button button">Upload</button>
                <button class="remove_image_button button">Remove</button>
            </div>
        </div>
        <div class="row">
            <label for="link">Link</label>
            <input type="text" placeholder="Link" name="item[link]" id="link" value="<?= $args['item']['link']?:'' ?>">
        </div>
        <div class="row posts-wrapper">
            <label>Post</label>
            <div class="posts-list">
                <ul>
                    <li>
                        <input type="radio" class="post_id" name="item[pinned_post]" value="" <?php checked('', $args['item']['pinned_post']?:'' ) ?>>
                        <span>Empty (No post)</span>
                    </li>
                    <?php foreach ($args['posts'] as $wp_post ) : ?>
                        <li>
                            <input type="radio" class="post_id" name="item[pinned_post]" value="<?php echo $wp_post->ID; ?>" <?php checked($wp_post->ID, $args['item']['pinned_post']?:'' ) ?>>
                            <span>
                                <?php echo get_the_title( $wp_post ); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </form>
</div>