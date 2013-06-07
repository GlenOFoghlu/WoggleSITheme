<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'scout_options', 'scout_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'scout-theme' ), __( 'Theme Options', 'scout-theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'scout-theme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'scout-theme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'scout_options' ); ?>
			<?php $options = get_option( 'scout_theme_options' ); ?>

			<table class="form-table">
                <tr><th colspan="2"><h2>Theme Setup</h2></th></tr>
                <tr valign="top"><th scope="row">Group Name</th>
                    <td>
                        <input id="scout_theme_options[group_name]" class="regular-text" type="text" name="scout_theme_options[group_name]" value="<?php esc_attr_e( $options['group_name'] ); ?>" />
                        <label class="description" for="scout_theme_options[group_name]"> e.g. "1st Geddington Scout Group"</label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Address</th>
                    <td>
                        <input id="scout_theme_options[group_address]" class="regular-text" type="text" name="scout_theme_options[group_address]" value="<?php esc_attr_e( $options['group_address'] ); ?>" />
                        <label class="description" for="scout_theme_options[group_address]"></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Charity number</th>
                    <td>
                        <input id="scout_theme_options[group_charity]" class="regular-text" type="text" name="scout_theme_options[group_charity]" value="<?php esc_attr_e( $options['group_charity'] ); ?>" />
                        <label class="description" for="scout_theme_options[group_charity]"> Leave blank if unsure.</label>
                    </td>
                </tr>
                <tr><th colspan="2"><h2>Social Media</h2></th></tr>
                <tr valign="top"><th scope="row">Facebook Profile</th>
                    <td>
                        <input id="WoggleSITheme_theme_options[facebookUrl]" class="regular-text" type="text" name="WoggleSITheme_theme_options[facebookUrl]" value="<?php echo esc_Url( $options['facebookUrl'] ); ?>" />
                        <label class="description" for="WoggleSITheme_theme_options[facebookUrl]"><?php _e( 'Leave blank to hide Facebook Icon', 'WoggleSITheme-theme' ); ?></label>
                    </td>
                </tr> 
                <tr valign="top"><th scope="row">Twitter Account</th>
                    <td>
                        <input id="WoggleSITheme_theme_options[twitterUrl]" class="regular-text" type="text" name="WoggleSITheme_theme_options[twitterUrl]" value="<?php echo esc_Url( $options['twitterUrl'] ); ?>" />
                        <label class="description" for="WoggleSITheme_theme_options[twitterUrl]"><?php _e( 'Leave blank to hide Twitter Icon', 'WoggleSITheme-theme' ); ?></label>
                    </td>
                </tr>
                
                <tr valign="top"><th scope="row">Youtube Channel</th>
                    <td>
                        <input id="WoggleSITheme_theme_options[youtubeUrl]" class="regular-text" type="text" name="WoggleSITheme_theme_options[youtubeUrl]" value="<?php echo esc_Url( $options['youtubeUrl'] ); ?>" />
                        <label class="description" for="WoggleSITheme_theme_options[youtubeUrl]"><?php _e( 'Leave blank to hide Youtube Icon', 'WoggleSITheme-theme' ); ?></label>
                    </td>
                </tr>
                <tr><th colspan="2"><h2>Homepage</h2></th></tr>
                <tr valign="top"><th scope="row">Show homepage message</th>
                    <td>
                        <input id="scout_theme_options[option_show_home_msg]" name="scout_theme_options[option_show_home_msg]" type="checkbox" value="1" <?php checked( '1', $options['option_show_home_msg'] ); ?> />
                        <label class="description" for="scout_theme_options[option_show_home_msg]"></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Homepage title</th>
                    <td>
                        <input id="scout_theme_options[home_title]" class="regular-text" type="text" name="scout_theme_options[home_title]" value="<?php esc_attr_e( $options['home_title'] ); ?>" />
                        <label class="description" for="scout_theme_options[home_title]"></label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Welcome message</th>
                    <td>
                        <textarea id="scout_theme_options[home_message]" class="large-text" cols="50" rows="5" name="scout_theme_options[home_message]"><?php echo esc_textarea( $options['home_message'] ); ?></textarea>
                        <label class="description" for="scout_theme_options[home_message]">Will be wrapped in a &lt;p&gt; tag.</label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Show Twitter widget</th>
                    <td>
                        <input id="scout_theme_options[option_show_twitter]" name="scout_theme_options[option_show_twitter]" type="checkbox" value="1" <?php checked( '1', $options['option_show_twitter'] ); ?> />
                        <label class="description" for="scout_theme_options[option_show_twitter]">(Will replace Homepage Sidebar 1)</label>
                    </td>
                </tr>
                <tr valign="top"><th scope="row">Twitter username</th>
                    <td>
                        <input id="scout_theme_options[twitter_username]" class="regular-text" type="text" name="scout_theme_options[twitter_username]" value="<?php esc_attr_e( $options['twitter_username'] ); ?>" />
                        <label class="description" for="scout_theme_options[twitter_username]"></label>
                    </td>
                </tr>
                
                
                <tr><th colspan="2"><h2>Discussion override</h2></th></tr>
                <tr valign="top"><th scope="row">Turn off comments</th>
                    <td>
                        <input id="scout_theme_options[no_comment]" name="scout_theme_options[no_comment]" type="checkbox" value="1" <?php checked( '1', $options['no_comment'] ); ?> />
                        <label class="description" for="scout_theme_options[no_comment]">Over-ride WordPress and switch off comments from posts. Optional.</label>
                    </td>
                </tr>         
            </table>
                
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'scout-theme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}
