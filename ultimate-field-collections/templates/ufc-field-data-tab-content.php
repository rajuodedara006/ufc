<?php
$field_groups = acf_get_field_groups();

?>
<div class="ufc-field-data-section-wrap">

	<div class="ufc-field-data-section-sidebar">
		<ul class="ufc-field-posts-list-wrap">
			<?php
			$all_matched_posts_ids = array();
			if ( !empty($field_group_data) ) {

				$field_group_id = $field_group_data['ID'];
				$field_group_key = $field_group_data['key'];
				$field_group_title = $field_group_data['title'];
				$locations_arr = array();
				if ( !empty($field_group_data['location']) ) {
					foreach ($field_group_data['location'] as $locations_data) {

						// Get Posts Prepare
						$post_types_arr = array();
						$include_post_ids_arr = array();
						$exclude_post_ids_arr = array();
						if ( !empty($locations_data) ) {
							foreach ($locations_data as $single_location_data) {
								if ( ($single_location_data['param']=="post_type") && ($single_location_data['operator']=='==') ) {
									$post_types_arr[] = $single_location_data['value'];
								}
								if ( (($single_location_data['param']=="post") || ($single_location_data['param']=="page")) && ($single_location_data['operator']=='==') ) {
									$include_post_ids_arr[] = $single_location_data['value'];
								}
								if ( (($single_location_data['param']=="post") || ($single_location_data['param']=="page")) && ($single_location_data['operator']=='!=') ) {
									$exclude_post_ids_arr[] = $single_location_data['value'];
								}
							}
						}
						// Get Matched Posts
						$matched_post_args = array(
							'post_type'				=> (!empty($post_types_arr)) ? $post_types_arr : 'any',
							'post_status'           => 'publish',
							'ignore_sticky_posts'   => 1,
							'posts_per_page'        => '-1',
						);
						if ( !empty($include_post_ids_arr) ) {
							$matched_post_args['include'] = $include_post_ids_arr;
						}
						if ( !empty($exclude_post_ids_arr) ) {
							$matched_post_args['exclude'] = $exclude_post_ids_arr;
						}
						$matched_posts = get_posts($matched_post_args );

						if ( !empty($matched_posts) ) {

							foreach ($matched_posts as $matched_post) {

								if ( !empty($matched_post) ) {

									$field_post_id = $matched_post->ID;
									$field_post_title = $matched_post->post_title;
									$field_post_type = $matched_post->post_type;
									if ( empty($all_matched_posts_ids) || ( !empty($all_matched_posts_ids) && !in_array($field_post_id, $all_matched_posts_ids) ) ) {

										$all_matched_posts_ids[] = $field_post_id;
										?>
										<li class="ufc-field-post-list-item" data-field_group_id="<?php esc_attr_e( $field_group_id ); ?>" data-field_group_key="<?php esc_attr_e( $field_group_key ); ?>" data-field_post_id="<?php esc_attr_e( $field_post_id ); ?>">
											<span class="ufc-field-post-list-item-name"><?php esc_html_e( $field_post_title ); ?></span>
											<span class="ufc-field-post-list-item-location">(<?php esc_html_e( ucfirst( str_replace( '_', ' ', $field_post_type ) ) ); ?>)</span>
										</li>
										<?php
									}
								}
							}
						}
					}
				}
			}
			?>
		</ul>
	</div>

	<div class="ufc-field-data-section-content">
	</div>
</div>