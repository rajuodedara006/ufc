<?php
/*
Reference: https://cdn.ckeditor.com/
*/
$wrapper_id = (!empty($field_data['wrapper']['id'])) ? $field_data['wrapper']['id'] : '';
$wrapper_class = 'acf-field acf-field-'.$field_type.' acf-'.$field_key;
$wrapper_class .= (!empty($field_data['wrapper']['class'])) ? ' '.$field_data['wrapper']['class'] : '';
$wrapper_class .= ($field_required) ? ' is-required' : '';

$wrapper_attrs = array();
$wrapper_attrs[] = 'data-name='.$field_name;
$wrapper_attrs[] = 'data-type='.$field_type;
$wrapper_attrs[] = 'data-key='.$field_key;
if ( !empty($field_data['wrapper']['width']) ) {
	$wrapper_width = $field_data['wrapper']['width'];
	$wrapper_attrs[] = 'style=width: '.$wrapper_width.'%;';
	$wrapper_attrs[] = 'data-width='.$wrapper_width;
}
if ($field_required) {
	$wrapper_attrs[] = 'data-required=1';
}
if ( !empty($field_data['minlength']) ) {
	$wrapper_attrs[] = 'data-minlength='.$field_data['minlength'];
}
if ( !empty($field_data['maxlength']) ) {
	$wrapper_attrs[] = 'data-maxlength='.$field_data['maxlength'];
}

$input_attrs = array( 'class=ufc-editor-area', 'rows=10', 'cols=40' );
if ($field_required) {
	$input_attrs[] = 'required=required';
}

$field_value = get_post_meta( $ufc_field_post_id, $field_name, true );
if ( isset($field_data['field_value']) ) {
	$field_value = $field_data['field_value'];
}

?>
<div id="<?php esc_attr_e($wrapper_id); ?>" class="<?php esc_attr_e($wrapper_class); ?>" <?php esc_attr_e( implode(' ', $wrapper_attrs) ); ?> >
	<div class="acf-label">
		<label for="acf-<?php esc_attr_e($field_key); ?>"><?php esc_html_e($field_label); ?> <?php if ($field_required){ ?><span class="acf-required">*</span><?php } ?></label>
		<?php
		if ( !empty($field_instructions) ) {
			?><p class="description"><?php esc_html_e( $field_instructions ); ?></p><?php
		}
		?>
	</div>
	<div class="acf-input">
		<div class="acf-input-wrap">
			<textarea id="<?php esc_attr_e('post-'.$ufc_field_post_id.'-acf-'.$field_key); ?>" name="acf[<?php esc_attr_e($field_key); ?>]" <?php esc_attr_e( implode(' ', $input_attrs) ); ?> ><?php esc_html_e( $field_value ); ?></textarea>
		</div>
	</div>
	<div class="ufc-field-errors">
		<p class="ufc-field-error-required"><?php esc_html_e("This field is required.", "ufcsupport" ); ?></p>
		<p class="ufc-field-error-minlength"><?php esc_html_e( sprintf("This field needs minimum %s characters.", $field_data['minlength'] ), "ufcsupport" ); ?></p>
		<p class="ufc-field-error-maxlength"><?php esc_html_e( sprintf("This field limits maximum %s characters.", $field_data['maxlength'] ), "ufcsupport" ); ?></p>
	</div>
</div>
