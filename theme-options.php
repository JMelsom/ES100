<?php
//////////////////////////////////////
//////							//////
//////	ADDING THEME OPTIONS	//////
//////							//////
//////////////////////////////////////
	add_action('admin_menu', 'jm_create_menu');
//Create menu in wp-admin
function jm_create_menu(){
	add_submenu_page('themes.php', 'Super Themer Options', 'Theme Options', 'manage_options', 'jm_settings_page', 'jm_settings_page');
	add_action('admin_init', 'jm_register_settings');
}

//Register the options we want control of
function jm_register_settings(){
	register_setting('jm_social_group', 'jm_facebook');
	register_setting('jm_social_group', 'jm_twitter');
	register_setting('jm_social_group', 'jm_gplus');
	register_setting('jm_social_group', 'jm_linkedin');
	
	register_setting('jm_main_group', 'jm_logo');
	register_setting('jm_main_group', 'jm_colorOne');
	register_setting('jm_main_group', 'jm_colorTwo');
	register_setting('jm_main_group', 'jm_analytics');
}

function jm_settings_page(){
	
?>
	<h1>Super Themer</h1>
	<form method="post" action="options.php">
	<?php settings_fields('jm_social_group'); ?>
		<p>
			<label for="jm_facebook">Facebook:</label>
			<input type="text" name="jm_facebook" value="<?php echo get_option('jm_facebook'); ?>">
		</p>
		<p>
			<label for="jm_twitter">Twitter:</label>
			<input type="text" name="jm_twitter" value="<?php echo get_option('jm_twitter'); ?>">
		</p>
		<p>
			<label for="jm_gplus">Google&#43;:</label>
			<input type="text" name="jm_gplus" value="<?php echo get_option('jm_gplus'); ?>">
		</p>
		<p>
			<label for="jm_linkedin">LinkedIn:</label>
			<input type="text" name="jm_linkedin" value="<?php echo get_option('jm_linkedin'); ?>">
		</p>
		<p>
			<input type="submit" value="<?php _e('Save Changes') ?>">
		</p>
	</form>
<?php
}


?>