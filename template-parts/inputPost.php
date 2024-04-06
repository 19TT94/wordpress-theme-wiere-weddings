<?php
    $selected = get_post_meta( $post->ID, 'meta_type_key', true );
    $paragraph = get_post_meta( $post->ID, 'meta_paragraph_key', true );
    $list = get_post_meta( $post->ID, 'meta_list_key', true );
?>

<label for="hc_field_type">Type</label>
<br />
<select name="hc_field_type" id="hc_field_type" class="postbox">
    <option value="">Select...</option>
    <option value="text" <?php selected( $selected, 'text' ); ?>>Text Centered</option>
    <option value="callout" <?php selected( $selected, 'callout' ); ?>>Callout</option>
    <option value="block-left" <?php selected( $selected, 'block-left' ); ?>>Block Left</option>
    <option value="block-right" <?php selected( $selected, 'block-right' ); ?>>Block Right</option>
</select>
<br />

<div class="field-wrapper" >
    <textarea name="hc_field_paragraph" id="hc_field_paragraph"><?php $paragraph ?></textarea>
</div>

<div class="field-wrapper" id="hc_field_list">
    <input type="text" name="hc_field_list_item_1" id="hc_field_list_item_1" value="<?php $list ?>"  />
    <input type="text" name="hc_field_list_item_2" id="hc_field_list_item_2" value="<?php $list ?>"  />
    <input type="text" name="hc_field_list_item_3" id="hc_field_list_item_3" value="<?php $list ?>"  />
</div>

