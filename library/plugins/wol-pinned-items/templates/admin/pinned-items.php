<table id="pinned-table" cellspacing="15">
    <tr>
        <td colspan="2" class="pinned-top">
            <div class="pinned-img">
                <img src="<?= $args['pinned_items']['top']['image_url']?:'http://via.placeholder.com/200x125&text=image' ?>" width="200" height="125">
            </div>
            <div class="pinned-intro">
                <span class="item-info"><?= isset($args['pinned_items']['top']['header'])?$args['pinned_items']['top']['header']:'' ?></span>
            </div>
            <div class="actions">
                <a href="#TB_inline&height=500&width=500&inlineId=thickbox-pinned-item" title="Edit Pinned Item" class="button edit-pinned-item"
                   data-type="top">Edit Pinned Item</a>
            </div>
        </td>
    </tr>
    <tr>
        <td width="50%">
            <div class="pinned-img">
                <img src="<?= $args['pinned_items']['left']['image_url']?:'http://via.placeholder.com/200x125&text=image' ?>" width="200" height="125">
            </div>
            <div class="pinned-intro">
                <span class="item-info"><?= isset($args['pinned_items']['left']['header'])?$args['pinned_items']['left']['header']:'' ?></span>
            </div>
            <div class="actions">
                <a href="#TB_inline&height=500&width=500&inlineId=thickbox-pinned-item" title="Edit Pinned Item" class="button edit-pinned-item"
                   data-type="left">Edit Pinned Item</a>
            </div>
        </td>
        <td>
            <div class="pinned-img">
                <img src="<?= $args['pinned_items']['right']['image_url']?:'http://via.placeholder.com/200x125&text=image' ?>" width="200" height="125">
            </div>
            <div class="pinned-intro">
                <span class="item-info"><?= isset($args['pinned_items']['right']['header'])?$args['pinned_items']['right']['header']:'' ?></span>
            </div>
            <div class="actions">
                <a href="#TB_inline&height=500&width=500&inlineId=thickbox-pinned-item" title="Edit Pinned Item" class="button edit-pinned-item"
                   data-type="right">Edit Pinned Item</a>
            </div>
        </td>
    </tr>
</table>

<div id="thickbox-pinned-item" class="hidden">
    <div id="thb-pinned-item">
        <div class="thb-content">
            <span class="spinner is-active"></span>
        </div>
        <div class="thb-buttons">
            <button type="button" class="button button-primary save-pinned-item">Save</button>
        </div>
    </div>
</div>