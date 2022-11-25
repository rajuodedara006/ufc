<?php $displayed_fields = array( 'ID', 'type', 'key', 'required', 'ufc_layout_style', 'label', 'name', 'instructions', 'parent', 'menu_order', '_name', '_valid', 'conditional_logic', 'sub_fields' ); ?>
<div class="field-edit-view-wrap field-type-<?php esc_attr_e($field_type); ?>"
    data-acf_field_id="<?php esc_attr_e($field_ID); ?>">
    <input type="hidden" name="acf_fields[<?php esc_attr_e($field_ID); ?>][ID]" value="<?php esc_attr_e($field_ID); ?>">
    <input type="hidden" name="acf_fields[<?php esc_attr_e($field_ID); ?>][type]"
        value="<?php esc_attr_e($field_type); ?>">
    <input type="hidden" name="acf_fields[<?php esc_attr_e($field_ID); ?>][key]"
        value="<?php esc_attr_e($field_key); ?>">
    <input type="hidden" name="acf_fields[<?php esc_attr_e($field_ID); ?>][parent]"
        value="<?php esc_attr_e($field_parent); ?>">
    <input type="hidden" name="acf_fields[<?php esc_attr_e($field_ID); ?>][menu_order]"
        value="<?php esc_attr_e($field_menu_order); ?>">
    <div class="edit-field-header">
        <span class="edit-field-trigger-reorder"><i class="fa fa-bars"></i></span>
        <?php
		$displayed_type = $field_type;
		if ( !empty($field_data['ufc_field_video_group']) ) {
			$displayed_type = 'oembed';
		}
		?>
        <span
            class="edit-field-icon-header"><?php echo( ($all_field_types[$displayed_type]['field_icon']) ? wp_kses($all_field_types[$displayed_type]['field_icon'], array( 'i'=>array('class' => array()) ) ) : '' ); ?></span>
        <span class="edit-field-name-header"><?php esc_html_e($field_label); ?></span>
        <span
            class="edit-field-type-header"><?php esc_html_e( ($all_field_types[$displayed_type]['field_label']) ? '('.$all_field_types[$displayed_type]['field_label'].')' : '' ); ?></span>
        <div class="edit-field-actions">
            <span class="edit-field-trigger-action"><i class="fa fa-ellipsis-v"></i></span>
            <ul class="edit-field-actions-ul">
                <li class="edit-field-actions-li edit-field-duplicate-action"><i
                        class="fa fa-retweet"></i><?php esc_html_e( 'Duplicate', 'wcdmdsupport'); ?></li>
                <li class="edit-field-actions-li edit-field-delete-action"><i
                        class="fa fa-trash"></i><?php esc_html_e( 'Delete', 'wcdmdsupport'); ?></li>
            </ul>
        </div>
        <span class="edit-field-toggle-header dashicons dashicons-arrow-down-alt2"></span>
    </div>
    <div class="field-edit-content-main">
        <div class="field-edit-content-row">
            <div class="field-edit-col">
                <label class="ufc-field-checkbox-switch" for="acf_fields[<?php esc_attr_e($field_ID); ?>][required]">
                    <?php esc_html_e('This field is required', "ufcsupport" ); ?>
                    <input type="checkbox" name="acf_fields[<?php esc_attr_e($field_ID); ?>][required]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][required]" class="ufc-field-checkbox" value="1"
                        <?php echo (!empty($field_required)) ? 'checked' : ''; ?>>
                    <span class="ufc-field-checkbox-slider">
                        <span class="ufc-field-checkbox-yes"><?php esc_html_e('Yes', "ufcsupport" ); ?></span>
                        <span class="ufc-field-checkbox-no"><?php esc_html_e('No', "ufcsupport" ); ?></span>
                    </span>
                </label>
            </div>
        </div>

        <div class="field-edit-content-row field-label-field-name">
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][label]"><?php esc_html_e('Field Name', "ufcsupport" ); ?></label>
                <input type="text" name="acf_fields[<?php esc_attr_e($field_ID); ?>][label]"
                    id="acf_fields[<?php esc_attr_e($field_ID); ?>][label]"
                    class="ufc-field-input ufc-field-enter-to-focusout-and-save"
                    value="<?php esc_attr_e($field_label); ?>">
            </div>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][name]"><?php esc_html_e('ID: ', "ufcsupport" ); ?></label>
                <input type="text" name="acf_fields[<?php esc_attr_e($field_ID); ?>][name]"
                    id="acf_fields[<?php esc_attr_e($field_ID); ?>][name]"
                    class="ufc-field-input ufc-field-enter-to-focusout-and-save"
                    value="<?php esc_attr_e($field_name); ?>">
            </div>
        </div>
        <div class="field-edit-content-row">
            <div class="field-edit-col">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][instructions]"><?php esc_html_e('Help Text', "ufcsupport" ); ?></label>
                <input type="text" name="acf_fields[<?php esc_attr_e($field_ID); ?>][instructions]"
                    id="acf_fields[<?php esc_attr_e($field_ID); ?>][instructions]"
                    class="ufc-field-input  ufc-field-enter-to-save" value="<?php esc_attr_e($field_instructions); ?>">
            </div>
        </div>

        <?php if ( !empty($field_data['ufc_field_video_group']) ) { 
			$field_mime_types = (!empty($field_data['mime_types'])) ? $field_data['mime_types'] : '';
			$field_min_width = (!empty($field_data['min_width'])) ? $field_data['min_width'] : '';
			$field_min_height = (!empty($field_data['min_height'])) ? $field_data['min_height'] : '';
			$field_min_size = (!empty($field_data['min_size'])) ? $field_data['min_size'] : '';
			$field_max_width = (!empty($field_data['max_width'])) ? $field_data['max_width'] : '';
			$field_max_height = (!empty($field_data['max_height'])) ? $field_data['max_height'] : '';
			$field_max_size = (!empty($field_data['max_size'])) ? $field_data['max_size'] : '';
			?>
        <div class="field-edit-content-row video-group-parent-fields video-group-field-mime_types">
            <?php $displayed_fields[] = 'mime_types'; ?>
            <div class="field-edit-col">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][mime_types]"><?php esc_html_e('Accepted File Type', "ufcsupport" ); ?></label>
                <span class="field-label-note"><?php esc_html_e('Leave blank for all types', "ufcsupport" ); ?></span>
                <input type="text" name="acf_fields[<?php esc_attr_e($field_ID); ?>][mime_types]"
                    id="acf_fields[<?php esc_attr_e($field_ID); ?>][mime_types]" class="ufc-field-input"
                    value="<?php esc_attr_e( $field_mime_types ); ?>">
            </div>
        </div>
        <div class="field-edit-content-row video-group-parent-fields video-group-field-width">
            <div class="field-edit-col field-col-half">
                <?php $displayed_fields[] = 'min_width';
				$displayed_fields[] = 'max_width'; ?>
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][min_width]"><?php esc_html_e('Min. Width', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][min_width]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][min_width]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_min_width ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('px', "ufcsupport" ); ?></span>
                </div>
            </div>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][max_width]"><?php esc_html_e('Max. Width', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][max_width]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][max_width]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_max_width ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('px', "ufcsupport" ); ?></span>
                </div>
            </div>
        </div>
        <div class="field-edit-content-row video-group-parent-fields video-group-field-height">
            <?php $displayed_fields[] = 'min_height';
				$displayed_fields[] = 'max_height'; ?>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][min_height]"><?php esc_html_e('Min. Height', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][min_height]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][min_height]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_min_height ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('px', "ufcsupport" ); ?></span>
                </div>
            </div>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][max_height]"><?php esc_html_e('Max. Height', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][max_height]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][max_height]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_max_height ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('px', "ufcsupport" ); ?></span>
                </div>
            </div>
        </div>
        <div class="field-edit-content-row video-group-parent-fields video-group-field-size">
            <?php $displayed_fields[] = 'min_size';
				$displayed_fields[] = 'max_size'; ?>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][min_size]"><?php esc_html_e('Min. File Size', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][min_size]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][min_size]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_min_size ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('mb', "ufcsupport" ); ?></span>
                </div>
            </div>
            <div class="field-edit-col field-col-half">
                <label class="field-label"
                    for="acf_fields[<?php esc_attr_e($field_ID); ?>][max_size]"><?php esc_html_e('Max. File Size', "ufcsupport" ); ?></label>
                <div class="field-postfix-text-group">
                    <input type="number" name="acf_fields[<?php esc_attr_e($field_ID); ?>][max_size]"
                        id="acf_fields[<?php esc_attr_e($field_ID); ?>][max_size]" class="ufc-field-input"
                        value="<?php esc_attr_e( $field_max_size ); ?>">
                    <span class="field-postfix-text"><?php esc_html_e('mb', "ufcsupport" ); ?></span>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="field-edit-repeater-content-wrap"
            style="<?php if ( !empty($field_data['ufc_field_video_group']) ) { esc_attr_e( 'display: none;'); } ?>">
            <div class="field-edit-repeater-header field-edit-content-row">
                <div class="field-edit-col field-col-half">
                    <label class="field-label"><?php esc_html_e('Subfields', "ufcsupport" ); ?></label>
                    <span class="field-label-note">
                        <?php esc_html_e('Create a set of fields to be organized in this group', "ufcsupport" ); ?>
                    </span>
                </div>
            </div>
            <div class="field-edit-repeater-sub_fields-lists">
                <?php
				if ( !empty($field_data['sub_fields']) ) {
					// Global variables
					global $ufc_admin;
					$all_field_types = $ufc_admin->ufc_get_all_field_types();
					// Store parent data
					$parent_field_data = $field_data;
					foreach ($field_data['sub_fields'] as $sub_field_key => $sub_field_data) {

						$ufc_admin->ufc_get_edit_field_view( $sub_field_data );
					}

					// Restore parent data
					$field_data = $parent_field_data;
					$parent_field_data = '';
				}
				?>
            </div>
            <div class="field-edit-repeater-footer">
                <?php 
				if ( !isset( $field_data['ufc_field_video_group'] ) ) { ?>
                <button class="button button-secondary button-large field-edit-repeater-add-sub_field"><i
                        class="fa fa-plus"></i><?php esc_html_e('New Field', "ufcsupport" ); ?></button>
                <div class="ufc-repeater-sub-fields-icons">
                    <span class="ufc-repeater-sub-fields-before"><i class="fa fa-caret-up"></i></span>
                    <?php if ( !empty($all_field_types) ) {
                        foreach ($all_field_types as $field_type_value) {
                            if ( !in_array( $field_type_value['field_type'], array('date_time_picker', 'time_picker' ) ) ) { ?>
                                <div class="ufc-group-custom-field-row"
                                    data-field_type="<?php esc_attr_e($field_type_value['field_type']); ?>">
                                    <span class="ufc-group-custom-field-icon"><?php echo wp_kses($field_type_value['field_icon'], array( 'i'=>array('class' => array()) ) ); ?></span>
                                    <span class="ufc-group-custom-field-label"><?php esc_html_e( $field_type_value['field_label']); ?></span>
                                </div>
                                <?php
							}
						}
					}
					do_action( 'ufc_group_after_show_all_field_types_add_button', $all_field_types );
					?>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <?php
	// Show remaning data on hidden fields
	if ( !empty($field_data) ) {
		foreach ($field_data as $field_key => $field_value) {

			if ( !in_array($field_key, $displayed_fields) ) {
				
				if ( is_array($field_value) ) {
					foreach ($field_value as $f_key => $f_value) {
						echo '<input type="hidden" name="acf_fields['.esc_attr($field_ID).']['.esc_attr($field_key).']['.esc_attr($f_key).']" value="'.esc_attr($f_value).'">';
					}
				} else {
					echo '<input type="hidden" name="acf_fields['.esc_attr($field_ID).']['.esc_attr($field_key).']" value="'.esc_attr($field_value).'">';
				}
			}
		}
	}

	// Show Conditional Logic data on hidden fields
	if ( !empty($field_data['conditional_logic']) && is_array($field_data['conditional_logic']) ) {
		foreach ($field_data['conditional_logic'] as $logic_group_no => $logic_group_arr) {
			
			if ( is_array($logic_group_arr) ) {
				foreach ($logic_group_arr as $logic_no => $logic_arr) {
					if ( isset($logic_arr['field']) && isset($logic_arr['operator']) ) {
						?>
                        <input type="hidden"
                            name="acf_fields[<?php esc_attr_e($field_ID); ?>][<?php esc_attr_e($logic_group_no); ?>][<?php esc_attr_e($logic_no); ?>][field]"
                            value="<?php esc_attr_e($logic_arr['field']); ?>">
                        <input type="hidden"
                            name="acf_fields[<?php esc_attr_e($field_ID); ?>][<?php esc_attr_e($logic_group_no); ?>][<?php esc_attr_e($logic_no); ?>][operator]"
                            value="<?php esc_attr_e($logic_arr['operator']); ?>">
                        <?php
					}
				}
			}
		}
	}
	?>
</div>