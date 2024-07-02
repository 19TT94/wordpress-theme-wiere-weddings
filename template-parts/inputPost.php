<?php
    $selected = get_post_meta( $post->ID, 'meta_type_key', true );
    $paragraph = get_post_meta( $post->ID, 'meta_paragraph_key', true );
    $list = get_post_meta( $post->ID, 'meta_list_key', true );
    $list_style = get_post_meta( $post->ID, 'meta_bullet_type_key', true );
    $image_width = get_post_meta( $post->ID, 'meta_image_width_key', true );
?>

<!-- Show Title Checkbox -->

<label for="hc_field_type" id="hc_field_label">Type</label>
<br />
<select name="hc_field_type" id="hc_field_type" class="postbox">
    <option value="">Select...</option>
    <option value="text" <?php selected( $selected, 'text' ); ?>>Text Centered</option>
    <option value="callout" <?php selected( $selected, 'callout' ); ?>>Callout</option>
    <option value="block-left" <?php selected( $selected, 'block-left' ); ?>>Block Left</option>
    <option value="block-right" <?php selected( $selected, 'block-right' ); ?>>Block Right</option>
</select>
<br />

<label id="hc_field_image_width" for="hc_field_image_width">
    Image Width
    <div class="inline">
        <input type="number" name="hc_field_image_width" value="<?= $image_width ?>" />%
    </div>
</label>

<select name="hc_field_bullet_type" id="hc_field_bullet_type">
    <option value="disc" <?php selected( $list_style, 'disc' ); ?>>Dot</option>
    <option value="numbered" <?php selected( $list_style, 'numbered' ); ?>>Numbered</option>
</select>

<div class="field-wrapper">
    <textarea name="hc_field_paragraph" id="hc_field_paragraph"><?= $paragraph ?></textarea>
</div>

<div class="field-wrapper" id="hc_field_list"></div>

<button type="button" id="add_bullet">Add Bullet</button>

<textarea name="hc_field_list_items" id="hc_field_list_items" hidden><?= $list ?></textarea>

